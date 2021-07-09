<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class ToureRequest extends FormRequest
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
            'id_room'=>'required|integer',
            'name_guest'=>'required|string',
            'phone'=>'required|integer',
            'date_in'=>'required|date',
            'date_out'=>'required|date',
            'number_people' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'id_room.integer'=>'Vui lòng nhập số phòng',
            'date_in.required'=>'Vui lòng chọn ngày đi',
            'date_out.required'=>'Vui lòng chọn ngày đến',
            'number_people.integer' => 'Vui lòng chọn phương tiện vận chuyển',
        ];
    }
}
