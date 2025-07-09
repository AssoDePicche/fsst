<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $resultSet = User::where('email', $validated['email'])->first();

        if (!$resultSet) {
            return back()->withErrors([
                'email' => 'E-mail não cadastrado',
            ]);
        }

        if (!Hash::check($validated['password'], $resultSet->password)) {
            return back()->withErrors([
                'password' => 'E-mail ou senha inválidos',
            ]);
        }

        Auth::login($resultSet);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function index()
    {
        $users = User::all();

        return view('users.index', compact($users));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if (User::where('email', $validated['email'])->first()) {
            return back()->withErrors([
                'email' => 'E-mail já cadastrado',
            ]);
        }

        $resultSet = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Auth::login($resultSet);

        return redirect()->route('dashboard');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $resultSet = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $resultSet->name = $validated['name'];

        $resultSet->email = $validated['email'];

        $resultSet->password = Hash::make($validated['password']);

        $resultSet->save();

        $message = 'Perfil atualizado';

        return redirect()->route('users.show')->with('success', $message);
    }

    public function destroy(string $id)
    {
        $resultSet = User::findOrFail($id);

        $resultSet->delete();

        $message = 'Perfil excluído';

        return redirect()->route('users.create')->with('success', $message)
    }
}
