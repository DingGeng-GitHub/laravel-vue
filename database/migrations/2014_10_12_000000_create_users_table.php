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
            $table->increments('id')->comment('用户表ID');
            $table->string('name',30)->unique()->comment('用户名  唯一');
            $table->string('password',80)->comment('密码');
            $table->integer('phone',15)->unique()->comment('手机号  唯一');
            $table->string('email',50)->unique()->comment('邮箱  唯一');
            $table->rememberToken()->comment('记住登录token');
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
