<?php

namespace App\Http\Requests\Dtm;

use Illuminate\Foundation\Http\FormRequest;

class StudentDtmRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'count_answers' => 'required|max_digits:255',
            'student_id' => 'required',
            'group_id' => 'nullable'
        ];
    }
}
