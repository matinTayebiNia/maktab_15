<?php

use App\core\Application;

class m0003_create_Lab_table
{
    public function up()
    {
        try {
            $db = Application::$app->database;
            $SQL = "CREATE TABLE `lab` ( 
                    `id` BIGINT NOT NULL AUTO_INCREMENT,
                    `patient_id`  BIGINT NOT NULL ,
                    `doctor_id`  BIGINT NOT NULL UNIQUE ,
                    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    `amount` BIGINT NOT NULL,
                    PRIMARY KEY (`id`),
                    FOREIGN KEY (`patient_id`) REFERENCES users(`id`),
                    FOREIGN KEY (`doctor_id`) REFERENCES users(`id`)
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
            $SQL = "DROP TABLE `lab`";
            $db->pdo->exec($SQL);
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}