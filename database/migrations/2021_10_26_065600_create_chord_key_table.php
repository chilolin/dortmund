<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChordKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chord_key', function (Blueprint $table) {

            $table->unsignedInteger('chord_id');
            $table->unsignedInteger('key_id');
            $table->primary(['chord_id', 'key_id']);

            //外部キー制約
            $table->foreign('chord_id')
                ->references('id')
                ->on('chords')
                ->onDelete('cascade');
            $table->foreign('key_id')
                ->references('id')
                ->on('keys')
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
        Schema::dropIfExists('chord_key');
    }
}
