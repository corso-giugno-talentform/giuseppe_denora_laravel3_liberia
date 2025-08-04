<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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

            'name' => ['required', 'max:150', 'string'], //perche ho scelto max 150caratteri
            'year' => ['integer'], //era facoltativo 
            'pages' => ['integer'], //era facoltativo 
            'image'=>['mimes:jpg,jpeg,bmp,png']

        ];
    }
public function messages()
    {
        return [
            'name.required' => 'AOho manca il dato.',
            'name.max' => 'Troppi caratteri',
            'year.integer' => 'non accetto lettere',
        ];
    }

    }

