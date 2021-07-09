<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\User;
use App\Product;
use Auth;
class AdminController extends Controller
{
    public function getAdmin(){
    	$oder = Bill::count('*');
    	$oder_new=Bill::where('status',0)->count('*');
    	$mem = User::count('*');
    	$product= Product::count('*');
    	return view('admin.home',compact('oder','oder_new','mem','product'));
    }

    public function getLogin(){
    	return view('admin.auth.login');
    }

    public function postLogin(Request $req){
    	/*dd($req->all());*/
    	$data = $req->only('email', 'password');

        if (Auth::guard('admins')->attempt($data)) {
    		return redirect()->intended('admin');
        }
        return redirect()->back();
    }
    public function LogoutAdmin(){
    	Auth::guard('admins')->logout();
    	return redirect(route('auth.login'))->with('flag','Bạn đã đăng xuất , vui lòng đăng nhập lại để vô quản trị admin');
    }
}
