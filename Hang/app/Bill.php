<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\BillDetail;
class Bill extends Model
{
    protected $table ='bills';
    protected $guarded =[];

    public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_bill','id');
    }

    public function user(){
    	return $this->belongsTo('App\User','id_customer');
    }
}
