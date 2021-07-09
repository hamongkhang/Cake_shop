<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function news(){
    	return view('admin.slide.list');
    }
}
