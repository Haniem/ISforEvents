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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name', 250);
            $table->text('event_discrtiption');
            $table->date('begin_date');
            $table->date('end_date');
            $table->integer('event_age');
            $table->foreignId('id_event_type')->references('id')->on('event_types');
            $table->foreignId('id_event_level')->references('id')->on('event_levels');
            $table->foreignId('id_event_status')->references('id')->on('event_statuses');
            $table->foreignId('id_main_teacher')->references('id')->on('teachers');
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
        Schema::dropIfExists('events');
    }
};