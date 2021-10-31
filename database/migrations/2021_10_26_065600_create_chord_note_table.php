<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChordNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chord_note', function (Blueprint $table) {

            $table->unsignedInteger('chord_id');
            $table->unsignedInteger('note_id');
            $table->primary(['chord_id', 'note_id']);

            //外部キー制約
            $table->foreign('chord_id')
                ->references('id')
                ->on('chords')
                ->onDelete('cascade');
            $table->foreign('note_id')
                ->references('id')
                ->on('notes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chord_note');
    }
}
