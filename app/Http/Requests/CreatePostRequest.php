<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title'=> 'required|max:20',
            'description'=>'required',
            'file'=> 'required|mimes:jpeg,jpg,png|max:1000',

        ];
    }
    public function messages()
    {
        return
        [
            'title.required'=> 'لطفا عنوان مطلب مورد نظر خود را وارد کنید' ,
            'title.max'=> 'عنوان مطلب شما نباید دارای 20 کاراکتر به بالا باشد',
            'description.required'=> 'لطفامحتوا عنوان مطلب مورد نظر خود را وارد کنید' ,
            'file.required'=>'باید عکس خود را بارگذاری کنید.',
            'file.mimes'=>'تصویر شما باید حتما با پسوند peg,jpg,pnj باشد',
            'file.max'=>'حجم تصویر شما باید 1000 باشد',
        ];
    }
}
