<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data,
         [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'required|max:14',
            'address' => 'required|max:255',
        ],
        [

            'name.required' => 'Hãy nhập vào họ tên của bạn',
            'name.max' => 'Họ tên tối đa 255 ký tự',
            'email.required' => 'Hãy nhập vào địa chỉ Email',
            'email.email' => 'Địa chỉ Email không đúng định dạng',
            'email.max' => 'Địa chỉ Email tối đa 255 ký tự',
            'email.unique' => 'Địa chỉ Email đã tồn tại',
            'password.required' => 'Hãy nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            'phone.required' => 'Hãy nhập số điện thoại',
            'phone.max' => 'Số điện thoại tối đa 14 ký tự',
            'address.required' => 'Hãy nhập vào địa chỉ của bạn',
            'address.max' => 'Địa chỉ được phép nhập tối đa 255 ký tự',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'address' => $data['address'],
            'status' => '1',
        ]);
    }
}
