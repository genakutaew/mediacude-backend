<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'middle_name' => 'required|string',
            'last_name' => 'nullable|string',
            'gender' => [
                'nullable',
                Rule::in(['male', 'female'])
            ],
            'salary' => 'nullable|numeric',
            'departments_ids' => 'array|required'
        ];
    }

    public function messages()
    {
        return [
            'departments_ids.required' => 'Поле \'Департамент\' обязательно для ввода',
            'departments_ids.array' => 'Поле \'Департамент\' должно быть массивом',
            'first_name.required' => 'Поле \'Имя\' обязательно для ввода',
            'first_name.string' => 'Поле \'Имя\' должно быть текстовым',
            'middle_name.required' => 'Поле \'Фамилия\' обязательно для ввода',
            'middle_name.string' => 'Поле \'Фамилия\' должно быть текстовым',
            'salary.numeric' => 'Поле \'Зарплата\' должно быть числовым'
        ];
    }
}
