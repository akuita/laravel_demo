<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'users.name' => 'required|string|max:255|min:0',
            'users.email' => 'required|string|email|unique:users,email',
        ];
    }

    protected function passedValidation()
    {
        $this->replace([
            'name' => $this->string('users.name'),
            'email' => $this->string('users.email'),
        ]);
    }
}
