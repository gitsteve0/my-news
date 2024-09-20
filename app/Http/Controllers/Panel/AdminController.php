<?php

namespace App\Http\Controllers\Panel;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\AdminRequest;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::latest()->get();

        return view('panel.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('panel.admins.create');
    }

    public function store(AdminRequest $request)
    {
        $data = $request->validated();

        Admin::create($data);

        return to_route('panel.admins.index');
    }

    public function edit(Admin $admin)
    {
        return view('panel.admins.edit', compact('admin'));
    }

    public function update(AdminRequest $request, Admin $admin)
    {
        $data = $request->validated();

        if (is_null($data['password'])) {
            unset($data['password']);
        }

        $admin->update($data);

        return to_route('panel.admins.index');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();

        return to_route('panel.admins.index');
    }
}
