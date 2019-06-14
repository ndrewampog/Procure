<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('history_carts', function (Blueprint $table) {
            $table->increments('historycart_id');
            $table->integer('user_id')->unsigned();
            $table->string('historycart_discount');
            $table->enum('status_delivery',['Order Confirmation','Shipped','Delivered','Cancel Order'])->nullable();
            $table->string('historycart_total_item');
            $table->string('historycart_shipping_fee');
            $table->string('historycart_total_price');
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('history_carts');
    }
}
