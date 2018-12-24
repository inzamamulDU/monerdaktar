<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('address')->nullable();
            $table->string('postcode')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->text('biography')->nullable();
            $table->string('designation')->nullable();
            $table->string('institute')->nullable();
            /*$table->string('available_time')->nullable();*/
            $table->string('degree')->nullable();
            $table->boolean('is_consultant')->default(false);
            $table->boolean('is_psychotherapist')->default(false);
            $table->foreign('user_id') ->references('id')->on('users') ->onDelete('cascade');

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
        Schema::dropIfExists('doctor_infos');
    }
}
