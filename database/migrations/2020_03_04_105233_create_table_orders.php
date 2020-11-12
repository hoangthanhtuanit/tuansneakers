<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('id',11);
            $table->integer('customer_id')->nullable();
            $table->string('full_name', 255)->comment('Họ tên khách hàng');
            $table->date('date_order')->comment('Ngày đặt hàng');
            $table->date('date_shipped')->comment('Ngày giao hàng')->nullable();
            $table->string('address', 255)->comment('Địa chỉ nhân hàng');
            $table->string('phone_number',30)->comment('Số điện thoại nhận hàng');
            $table->string('email', 255)->comment('Thư điện tử');
            $table->string('postal_id', 255)->comment('Mã định danh bưu phẩm');
            $table->tinyInteger('payment')->comment('Phương thức thanh toán');
            $table->text('note')->nullable()->comment('Yêu cầu thêm');
            $table->integer('total_price')->unsigned()->comment('Tông thanh toán');
            $table->tinyInteger('status')->comment('Trạng thái')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
