<?php

namespace App\Modules\Employee\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'country_id'     => 'required|exists:countries,id',
            'name'           => 'required|string',
            'preferred_name' => 'nullable|string',
            'email'          => 'required|email|unique:employees,email',
            'joined_date'    => 'required|date_format:Y-m-d',
        ];
    }
}
