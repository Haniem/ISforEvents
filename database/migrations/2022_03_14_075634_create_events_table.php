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
            $table->string('event_discription');
            $table->string('event_format', 250)->nullable();
            $table->date('begin_date');
            $table->date('end_date');
            $table->string('event_age')->nullable();
            $table->string('event_requirements', 250);
            $table->string('event_link', 250)->nullable();
            $table->string('place_of_realization', 250)->nullable();
            $table->foreignId('id_event_type')->references('id')->on('event_types');
            $table->foreignId('id_event_level')->references('id')->on('event_levels');
            $table->foreignId('id_event_status')->references('id')->on('event_statuses');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->string('event_com', 250)->nullable();
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
