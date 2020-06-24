<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateClusterRequest extends FormRequest
{

    /**
     * The required scopes for this request.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @var array
     */
    private $requiredScopes = [
        'use-admin-dashboard',
        'read-monuments',
        'read-users'
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
        if ($user = auth()->user()) {
            return $user->hasScopes($this->requiredScopes);
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
            'cluster' => 'string|in:day,month,year|required',
            'day'     => 'int|required_if:cluster,day',
            'month'   => 'int|required_if:cluster,day,month',
            'year'    => 'int|required'
        ];
    }
}
