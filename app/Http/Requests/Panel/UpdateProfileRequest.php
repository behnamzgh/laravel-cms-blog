<?php

namespace App\Http\Requests\Panel;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'profile' => ['nullable', 'image', 'max:2024'],
            'name' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'max:255', Rule::unique(User::class)->ignore(auth()->user()->id)],
            'email' => ['required', 'email', 'max:255', Rule::unique(User::class)->ignore(auth()->user()->id)],
            'password' => ['nullable', 'min:8', 'confirmed']
        ];
    }
}
