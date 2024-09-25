<?php

namespace App\Http\Controllers\Panel;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DatatableRequest;
use App\Http\Requests\Panel\UserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->datatable(new DatatableRequest($request));
        }

        return view('panel.users.index');
    }

    public function datatable(DatatableRequest $request)
    {
        $users = User::latest()
                       ->paginate($request->per_page, ['*'], 'page', $request->page);

        $total = $users->total();
        $users  = $users->map(fn($user) => [
            $user->id,
            $user->username,
            view('panel.users.datatable.actions', compact('user'))->render(),
        ]);

        return $request->jsonResponse($total, $users);
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
