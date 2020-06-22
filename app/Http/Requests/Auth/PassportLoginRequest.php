<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class PassportLoginRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     * No additional checks required.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
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
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @return array
     */
    public function rules()
    {
        return [
            'email'     => ['email', 'required'],
            'password'  => ['required']
        ];
    }
}
