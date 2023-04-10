<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    private User $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => '
                required|string|min:8|', Password::min(8)
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised(),
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->userModel->validate($request);

        session()->flash('message', 'Post successfully updated.');
        return redirect()->route('user.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('user.index')->with('error', 'Usuário não encontrado');
        }

        $user->update([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('user.index');
    }
}
