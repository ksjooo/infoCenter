<?php

namespace App\Http\Requests\Sales;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Src\Sales\DTO\CreateSaleDto;

class CreateSaleRequest extends FormRequest
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
            'seller_id' => 'nullable|string',
            'products' => 'required|array',
        ];
    }

    /**
     * @throws UnknownProperties
     */
    public function toDto(): CreateSaleDto
    {
        return new CreateSaleDto($this->all());
    }
}
