<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Panel\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return \view('panel.profile');
    }

    public function update(UpdateProfileRequest $request, User $user)
    {
        // 1
        $data = $request->validated();
        // 2
        if($request->hasFile('profile')){
            $file = $request->file('profile');
            $ext = $file->getClientOriginalExtension();
            $file_name = auth()->user()->id . "_" . now() . "." . $ext;
            $file->storeAs('/images/users', $file_name, 'public_files');
            $data['profile'] = $file_name;
        }
        // 3
        if($request->password){
            $data['password'] = Hash::make($request->password);
        } else {
            // agar karbar password ersal nekone on ro be soorate null pass mide b DB
            // k ba unset kardan on inja kolan jolo giri mikonim az update password to DB
            unset($data['password']);
        }
        // 4
        // on chizi k update mikone in dastoore
        // jalebe k dare khata migire ro method update ama kar mikone
        \auth()->user()->update($data);
        // 5
        \session()->flash('status', 'اطلااعات کاربری شما به روز شد');
        return back();

    }

}
