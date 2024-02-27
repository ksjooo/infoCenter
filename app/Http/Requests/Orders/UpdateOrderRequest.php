<?php

namespace App\Http\Requests\Orders;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Src\Orders\DTO\UpdateOrderDto;

class UpdateOrderRequest extends FormRequest
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
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'cabinet' => 'nullable|string',
            'status' => 'nullable|string',
            'initiator_name' => 'nullable|string',
            'initiator_id' => 'nullable|string',
            'acceptor_id' => 'nullable|string',
        ];
    }

    /**
     * @throws UnknownProperties
     */
    public function toDto(): UpdateOrderDto
    {
        return new UpdateOrderDto($this->all());
    }
}
