<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('history_items', function (Blueprint $table) {
            $table->increments('historyitem_id');
            $table->integer('historycart_id')->unsigned();
            $table->integer('medicine_id')->unsigned();
            $table->bigInteger('historyitem_quantity');
            $table->float('historyitem_price', 8, 2);
            $table->timestamps();

            $table->foreign('medicine_id')
            ->references('medicine_id')
            ->on('medicines')
            ->onDelete('cascade');

            $table->foreign('historycart_id')
            ->references('historycart_id')
            ->on('history_carts')
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
        Schema::dropIfExists('history_items');
    }
}
