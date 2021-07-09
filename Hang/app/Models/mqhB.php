<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mqhB extends Model
{
    // use HasFactory;
    // protected $table = "As";tên bảng phải có s
    //id là khóa chính
    //gồm có tên bảng và id_type là khóa ngoại của bảng product
    
        public function A(){
            return $this->belongsTo('App\mqhA','id_mqhA','id');//App\ten model (mqhA), tên khóa ngoại (id_mqhA), (id) khóa chính
        }
}
