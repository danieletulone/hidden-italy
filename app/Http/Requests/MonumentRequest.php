<?php

namespace App\Http\Requests;

use App\Traits\Requests\HasCrudScope;
use Illuminate\Foundation\Http\FormRequest;

class MonumentRequest extends FormRequest
{
    use HasCrudScope;

    /**
     * Default rules.
     *
     * @var array
     */
    public $rules = [
        'name' => ['required', 'max:50'],
        'description' => ['required', 'max:500'],
        'lat' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/', 'max:10'],
        'lon' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/', 'max:10'],
        'main_category_id' => ['required'],
        'url' => ['array', 'required'],
        'url.*' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:10000'], //max 10000kb
        'categories' => ['array'],
    ];

    /**
     * Determine if the user is authorized to make this request.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->hasCrudScope() || $this->canManage();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = $this->rules;

        if ($this->monument != null) {
            $rules['url'] = ['array'];
        }

        return $rules;
    }
}
