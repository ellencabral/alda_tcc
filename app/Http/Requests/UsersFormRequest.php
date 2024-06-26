<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsersFormRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if (request()->isMethod('POST')) {
            $emailRule = 'unique:users,email';
        } else {
            $emailRule = Rule::unique('users')->ignore($this->user['id']);
        }

        return [
            'name' => ['required', 'min:3'],
            'email' => [
                'required',
                'email',
                $emailRule
            ],
            'password' => [
                Rule::when(request()->isMethod('POST'), 'required|min:6'),
            ]
        ];
    }

    public function messages(): array
    {
        return [
        ];
    }
}
