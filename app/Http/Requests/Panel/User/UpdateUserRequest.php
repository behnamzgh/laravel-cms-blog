<?php

namespace App\Http\Requests\Panel\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
        // ba estefade az route migim parameter user ro etelaatesh ro begire k betonim inja to validation behesh dastresi dashte bashim
        $user = $this->route('user');

        return [
            'name' => ['required', 'max:255', 'string'],
            // vaghti karbar mikhad virayesh kone etelaatesh ro baraye jologiri az khataye database k email ya phone
            // yekbar dar database zakhire shode ba estefade az Rule migim to table users in $user->id ro bikhial she baraye update
            'email' => ['required', 'max:255', 'email', Rule::unique('users')->ignore($user->id)],
            'phone' => ['required', 'max:255', 'string', Rule::unique('users')->ignore($user->id)],
        ];
    }
}
