<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
class RoomRequest extends FormRequest
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
            'nameroom'=>'required|string',
            'image'=>'required|filled|image|mimes:jpeg,png,jpg,gif,svg|max:25000',
            'typeroom' => 'required|string',
            'price'=>'required',
            'description'=> 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'nameroom.string '=>'Vui lòng nhập tên phòng',
            'gia.required'=>'Vui lòng nhập giá',
            'description.string'=> 'Vui lòng ghi nội dung',
            'image.required'=>'Bạn chưa chọn ảnh',
            'image.filled'=>'Bạn chưa chọn ảnh',
            'image.max'=>'Kích thước ảnh tối đa là 25Mb',
        ];
    }
}
