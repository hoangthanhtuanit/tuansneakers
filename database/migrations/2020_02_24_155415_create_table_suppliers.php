<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSuppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->integer('id',11);
            $table->string('name',255)->comment('Tên nhà phân phối');
            $table->string('address',255)->comment('Địa chỉ');
            $table->string('phone_number',25)->comment('Số điện thoại');
            $table->string('email',255)->comment('Thư điện tử');
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
        Schema::dropIfExists('suppliers');
    }
}
