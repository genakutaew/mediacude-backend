<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDepartmentRequest extends FormRequest
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
            'name' => 'string|required',
            'employees_count' => 'numeric|required',
            'max_salary' => 'numeric|required'
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Поле \'Название\' обязательно для ввода',
            'employees_count.required' => 'Поле \'Количество сотрудников\' обязательно для ввода',
            'employees_count.numeric' => 'Поле \'Количество сотрудников\' должно быть числовым',
            'max_salary.required' => 'Поле \'Максимальная зарплата\' обязательно для ввода',
            'max_salary.numeric' => 'Поле \'Максимальная зарплата\' должно быть числовым'
        ];
    }
}
