<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Closure;

class RequestResetPassword extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password'=>'required',
            'password_confirm'=>'required|same:password'
        ];
    }
    public function messages(){
        return [
            'password.required'=>'trường này không được bỏ trống',
            'password_confirm.required'=>'trường này không được bỏ trống',
            'password_confirm.same'=>'Mật khẩu xác nhận không trùng khớp'
        ];
    }
}
