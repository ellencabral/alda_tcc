<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function index()
    {
        $users = User::query()->orderBy('name')->get();

        return view('users.indegit x')->with('users', $users);
    }
    public function create(){
        return view('users.create');
    }
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        //Auth::login($user);

        return to_route('users.index');
    }
}
