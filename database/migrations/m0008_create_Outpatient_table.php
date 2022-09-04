<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class m0008_create_Outpatient_table
{
    public function up()
    {

        Capsule::schema()->create('outpatients', function (Blueprint $table) {
            $table->unsignedBigInteger("patient_id");
            $table->foreign("patient_id")->references("id")->on("patients")
                ->cascadeOnDelete();
            $table->string("data");
            $table->unsignedBigInteger("lab_id");
            $table->foreign("lab_id")->references("id")->on("lab")
                ->cascadeOnDelete();
        });

    }

    public function down()
    {
        try {
            Capsule::schema()->drop("outpatients");
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}