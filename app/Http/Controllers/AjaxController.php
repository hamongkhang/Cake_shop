<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductType;
use App\Product;

class AjaxController extends Controller
{
    public function getIdtype($iddanhmuc){
    	$id_type = ProductType::where('id',$iddanhmuc)->get();
    	foreach($id_type as $typer){
    		 echo "<option value='".$typer->id."'>".$typer->id."</option>";
    	}
    }
}
?>
