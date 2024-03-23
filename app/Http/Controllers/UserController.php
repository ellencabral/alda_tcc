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

        $message = session('message.success');

        return view('users.index')
            ->with('users', $users)
            ->with('message', $message);
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        //Auth::login($user);

        return to_route('users.index')
            ->with('message.success', "Usuário '{$user->name}' criado com sucesso");
    }
    public function edit(User $user)
    {
        return view('users.edit')
            ->with('user', $user);
    }
    public function update(User $user, Request $request)
    {
        $user->fill($request->all());
        $user->save();

        return to_route('users.index')
            ->with('message.success', "Usuário '{$user->name}' atualizado com sucesso");
    }
    public function destroy(User $user)
    {
        $user->delete();

        return to_route('users.index')
            ->with('message.success', "Usuário '{$user->name}' removido com sucesso");
    }
}
