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
            $table->integer('id',11);
            $table->string('full_name',255)->comment('Tên tài khoản');
            $table->string('email',255)->comment('Email or tên đăng nhập');
            $table->string('password',255)->comment('Mật khẩu');
            $table->string('address',255)->comment('Địa chỉ');
            $table->string('phone_number',50)->comment('Số điện thoại');
            $table->string('avatar',255)->comment('Ảnh đại diện');
            $table->tinyInteger('gender')->default(0)->comment('Giới tính');
            $table->boolean('confirmed')->default(0)->comment('Trạng thái đã kích hoạt hay chưa');
            $table->string('confirmation_code')->nullable()->comment('Mã kích hoạt tài khoản');
            $table->tinyInteger('level')->default(0)->comment('phân quyền tài khoản');
            $table->rememberToken()->nullable();
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
