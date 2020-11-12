<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    //
    protected $table = 'order_details';

    public function orders()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
