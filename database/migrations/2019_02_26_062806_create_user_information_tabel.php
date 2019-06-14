<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInformationTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('lname')->nullable();
            $table->date('birthday')->nullable();
            $table->enum('civil_status',['Single','Married','Divorced','Widowed '])->nullable();
            $table->enum('gender',['Male','Female'])->nullable();
            $table->bigInteger('contact')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('pwd_id_number')->nullable();
            $table->string('pwd_image_id')->nullable();
            $table->string('senior_id_number')->nullable();
            $table->string('senior_image_id')->nullable();
            $table->string('pharma_name')->nullable();
            $table->string('pharma_logo')->nullable();
            $table->string('pharma_website')->nullable();
            $table->string('date_certified')->nullable();
            $table->string('date_expiration')->nullable();
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
        Schema::dropIfExists('user_informations');
    }
}
