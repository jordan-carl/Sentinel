<?php

namespace Sentinel\FormRequests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
        $rules =  [
            'email' => 'required|min:4|max:254|email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ];

        // If Usernames are enabled, add username validation rules
        if (config('sentinel.allow_usernames')) {
            $rules['username'] = 'required|unique:users,username';
        }

        return $rules;
    }
}
