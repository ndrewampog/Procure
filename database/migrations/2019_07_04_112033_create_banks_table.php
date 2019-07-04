<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('bank_id');
            $table->integer('payment_id')->unsigned();  
            $table->string('bank_name');
            $table->string('bank_account'); 
            $table->string('bank_password');
            $table->string('amount');   

            $table->foreign('payment_id')
            ->references('payment_id')
            ->on('payments')
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
        Schema::dropIfExists('banks');
    }
}
