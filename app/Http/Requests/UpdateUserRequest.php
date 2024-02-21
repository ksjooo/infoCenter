<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Src\Users\DTO\UpdateUserDto;

class UpdateUserRequest extends FormRequest
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
            'name' => 'string|min:6',
            'email' => 'email',
            'role' => 'nullable|string'
        ];
    }

    /**
     * @throws UnknownProperties
     */
    public function toDto(): UpdateUserDto
    {
        return new UpdateUserDto($this->all());
    }
}
