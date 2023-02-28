<?php

namespace App\Http\Requests\Panel\Post;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:255', 'string'],
            'categories' => ['required', 'array'],
            'categories.*' => ['required', 'string'],
            'banner' => ['required', 'image'],
            'content' => ['required']
        ];
    }
}
