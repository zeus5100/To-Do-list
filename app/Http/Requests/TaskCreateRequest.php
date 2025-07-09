<?php

namespace App\Http\Requests;

use App\Enums\Priority;
use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TaskCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'priority' => ['required', 'string', Rule::in(Priority::values())],
            'status' => ['required', 'string', Rule::in(Status::values())],
            'completion_date' => 'required|date|date_format:Y-m-d',
        ];
    }
}
