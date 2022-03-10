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
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->text('note');

            $table->foreignId('id_nomination')->references('id')->on('nominations');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->foreignId('id_request_status')->references('id')->on('request_statuses');
            $table->foreignId('id_result')->references('id')->on('results');
            $table->foreignId('id_events_stage')->references('id')->on('event_stages');

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
        Schema::dropIfExists('requests');
    }
};
