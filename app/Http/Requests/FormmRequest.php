<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormmRequest extends FormRequest
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
            "firstName"=>['required', 'string','max:300'],
            "lastName"=>['required', 'string','max:300'],
            "fatherName"=>['required', 'string','max:300'],
            "motherName"=>['required', 'string','max:300'],
            "iss"=>['required', 'string','regex:/^[0-9]{11}$)/'],
            "birthDate"=>['required', 'string','max:255'],
            "birthDateArea"=>['required', 'string','max:500'],
            "joinType"=>['required', 'string','max:600'],
        ];
    }
}
