<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'subject' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:500'],
            'start_date' => ['required', 'date'],
            'due_date' => ['required', 'date'],
            'status' => ['required', 'in:New,Incomplete,Complete'],
            'priority' => ['required', 'in:High,Medium,Low'],
        ];
    }

    public function messages()
    {
        return [
            'subject.required' => 'subject is required!',
            'description.required' => 'description is required!',
            'start_date.required' => 'start_date is required!',
            'due_date.required' => 'due_date is required!',
            'status.required' => 'status is required!',
            'priority.required' => 'priority is required!'
        ];
    }
}
