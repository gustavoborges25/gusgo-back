<?php

namespace Modules\Control\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'email|required',
            'password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O e-mail é obrigatório!',
            'password.required' => 'A senha é obrigatória!',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
