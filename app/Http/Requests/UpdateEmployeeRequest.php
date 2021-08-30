<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
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
            'id' => 'numeric|required',
            'department_id' => 'array|required',
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
            'id.required' => 'Поле \'Id\' обязательно для ввода',
            'id.numeric' => 'Поле \'Id\' должно быть числовым',
            'department_id.array' => 'Поле \'Департамент\' обязательно для ввода',
            'department_id.required' => 'Поле \'Департамент\' должно быть числовым',
            'first_name.required' => 'Поле \'Имя\' обязательно для ввода',
            'middle_name.required' => 'Поле \'Фамилия\' обязательно для ввода',
            'last_name.required' => 'Поле \'Отчество\' обязательно для ввода',
            'gender.required' => 'Поле \'Пол\' обязательно для ввода',
            'salary.required' => 'Поле \'Зарплата\' обязательно для ввода',
            'salary.numeric' => 'Поле \'Зарплата\' должно быть числовым'
        ];
    }
}