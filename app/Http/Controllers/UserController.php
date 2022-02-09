<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user',
            ['users' => User::query()->whereIsAdmin(false)->get()]);
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $password = $request->input('password') ?? 'password';
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($password),
        ]);

        toastr()->success('User Created Successfully');
        return back();
    }
}
