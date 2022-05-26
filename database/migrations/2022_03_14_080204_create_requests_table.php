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
            $table->text('note')->nullable();
            
            $table->foreignId('id_student')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('id_result')->references('id')->on('results')->onDelete('cascade');
            $table->foreignId('id_stage')->references('id')->on('stages')->onDelete('cascade');

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
