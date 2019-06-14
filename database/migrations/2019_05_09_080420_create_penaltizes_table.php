<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenaltizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('penaltizes', function (Blueprint $table) {
            $table->increments('penalty_id');
            $table->integer('user_id')->unsigned();
            $table->bigInteger('penalty_count');
            $table->date('penalty_duration');
            $table->enum('penalty_status',['Normal','Suspended','Permanent Suspension'])->nullable();
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
        Schema::dropIfExists('penaltizes');
    }
}
