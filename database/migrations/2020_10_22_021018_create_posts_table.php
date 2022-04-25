<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->double('inverter_current');
            $table->double('inverter_voltage');
            $table->double('solar_current');
            $table->double('solar_voltage');
            $table->double('solar_intensity');        
            $table->double('battery_current');
            $table->double('battery_voltage');
            $table->double('inverter_power');
            $table->double('solar_power');
            $table->double('battery_power');
            $table->double('battery_percentage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
