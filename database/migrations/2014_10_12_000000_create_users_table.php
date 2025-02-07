<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            //$table->string('phone')->unique();
            $table->string('phone')->default("12345678");
            $table->string('password');
            $table->integer("role_id")->default(3);
            $table->integer("doctor_info_id")->default(0);
            $table->integer("patient_info_id")->default(0);
            $table->string('photo')->default(asset('/images/userphoto/default.png'));
            $table->boolean("active")->default(true);

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
