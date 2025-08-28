<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreChatMessageRequest extends FormRequest
{
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'message' => 'required|string|max:500',
            'user' => 'required|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'message.required' => 'El mensaje es obligatorio.',
            'message.max' => 'El mensaje no puede tener más de 500 caracteres.',
            'user.required' => 'El nombre de usuario es obligatorio.',
            'user.max' => 'El nombre de usuario no puede tener más de 50 caracteres.',
        ];
    }
}
