<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactUpdateRequest extends FormRequest
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
            
            'Code'=>'unique|required|string|max:10',
            'Name'=>'required|string|max:100',
            'Email'=>'unique|required|string|max:100',
            'Phone'=>'string|max:20',
            'Mobile'=>'string|max:20',
            'Street'=>'String',
            'City'=>'String',
            'State'=>'String',
            'Zip'=>'String',
            'Country'=>'String',
            'VAT'=>'String',
        ];
    }
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            'errors' => $validator->getMessageBag(),
        ], 400));
    }
}
