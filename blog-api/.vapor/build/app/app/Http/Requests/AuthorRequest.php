<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'name' => 'required|string',
            'about' => 'nullable|string',
            'image' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'github' => 'nullable|string',
            'instagram' => 'nullable|string'
        ];
    }
}
