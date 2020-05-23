<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonumentRequest extends FormRequest
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
					'name' => ['required', 'max:50'],
					'description' => ['required', 'max:500'],
					'lat' => ['required', 'max:10'],
					'lon' => ['required', 'max:10'],
					'url' => ['mimes:jpeg,jpg,png,gif','required','max:10000'], //max 10000kb
        ];
    }
}
