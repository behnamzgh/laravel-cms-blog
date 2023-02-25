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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();

            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')
                    ->references('id')      //roye soton id link beshe
                    ->on('categories')      //roye table categories
                    ->onUpdate('CASCADE')   //vaghti update shod category parent child ha ham update bashe
                    ->onDelete('CASCADE');  //vaghti delete shod category parent child ha ham delete beshe

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
        Schema::dropIfExists('categories');
    }
};
