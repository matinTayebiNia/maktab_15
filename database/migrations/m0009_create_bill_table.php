<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class m0009_create_bill_table
{
    public function up()
    {
        Capsule::schema()->create('bill', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("patient_id");
            $table->foreign("patient_id")->references("id")->on("patients")
                ->cascadeOnDelete();
            $table->unsignedBigInteger("doctor_charge");
            $table->unsignedBigInteger("room_charge");
            $table->unsignedBigInteger("lab_charge");
            $table->unsignedBigInteger("doctor_id");
            $table->foreign("doctor_id")->references("id")->on("doctors")
                ->cascadeOnDelete();
        });

    }

    public function down()
    {
        try {
            Capsule::schema()->drop("bill");
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}