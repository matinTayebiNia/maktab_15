<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class m0005_create_Lab_table
{
    public function up()
    {

        Capsule::schema()->create('lab', function (Blueprint $table) {
            $table->id();
            $table->string("labName");
            $table->timestamps();
        });

    }

    public function down()
    {
        try {
            Capsule::schema()->drop("lab");
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}