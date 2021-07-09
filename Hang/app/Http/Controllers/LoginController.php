<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Login;

class LoginController extends Controller
{
    protected function create( array $data)
    {
        return Login::create([
            'email' =>  $data['email'],
            'pass' => $data['password'],
        ]);
        
    }
    public function __construct() {
        @session_start();        
    }    
    public function getLogin() {
        return view('login');
    }
    public function postLogin(Request $request) {
        // Kiểm tra dữ liệu nhập vào
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:6'
        ];
        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        
        
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');
     
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                $request->session()->put('user', $email);
                $this->create(['email' => $email, 'password' =>$password]);
                return redirect('index');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                Illuminate\Contracts\Session\Session::flash()::flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect('login');
            }
        }
    }
}
