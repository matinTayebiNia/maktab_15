<?php


use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;


class m0001_create_users_table
{
    public function up()
    {
        Capsule::schema()->create('users', function ( Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('National_Code')->unique();
            $table->string('password');
            $table->enum("type_user",["patient","manager","doctor"]);
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        try {
            Capsule::schema()->drop("users");
        } catch (Exception $exception) {
            throw new Error($exception->getMessage());
        }
    }
}