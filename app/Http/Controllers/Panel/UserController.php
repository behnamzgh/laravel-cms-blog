<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\Rule;
use App\Http\Requests\Panel\User\CreateUserRequest;
use App\Http\Requests\Panel\User\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return \view('panel.users.index', \compact('users'));
    }

    public function create()
    {
        return \view('panel.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        // 1.1 validate dakhele controller ba Request
        // $request->validate([
        //     'name' => ['required', 'max:255', 'string'],
        //     'email' => ['required', 'max:255', 'email', 'unique:users'],
        //     'phone' => ['required', 'max:255', 'string', 'unique:users'],
        // ]);

        // or

        // 1.2 validate ba requesti k khodemon sakhtim va dakhele function farakhani kardim

        // 2.ijad yek araye az data daryafti az form
        $data = $request->only(['name','email','phone','role']);
        // 3.hash kardan kalame 'password' va ezafe kardan in kalame b araye $data
        $data['password'] = Hash::make('password');
        // 4.ezafe kardan $data b database ba estefade az modele User
        User::create($data);
        // 5.redirect b safhe namayesh karbaran
        return \redirect()->route('users.index');
    }

    // bejaye daryafte id va bad find($id) kardan on ba estefade az model mostaghim az raveshe route model binding estefade mikonim
    public function edit(User $user)
    {
        return \view('panel.users.edit', \compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        // 1.1
        // $request->validate([
        //     'name' => ['required', 'max:255', 'string'],
        //     'email' => ['required', 'max:255', 'email', Rule::unique('users')->ignore($user->id)],
        //     'phone' => ['required', 'max:255', 'string', Rule::unique('users')->ignore($user->id)],
        // ]);

        // or

        // 1.2 validate ba requesti k khodemon sakhtim va dakhele function farakhani kardim

        // 2. update
        $user->update(
            $request->only(['name','email','phone','role'])
        );

        // 3. redirect
        return \redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return \back();
    }
}
