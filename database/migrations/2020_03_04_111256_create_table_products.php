<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->integer('id',11);
            $table->integer('category_id');
            $table->integer('supplier_id');
            $table->string('name',255)->comment('Tên sản phẩm');
            $table->string('image',255)->comment('Ảnh sản phẩm');
            $table->string('color',255)->comment('Màu sản phẩm');
            $table->integer('quantity_in_stock')->unsigned()->comment('Số lượng còn trong kho');
            $table->integer('liked')->unsigned()->comment('Số lượng yêu thích')->default(0);
            $table->integer('price')->unsigned()->comment('Giá sản phẩm');
            $table->integer('discount')->unsigned()->comment('Giảm giá')->default(0);
            $table->integer('quantity_sold')->unsigned()->comment('Số lượng đã bán')->default(0);
            $table->string('summary',255)->comment('Mô tả ngắn')->nullable();
            $table->text('description')->nullable()->comment('Chi tiết sản phẩm');
            $table->tinyInteger('status')->comment('Trạng thái sản phẩm');
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
        Schema::dropIfExists('products');
    }
}
