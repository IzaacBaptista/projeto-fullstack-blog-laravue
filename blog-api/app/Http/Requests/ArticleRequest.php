<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'id_category' => 'nullable|integer',
            'id_author' => 'nullable|integer',
            'data' => 'nullable|date',
            'time_read' => 'nullable|integer',
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'blockquote' => 'nullable|string',
            'image' => 'nullable|string',
            'pagination' => 'nullable|integer',
            'per_page' => 'nullable|integer',
            'order_by' => 'nullable|string',
            'order' => 'nullable|string',
        ];
    }
}
