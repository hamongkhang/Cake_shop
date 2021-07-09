<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
//id là khóa chính
//gồm có tên bảng và id_type là khóa ngoại của bảng product
    public function product_type(){
        return $this->belongsTo('App\ProductType','id_type','id');
    }

    public function bill_detail(){
        return $this->hasMany('App\BillDetail','id_product','id');
    }
}