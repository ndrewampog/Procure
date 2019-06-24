<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('medicine_id');
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();           
            $table->string('medicine_image')->nullable();
            $table->string('medicine_generic_name');
            $table->string('medicine_brand_name');
            $table->string('medicine_classification');
            $table->float('medicine_price', 8, 2);
            $table->string('medicine_quantity');
            $table->longText('medicine_description');
            $table->string('medicine_volume');
            $table->string('medicine_type');
            $table->enum('medicine_stocks',['Yes','No']);
            // $table->enum('medicine_stocks_status',['Yes','No']);
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('category_id')
            ->references('category_id')
            ->on('categories')
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
        //
    }
}
