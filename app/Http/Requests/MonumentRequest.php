<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MonumentRequest extends FormRequest
{
    /**
     * Default rules.
     *
     * @var array
     */
    public $rules = [
        'name' => ['required', 'max:50'],
        'description' => ['required', 'max:500'],
        'lat' => ['required', 'max:10'],
        'lon' => ['required', 'max:10'],
        'main_category_id' => ['required'],
        'url' => ['array', 'required'],
        'url.*' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:10000'], //max 10000kb
        'categories' => ['array'],
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
        $rules = $this->rules;

        if ($this->has('id')) {
            $rules['url'] = ['array'];
        }

        return $rules;
    }
}
