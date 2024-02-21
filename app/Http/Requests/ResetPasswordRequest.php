<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Src\Users\DTO\ResetPasswordDto;

class ResetPasswordRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'password' => 'required|string|min:6',
            'password_confirm' => 'required|string|min:6',
            'token' => 'required'
        ];
    }

    /**
     * @throws UnknownProperties
     */
    public function toDto(): ResetPasswordDto
    {
        return new ResetPasswordDto($this->all());
    }
}
