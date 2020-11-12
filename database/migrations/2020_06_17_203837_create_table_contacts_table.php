<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->integer('id',11);
            $table->string('full_name',255)->comment('Tên người liên hệ');
            $table->string('phone_number',20)->comment('Số điện thoại người liên hệ');
            $table->string('email',255)->comment('Email người liên hệ');
            $table->string('address',255)->comment('Địa chỉ người liên hệ');
            $table->string('message',255)->comment('Nội dung');
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
        Schema::dropIfExists('contacts');
    }
}
