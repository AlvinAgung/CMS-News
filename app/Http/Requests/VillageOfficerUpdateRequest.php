<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VillageOfficerUpdateRequest extends FormRequest
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
            "nip" => "required",
            "name" => "required",
            "address" => "required",
            "gender" => "required",
            "email" => "required",
            "telp" => "required",
            "picture" => "mimes:jpg,jpeg,png|max:5000",
        ];
    }
}
