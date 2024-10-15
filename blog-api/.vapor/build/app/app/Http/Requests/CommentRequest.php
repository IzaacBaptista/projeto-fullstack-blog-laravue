<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'id_article' => 'required|integer',
            'id_user' => 'required|integer',
            'name' => 'required|string',
            'email' => 'nullable|email',
            'comment' => 'required|string'
        ];
    }
}
