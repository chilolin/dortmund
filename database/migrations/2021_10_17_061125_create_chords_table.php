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

            // $table->unsignedBigInteger('first_key_id');
            // $table->foreign('first_key_id')->references('id')->on('keys')->onDelete('cascade');
            // $table->unsignedBigInteger('second_key_id');
            // $table->foreign('second_key_id')->references('id')->on('keys')->onDelete('cascade');
            // $table->unsignedBigInteger('third_key_id');
            // $table->foreign('third_key_id')->references('id')->on('keys')->onDelete('cascade');
            // $table->unsignedBigInteger('forth_key_id')->nullable();
            // $table->foreign('forth_key_id')->references('id')->on('keys')->onDelete('cascade');
            // $table->unsignedBigInteger('fifth_key_id')->nullable();
            // $table->foreign('fifth_key_id')->references('id')->on('keys')->onDelete('cascade');

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
