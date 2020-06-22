<?php

namespace App\Http\Requests;

use App\Traits\Requests\HasCrudScope;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    use HasCrudScope;

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
