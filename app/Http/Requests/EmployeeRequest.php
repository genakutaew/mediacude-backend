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
            'departments_ids' => 'array|required',
            'first_name' => 'string|required',
            'middle_name' => 'string|required',
            'last_name' => 'string|required',
            'gender' => [
                'required',
                Rule::in(['male', 'female'])
            ],
            'salary' => 'numeric|required',
        ];
    }

    public function messages()
    {
        return [
            'departments_ids.required' => 'Поле \'Департамент\' обязательно для ввода',
            'departments_ids.array' => 'Поле \'Департамент\' должно быть массивом',
            'first_name.required' => 'Поле \'Имя\' обязательно для ввода',
            'middle_name.required' => 'Поле \'Фамилия\' обязательно для ввода',
            'last_name.required' => 'Поле \'Отчество\' обязательно для ввода',
            'gender.required' => 'Поле \'Пол\' обязательно для ввода',
            'salary.required' => 'Поле \'Зарплата\' обязательно для ввода',
            'salary.numeric' => 'Поле \'Зарплата\' должно быть числовым'
        ];
    }
}
