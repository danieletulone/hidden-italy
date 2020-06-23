<?php

namespace App\Http\Requests\Monuments;

use Illuminate\Foundation\Http\FormRequest;

class FindNearestRequest extends FormRequest
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
        if ($user = auth()->user()) {
            return $user->hasScope('read-monuments');
        }

        return false;
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
            'lat'      => 'numeric|required',
            'lon'      => 'numeric|required',
            'page'     => 'int',
            'per_page' => 'int',
            'range'    => 'numeric'
        ];
    }
}
