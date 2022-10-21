<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class NewOrganismPostRequest extends FormRequest
{
    /**
     * Determine if the user can make the request
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'genus' => 'required',
            'species' => 'required'
        ];
    }

    /**
     * Return a message depending on the validation error
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'genus.required' => 'Genus field is required',
            'species.required' => 'Species field is required'
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     */
    public function failedValidation(Validator $validator): void

    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()

        ]));

    }

}
