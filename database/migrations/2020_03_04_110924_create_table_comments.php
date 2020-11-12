<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('id',11);
            $table->integer('customer_id')->nullable()->comment('Mã khách hàng nếu có tài khoản');
            $table->string('full_name', 255)->comment('Họ và tên người bình luận');
            $table->string('email', 255)->comment('Email người bình luận đánh giá')->nullable();
            $table->integer('product_id')->nullable()->comment('Mã sản phẩm nếu bình luận trong 1 sản phẩm nào đó');
            $table->integer('blog_id')->nullable()->comment('Mã tin tức nếu bình luận trong trang tin');
            $table->text('message')->comment('Nội dung bình luận đánh giá');
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
        Schema::dropIfExists('comments');
    }
}
