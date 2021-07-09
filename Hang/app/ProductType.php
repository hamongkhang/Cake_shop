<?php

namespace App;
use App\Comment;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table='type_products';
    public function product(){
    	return $this ->hasMany('App\Product','id_type','id');
    }
    
}
