<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Importando o modelo User

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
{
    $credentials = $request->validated();

    if (Auth::guard('web')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('user.home')->with('status', 'Login realizado com sucesso.');
    }

    return back()->withInput()->with('status', 'Email ou senha inválidos.');
}


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('status', 'Deslogado com sucesso');
    }

    // Método para exibir a página de registro
    public function register()
    {
        return view('auth.register'); // Crie a view 'register.blade.php' para o formulário de registro
    }

    // Método para salvar o usuário registrado
    // Método para salvar o usuário registrado
    public function store(Request $request)
{
    // Validação dos dados
    $request->validate([
        'nome' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'celular' => 'required|string|max:15',
        'ra' => 'required|string|max:20|unique:users',
        'curso' => 'required|string|max:100',
        'tem_grupo' => 'boolean',
        'bio' => 'nullable|string',
        'pontos_fortes' => 'nullable|string',
        'pontos_fracos' => 'nullable|string',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $temGrupo = (bool) $request->has('tem_grupo');

    $user = User::create([
        'nome' => $request->nome,
        'email' => $request->email,
        'celular' => $request->celular,
        'ra' => $request->ra,
        'curso' => $request->curso,
        'tem_grupo' => $temGrupo,
        'bio' => $request->bio,
        'pontos_fortes' => $request->pontos_fortes,
        'pontos_fracos' => $request->pontos_fracos,
        'password' => bcrypt($request->password),
    ]);

    Auth::login($user);
    
    return redirect()->route('user.home')->with('status', 'Cadastro realizado com sucesso.');
}
    


}
