<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        // Envia as roles disponíveis para o select na view
        $roles = Role::all();

        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Atribui o perfil selecionado ao usuário
        $user->assignRole($request->role);

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário criado com sucesso!');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        // Envia as roles disponíveis para a view de edição
        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'role' => 'required|exists:roles,name',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Atualiza a senha somente se for preenchida
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        // Substitui os perfis antigos pelo novo perfil selecionado
        $user->syncRoles($request->role);

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário atualizado com sucesso!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('users.index')
            ->with('success', 'Usuário removido com sucesso!');
    }
}