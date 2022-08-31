<?php

use App\core\Application;

class m0004_create_admin_table
{
    public function up()
    {
        try {
            $db = Application::$app->database;
            $SQL = "CREATE TABLE `admin` ( 
                    `id` BIGINT NOT NULL AUTO_INCREMENT,
                    `user_id`  BIGINT NOT NULL ,
                    `email` VARCHAR(255) NULL ,
                    `status` BOOLEAN NOT NULL DEFAULT 0,
                    PRIMARY KEY(`id`),
                    FOREIGN KEY (`user_id`) REFERENCES users(`id`)
                );";
            $db->pdo->exec($SQL);
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }

    }

    public function down()
    {
        try {
            $db = Application::$app->database;
            $SQL = "DROP TABLE `admin`";
            $db->pdo->exec($SQL);
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}