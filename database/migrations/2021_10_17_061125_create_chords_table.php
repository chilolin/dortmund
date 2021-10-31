<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chords', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            // $table->unsignedBigInteger('first_note_id');
            // $table->foreign('first_note_id')->references('id')->on('notes')->onDelete('cascade');
            // $table->unsignedBigInteger('second_note_id');
            // $table->foreign('second_note_id')->references('id')->on('notes')->onDelete('cascade');
            // $table->unsignedBigInteger('third_note_id');
            // $table->foreign('third_note_id')->references('id')->on('notes')->onDelete('cascade');
            // $table->unsignedBigInteger('forth_note_id')->nullable();
            // $table->foreign('forth_note_id')->references('id')->on('notes')->onDelete('cascade');
            // $table->unsignedBigInteger('fifth_note_id')->nullable();
            // $table->foreign('fifth_note_id')->references('id')->on('notes')->onDelete('cascade');

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
        Schema::dropIfExists('chords');
    }
}
