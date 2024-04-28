<?php

namespace App\Http\Requests\Prescription;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrescription extends FormRequest
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
            'name' => ['string', 'nullable'],
            'dose' => ['string', 'nullable'],
            'count_per_day' => ['string', 'nullable'],
            'description' => ['string', 'nullable'],
        ];
    }
}
