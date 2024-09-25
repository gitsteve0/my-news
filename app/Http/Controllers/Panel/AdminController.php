<?php

namespace App\Http\Controllers\Panel;

use App\Models\News;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DatatableRequest;
use App\Http\Requests\Panel\AdminRequest;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return $this->datatable(new DatatableRequest($request));
        }

        return view('panel.admins.index');
    }

    public function datatable(DatatableRequest $request)
    {
        $admins = Admin::latest()
                    ->paginate($request->per_page, ['*'], 'page', $request->page);

        $total = $admins->total();
        $admins  = $admins->map(fn($admin) => [
            $admin->id,
            $admin->name,
            $admin->username,
            $admin->type,
            view('panel.admins.datatable.actions', compact('admin'))->render(),
        ]);

        return $request->jsonResponse($total, $admins);
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
