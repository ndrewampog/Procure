<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMycartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mycarts', function (Blueprint $table) {
            $table->increments('mycart_id');
            $table->integer('user_id')->unsigned();
            $table->integer('medicine_id')->unsigned();
            $table->float('medicine_price', 8, 2);
            $table->bigInteger('medicine_quantity');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('medicine_id')
            ->references('medicine_id')
            ->on('medicines')
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
        Schema::dropIfExists('mycarts');
    }
}
