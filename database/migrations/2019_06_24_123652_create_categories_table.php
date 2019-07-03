<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
           $table->increments('category_id');
           $table->integer('user_id')->unsigned();
           $table->string('category_name')->nullable();
           $table->string('category_message')->nullable();
           $table->enum('category_status',['Approved','Pending','Declined'])->nullable();


            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');



        });    }

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
