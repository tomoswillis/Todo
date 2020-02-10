<?php

namespace App\Domain\Tasks;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'task' => 'required|max:255',
            'due' => 'required|date',
        ];
    }
}