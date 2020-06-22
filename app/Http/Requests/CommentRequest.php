<?php

namespace App\Http\Requests;

use App\Traits\Requests\HasCrudScope;
use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    use HasCrudScope;
    
    /**
     * Determine if the user is authorized to make this request.
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
        return [
            'content' => ['required', 'max:256'],
        ];
    }
}
