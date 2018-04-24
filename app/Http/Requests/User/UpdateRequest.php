<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,'.$this->route('user')->id,
            // 'password' => 'string|min:6|confirmed',
            'mobile'   => 'required|numeric|digits_between:10,11|unique:users,mobile,'.$this->route('user')->id,
            'role'     => 'required|string'
        ];
    }
}
