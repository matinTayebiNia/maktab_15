<?php

use App\core\Application;

class m0002_create_doctors_table
{
    public function up()
    {
        try {
            $db = Application::$app->database;
            $SQL = "CREATE TABLE `doctors` ( 
                    `id` BIGINT NOT NULL AUTO_INCREMENT,
                    `Evidence` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `Expert` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `user_id` BIGINT NOT NULL,
                    `status` BOOLEAN NOT NULL DEFAULT 0,
                    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    PRIMARY KEY (`id`),
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
            $SQL = "DROP TABLE `doctors`";
            $db->pdo->exec($SQL);
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}