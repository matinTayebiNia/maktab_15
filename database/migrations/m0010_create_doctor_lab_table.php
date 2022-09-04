<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class m0010_create_doctor_lab_table
{
    public function up()
    {
        Capsule::schema()->create('doctor_lab', function (Blueprint $table) {
            $table->unsignedBigInteger("doctor_id");
            $table->foreign("doctor_id")->references("id")->on("doctors")
                ->cascadeOnDelete();
            $table->unsignedBigInteger("lab_id");
            $table->foreign("lab_id")->references("id")->on("lab")
                ->cascadeOnDelete();
            $table->primary(["doctor_id", "lab_id"]);
        });
    }

    public function down()
    {
        Capsule::schema()->drop("doctor_lab");
    }
}