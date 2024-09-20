<?php

namespace App\Http\Controllers\Panel;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\UserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()
                     ->paginate();

        return view('panel.users.index', compact('users'));
    }

    public function create()
    {
        return view('panel.users.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();

        User::create($data);

        return to_route('panel.users.index');
    }

    public function edit(User $user)
    {
        return view('panel.users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();

        if (is_null($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return to_route('panel.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return to_route('panel.users.index');
    }
}
