<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';
    //public function bill()
    // {
    //     $bills = array
    //     (
    //         $bills['bill']->links() 
    //     // public function bill_list(){
    //     //     $bill_list = Bill_list::where('user_id', $this->user_id)->with('property')->orderBy('created_at', 'desc')->paginate(4);
    //     // }
    //     );
    // }
}
