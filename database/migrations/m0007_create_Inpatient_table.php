<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class m0007_create_Inpatient_table
{
    public function up()
    {

        Capsule::schema()->create('inpatients', function (Blueprint $table) {
            $table->unsignedBigInteger("patient_id");
            $table->foreign("patient_id")->references("id")->on("patients")
                ->cascadeOnDelete();
            $table->unsignedBigInteger("room_id");
            $table->foreign("room_id")->references("id")->on("rooms")
                ->cascadeOnDelete();
            $table->unsignedBigInteger("lab_id");
            $table->foreign("lab_id")->references("id")->on("lab")
                ->cascadeOnDelete();
            $table->timestamp("date_of_adm");
            $table->timestamp("date_of_dis")->nullable();
        });


    }

    public function down()
    {
        Capsule::schema()->drop("inpatient");
    }
}