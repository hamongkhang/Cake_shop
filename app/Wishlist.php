<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{

    protected $table = 'wishlist';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','id_product','name','qty','price','image'
    ];
}
