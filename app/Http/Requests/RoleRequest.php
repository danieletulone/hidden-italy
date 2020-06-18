<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'name'   => 'string|required',
            'scopes' => 'array|required'
        ];
    }
}
