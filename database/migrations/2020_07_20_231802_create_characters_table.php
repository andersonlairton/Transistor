<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('characters_name',255)->unique();
            $table->string('frase_characters',100);
            $table->string('characters_description',255);
            $table->binary('image');
            $table->bigInteger('game')->unsigned();
            $table->foreign('game')
                ->references('id')
                ->on('games')
                ->onDelete('CASCADE');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
