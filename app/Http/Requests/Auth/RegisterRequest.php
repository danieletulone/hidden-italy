<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    /**
     * Rules for valitation process.
     *
     * @var array
     */
    public static $rules = [
        'firstname' => ['required', 'string', 'max:255'],
        'lastname'  => ['required', 'string', 'max:255'],
        'email'     => ['required', 'string', 'email:rfc,filter', 'max:255', 'unique:users'],
        'password'  => ['required', 'string', 'min:8', 'confirmed'],
    ];

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
        return self::$rules;
    }
}
