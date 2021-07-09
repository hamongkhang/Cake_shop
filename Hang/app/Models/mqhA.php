<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mqhA extends Model
{
        
    public function B(){
        return $this->hasMany('App\mqhB','id_mqhA','id');
    }
}
