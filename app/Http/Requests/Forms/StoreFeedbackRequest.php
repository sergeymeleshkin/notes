<?php

namespace App\Http\Requests\Forms;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'message' => 'required|min:2'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'email.required' => 'Email - обязательное поле!',
            'email.email' => 'Email - недопустимое значение!',
            'message.required' => 'Сообщение - обязательное поле!',
            'message.min' => 'Сообщение - должно содержать не менее 2 символов.',
        ];
    }
}
