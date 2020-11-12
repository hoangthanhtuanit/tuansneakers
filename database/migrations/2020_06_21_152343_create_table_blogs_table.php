<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->integer('id',11);
            $table->string('image',255)->comment('Ảnh tiêu đề');
            $table->string('title', 255)->comment('Tiêu đề tin');
            $table->integer('liked')->default(0)->unsigned()->comment('Số lượt thích');
            $table->text('summary')->comment('Nội dung tin');
            $table->tinyInteger('status')->comment('Trạng thái tin')->default(0);
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
        Schema::dropIfExists('blogs');
    }
}
