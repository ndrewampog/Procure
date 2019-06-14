<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('notifications', function (Blueprint $table) {
            $table->increments('notification_id');
            $table->integer('sender_id')->unsigned();
            $table->integer('receive_id')->unsigned();
            $table->longtext('notification_message');
            $table->timestamps();
            
            $table->foreign('sender_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('receive_id')
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
        Schema::dropIfExists('notifications');
    }
}
