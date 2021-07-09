<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oder extends Model
{
    protected $table ='bills';
	protected $guarded =[];

	public function user()
    {
        return $this->belongsTo('App\User','c_id');
    }
    public function bill_detail()
	{
		return $this->hasMany('App\Oders_detail','o_id');
	}
}
