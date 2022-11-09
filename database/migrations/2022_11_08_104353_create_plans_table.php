<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('start_city');
            $table->string('end_city');
            $table->string('start_terminal');
            $table->string('end_terminal');
            $table->integer('move_day');
            $table->time('move_time');
            $table->integer('proccess_time');
            $table->integer('capacity');
            $table->enum('bus_type', ['vip', 'standard', 'mini']);
            $table->bigInteger('price');
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
};
