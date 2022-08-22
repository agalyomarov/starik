<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'unique:users,phone'],
            'name' => ['required', 'alpha'],
            'last_name' => ['required', 'alpha'],
            'patronymic' => ['required', 'alpha'],
            'birthday' => ['required'],
            'soc_link' => ['required', 'url'],
            'adress' => [],
            'about' => [],
            'password' => ['required', 'confirmed', 'min:8'],
            'code' => ['required', 'exists:sms_verifies,code']
        ];
    }
}
