<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasketRequest extends FormRequest
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
            'id' => 'required|integer|exists:baskets,id',
            'quantity' => 'required|integer|min:1',
            'product_id' => 'required|integer|exists:products,id',

        ];
    }
}
