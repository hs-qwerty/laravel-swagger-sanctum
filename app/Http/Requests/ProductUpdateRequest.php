<?php

namespace App\Http\Requests;

use App\Enum\ActiveStatus;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
    public function authorize(): bool
    {
        return true;
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => $validator->errors()->first()
        ], 422));
    }
    public function rules(): array
    {
        return [
            'category_id' => 'required|numeric|exists:categories,id',
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'status' => ['required', Rule::in([ActiveStatus::ACTIVE->value, ActiveStatus::PASSIVE->value])],
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'category_id is required',
            'name.string' => 'name value must be of type string',
            'description.string' => 'description value must be of type string',
            'status.required' => 'status is required',
        ];
    }
}
