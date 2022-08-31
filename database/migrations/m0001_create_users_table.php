<?php

use app\core\Application;


class m0001_create_users_table
{
    public function up()
    {
        try {
            $db = Application::$app->database;
            $SQL = "CREATE TABLE `users` ( 
                    `id` BIGINT NOT NULL AUTO_INCREMENT,
                    `name` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `lastname` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `National_Code` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,               
                    `address` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,               
                    `isAdmin` BOOLEAN NOT NULL DEFAULT 0,                         
                    `isDoctor` BOOLEAN NOT NULL DEFAULT 0,                         
                    `password` VARCHAR(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    UNIQUE KEY `unique_email_field` (`National_Code`) USING BTREE,
                    PRIMARY KEY (`id`)
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
            $SQL = "DROP TABLE `users`";
            $db->pdo->exec($SQL);
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}