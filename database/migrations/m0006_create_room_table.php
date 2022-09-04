<?php

use App\core\Application;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

class m0006_create_room_table
{
    public function up()
    {
        Capsule::schema()->create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string("room_type");
            $table->enum("status", ['unused', 'using', 'broke'])->default("unused");
            $table->unsignedBigInteger("lab_id");
            $table->foreign("lab_id")->references("id")->on("lab");
            $table->timestamps();
        });
    }

    public function down()
    {
        try {
            Capsule::schema()->drop("rooms");
        } catch (\Exception $exception) {
            throw new \Error($exception->getMessage());
        }
    }
}