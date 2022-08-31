<?php

use App\core\Application;

class m0008_create_bill_table
{
    public function up()
    {
        try {
            $db = Application::$app->database;
            $SQL = "CREATE TABLE `bill` ( 
                    `id` BIGINT NOT NULL AUTO_INCREMENT,
                    `patient_id` BIGINT NOT NULL ,
                    `doctor_charge` BIGINT NOT NULL,
                    `room_charge` BIGINT NOT NULL,
                    `lab_charge` BIGINT NOT NULL,
                    `doctor_pay` BIGINT NOT NULL,
                    FOREIGN KEY (`patient_id`) REFERENCES users(`id`),
                    PRIMARY KEY(`id`) 
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
            $SQL = "DROP TABLE `bill`";
            $db->pdo->exec($SQL);
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}