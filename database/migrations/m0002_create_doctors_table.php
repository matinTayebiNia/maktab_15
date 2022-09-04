<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class m0002_create_doctors_table
{
    public function up()
    {
        Capsule::schema()->create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string("Evidence")->nullable();
            $table->string("Expert")->nullable();
            $table->unsignedBigInteger("user_id");
            $table->boolean("status")->default(0);
            $table->foreign("user_id")->
            references("id")->on("users")->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Capsule::schema()->drop("doctors");
    }
}