<?php

use App\core\Application;

class m0006_create_Inpatient_table
{
    public function up()
    {
        try {
            $db = Application::$app->database;
            $SQL = "CREATE TABLE `inpatient` ( 
                    `patient_id` BIGINT NOT NULL ,
                    `room_id` BIGINT NOT NULL ,
                    `lab_id` BIGINT NOT NULL,
                    `date_of_adm` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    `date_of_dis` TIMESTAMP NULL,
                    FOREIGN KEY (`patient_id`) REFERENCES users(`id`),
                    FOREIGN KEY (`room_id`) REFERENCES rooms(`id`),
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
            $SQL = "DROP TABLE `inpatient`";
            $db->pdo->exec($SQL);
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}