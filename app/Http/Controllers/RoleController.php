<?php

namespace App\Http\Controllers;
use App\Models\Role AS RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    private RoleModel $roleModel;

    public function __construct(RoleModel $roleModel)
    {
        $this->roleModel = $roleModel;
    }

    public function index()
    {
        $roles = Role::all();

        return view('roles.index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->roleModel->validate($request);

        session()->flash('message', 'Post successfully updated.');
        return redirect()->route('role.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $role = Role::where('id', $id)->first();
        return view('roles.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, string $id)
    {
        $role = Role::where('id', $id)->first();
        $role->name = $request->name;
        $role->save();
        return redirect()->route('role.index');
    }

    public function destroy(string $id)
    {
        Role::destroy($id);
        return redirect()->route('role.index');
    }
}
