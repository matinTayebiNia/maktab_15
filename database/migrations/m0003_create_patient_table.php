<?php

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

class m0003_create_patient_table
{
    public function up()
    {

        Capsule::schema()->create('patients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")
                ->references("id")->on("users")->cascadeOnDelete();
            $table->string("blood_type")->nullable();
            $table->string("Type_of_disease")->nullable();
            $table->timestamps();
        });

    }

    public function down()
    {
        Capsule::schema()->drop("patients");
    }
}