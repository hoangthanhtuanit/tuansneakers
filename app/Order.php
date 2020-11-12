<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = 'orders';

    public function customers()
    {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function orderDetails()
    {
        return $this->hasMany(Order::class,'order_id','id');
    }
}
