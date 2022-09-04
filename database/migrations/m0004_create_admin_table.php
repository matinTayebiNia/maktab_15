<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class m0004_create_admin_table
{
    public function up()
    {
        Capsule::schema()->create('admins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")
                ->references("id")->on("users")->cascadeOnDelete();
            $table->string("email")->unique()->nullable();
            $table->boolean("status")->default(0);
        });
    }

    public function down()
    {
        try {
            Capsule::schema()->drop("admins");
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}