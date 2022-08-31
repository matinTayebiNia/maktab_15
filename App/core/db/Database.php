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
        try {

            $this->createMigrationsTable();
            $appliedMigrations = $this->getAppliedMigrations();

            $files = getDirContent(Application::$rootDir . "/database/migrations");
            $toApplyMigrations = array_diff($files, $appliedMigrations);

            foreach ($toApplyMigrations as $migration) {
                require_once Application::$rootDir . "/database/migrations/" . $migration;
                $className = pathinfo($migration, PATHINFO_FILENAME);

                $instance = new $className;
                Log::setMessageWithTime("Applying migration $migration");
                $instance->up();
                $this->saveMigration($migration);
                Log::setMessageWithTime("Applied migration $migration");
            }
            if (empty($toApplyMigrations))
                Log::setSuccessMessage("nothing to migrate!");

        } catch (\Exception $exception) {
          return  Log::setErrorMessage($exception->getMessage() . "| line:" . $exception->getLine());
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

    protected function saveMigration($migrations)
    {
        $statement = $this->prepare("INSERT INTO migrations (migrations) VALUES ( '{$migrations}' )");
        $statement->execute();
    }

    public function prepare($sql): bool|\PDOStatement
    {
        return $this->pdo->prepare($sql);
    }
}