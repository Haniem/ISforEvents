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
        Schema::create('event_stages', function (Blueprint $table) {
            $table->id();
            $table->string('event_stage_name', 250);
            $table->date('stage_begin_date');
            $table->date('stage_end_date');
            $table->date('stage_result_date');
            $table->foreignId('id_event')->references('id')->on('events');
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
        Schema::dropIfExists('event_stages');
    }
};
