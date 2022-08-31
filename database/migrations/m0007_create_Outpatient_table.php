<?php

use App\core\Application;

class m0007_create_Outpatient_table
{
    public function up()
    {
        try {
            $db = Application::$app->database;
            $SQL = "CREATE TABLE `outpatient` ( 
                    `patient_id` BIGINT NOT NULL ,
                    `date` VARCHAR(255) NOT NULL,
                    `lab_id` BIGINT NOT NULL,
                    FOREIGN KEY (`patient_id`) REFERENCES users(`id`),
                    FOREIGN KEY (`lab_id`) REFERENCES lab(`id`)
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
            $SQL = "DROP TABLE `outpatient`";
            $db->pdo->exec($SQL);
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}