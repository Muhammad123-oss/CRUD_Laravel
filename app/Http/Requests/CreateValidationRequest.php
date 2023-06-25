<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\UpperCase;

class CreateValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;//It's need to be true in order to send data to DB. Otherwise we get Unauthorize Error
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['unique:cars','required',new UpperCase],//Here we specify tableName along with unique. We can also set columnName.
            'founded'=>'required|integer|min:0|max:2023',//Min and Max means we set minimum and maximum value for founded column
            // Here we are also applying our own define rule UpperCase
            'description'=>['required',new UpperCase]
        ];
    }
}
