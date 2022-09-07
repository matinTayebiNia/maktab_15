<?php

namespace App\core\db;

use App\core\Application;
use App\core\Log\Log;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class Database
{
    protected static Database $obj;

    private function __construct(array $config)
    {

        $capsule = new Capsule;

        $capsule->addConnection([

            "driver" => $config["driver"],

            "host" => $config["host"],

            "database" => $config["dbname"],

            "username" => $config["user"],

            "password" => $config["password"]

        ]);

        //Make this Capsule instance available globally.
        $capsule->setAsGlobal();

        // Set up the Eloquent ORM.
        $capsule->bootEloquent();
        $capsule->bootEloquent();

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

            $files = getDirContent(basePath("database/migrations"));
            $toApplyMigrations = array_diff($files, $appliedMigrations);

            if (empty($toApplyMigrations))
                return Log::setSuccessMessage("nothing to migrate!");

            foreach ($toApplyMigrations as $migration) {
                require_once basePath("database/migrations/" . $migration);
                $className = pathinfo($migration, PATHINFO_FILENAME);

                $instance = new $className;
                Log::setMessageWithTime("Applying migration $migration");
                $instance->up();
                $this->saveMigration($migration);
                Log::setMessageWithTime("Applied migration $migration");
            }

        } catch (\Exception $exception) {
            return Log::setErrorMessage($exception->getMessage() . "|file: " . $exception->getFile()
                . "| line:" . $exception->getLine());
        }

    }

    protected function createMigrationsTable()
    {
        if (!Capsule::schema()->hasTable('migrations')) {
            Capsule::schema()->create("migrations", function (Blueprint $table) {
                $table->id();
                $table->string("migrations");
                $table->timestamp("created_at");
            });
        }
    }

    protected function getAppliedMigrations(): bool|array
    {
        $result = Capsule::table("migrations")
            ->select("migrations")->get()->toArray();
        return array_map(function ($data) {
            return $data->migrations;
        }, $result);
    }

    protected function saveMigration($migrations)
    {
        Capsule::table("migrations")->insert([
            "migrations" => $migrations,
        ]);
    }
}