<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class WarehouseController extends Controller
{
    public function khohang(Request $req){
    	$product =Product::where('pro_number','<=',5)->paginate(5);
    	return view('admin.warehouse.list',compact('product'));
    }
}
