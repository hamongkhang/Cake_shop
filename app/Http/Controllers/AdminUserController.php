<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;

class AdminUserController extends Controller
{
     public function nhanvien(){
     	$data = Admin::paginate(10)->first();
    	return view('admin.admin_mem.list',['data'=>$data]);
    }
}
