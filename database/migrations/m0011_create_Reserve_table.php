<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class m0011_create_Reserve_table
{
    public function up()
    {
        Capsule::schema()->create('reserves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("patient_id");
            $table->foreign("patient_id")->references("id")->on("patients")
                ->cascadeOnDelete();
            $table->unsignedBigInteger("doctor_id");
            $table->foreign("doctor_id")->references("id")->on("doctors")
                ->cascadeOnDelete();
            $table->unsignedBigInteger("lab_id");
            $table->foreign("lab_id")->references("id")->on("lab")
                ->cascadeOnDelete();
            $table->string("dateTime");
            $table->timestamps();
        });
    }

    public function down()
    {
        Capsule::schema()->drop('reserves');
    }
}