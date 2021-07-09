<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Mail;
use App\User;
use App\Http\Requests\RequestResetPassword;



class ForgotPasswordController extends Controller
{
    public function getFormResetPassword (){
        return view('auth.passwords.email');
    }

    public function sendCodeReset(Request $req){
        $email= $req->email;
        $checkUser= User::where('email',$email)->first();

        if(!$checkUser)
        {
            return redirect()->back()->with('danger','email này không tồn tại');
        }

       

        $code=bcrypt(md5(time().$email));
        $checkUser->code=$code;
        $checkUser->time_code=date('Y-m-d');
        $checkUser->save();

        $url=route('get.link.reset.password',['code'=>$checkUser->code,'email'=>$email]);
        $data =[
            'route'=>$url
        ];
        Mail::send('email.reset_password',$data, function($message) use($checkUser){
            $message->to($checkUser->email, 'Visitor')->subject('Lấy lại mật khẩu');
        });
        return redirect()->back()->with('success','Link khôi phục mật khẩu đã được gửi tới email của bạn') ; 


    }

    public function resetPassword(Request $req){
        $code= $req->code;
        $email=$req->email;
        $checkUser= User::where([
            'code'=>$code,
            'email'=>$email
        ])->first();

        /*if(!$checkUser)
        {
             return redirect()->back()->with('danger','Xin lỗi ! đường dẫn lấy lại mật khẩu không đúng , bạn vui lòng thử lại sau');

        }*/

        return view('auth.passwords.reset');
    }

    public function saveResetPassword(RequestResetPassword $requestResetPassword){
        
        if($requestResetPassword->password)
        /*dd($requestResetPassword->all());*/
        {

            $code= $requestResetPassword->code;
            $email=$requestResetPassword->email;
            $checkUser= User::where([
                'code'=>$code,
                'email'=>$email
            ])->first();

            if(!$checkUser)
            {
                return redirect()->back()->with('danger','Xin lỗi ! đường dẫn lấy lại mật khẩu không đúng , bạn vui lòng thử lại sau');
            }
            $checkUser->password=bcrypt($requestResetPassword->password);

            $checkUser->save();
            return redirect(route('login'))->with('success','Mật khẩu đã được đổi thành công,mời bạn đăng nhập');
        }
    }
}
    
