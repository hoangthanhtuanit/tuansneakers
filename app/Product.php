<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';

    public function productImages()
    {
        return $this->hasOne(Product_image::class,'product_id','id');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function orderDetails()
    {
        return $this->hasMany(Order_detail::class, 'product_id','id');
    }
}
