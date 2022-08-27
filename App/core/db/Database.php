<?php

namespace App\core\db;

use App\core\Application;
use App\core\Log\Log;
use PDO;

class Database
{
    public PDO $pdo;
    protected static Database $obj;

    private function __construct(array $config)
    {
        $dsn = $config["dsn"];
        $user = $config["user"];
        $password = $config["password"];
        $this->pdo = new \PDO($dsn, $user, $password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(array $config): Database
    {
        if (!isset(self::$obj)) {
            self::$obj = new self($config);
        }
        return self::$obj;
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $files = scandir(Application::$rootDir . "/database/migrations");
        $toApplyMigrations = array_diff($files, $appliedMigrations);
        $newMigration = [];
        foreach ($toApplyMigrations as $migration) {
            if ($migration === "." || $migration === "..") {
                continue;
            }
            require_once Application::$rootDir . "/database/migrations/" . $migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);

            $instance = new $className;
            Log::setMessageWithTime("Applying migration $migration");
            $instance->up();
            Log::setMessageWithTime("Applied migration $migration");
            $newMigration[] = $migration;
        }

        if (!empty($newMigration)) {
            $this->saveMigrations($newMigration);
        } else {
            Log::setSuccessMessage("nothing to migrate!");
        }
    }

    protected function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migrations VARCHAR(255), 
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;");
    }

    protected function getAppliedMigrations(): bool|array
    {
        $statement = $this->prepare("SELECT migrations FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    protected function saveMigrations(array $migrations)
    {
        $str = $this->convertMigrationsArrayToString($migrations);
        $statement = $this->prepare("INSERT INTO migrations (migrations) VALUES $str");
        $statement->execute();

    }

    public function prepare($sql): bool|\PDOStatement
    {
        return $this->pdo->prepare($sql);
    }

    /**
     * @param array $migrations
     * @return string
     */
    private function convertMigrationsArrayToString(array $migrations): string
    {
        return implode(", ", array_map(fn($m) => "('$m')", $migrations));
    }


}