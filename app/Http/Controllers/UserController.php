<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function user(){
    	$users = User::all();
    	return view('admin.users.list',compact('users'));
    }
}
