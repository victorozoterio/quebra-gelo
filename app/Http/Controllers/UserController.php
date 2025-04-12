<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Método para exibir a página inicial com a lista de usuários, excluindo o logado
    public function home()
    {
        // Pegando o usuário logado
        $loggedUserId = Auth::id();

        // Pegando todos os usuários, exceto o logado
        $users = User::where('id', '!=', $loggedUserId)->get();

        // Retorna a view 'home' passando os usuários
        return view('home', compact('users'));
    }

    // Adicione estes métodos na classe UserController

    public function edit()
    {
        return view('edit-profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email,' . $user->id,
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'celular' => 'required|string|max:15|regex:/^\(\d{2}\)\s?\d{4,5}-\d{4}$/',
            'curso' => 'required|string|max:100',
            'tem_grupo' => 'boolean',
            'bio' => 'nullable|string',
            'pontos_fortes' => 'nullable|string',
            'pontos_fracos' => 'nullable|string',
        ], [
            'email.regex' => 'O email deve ter o formato algo@algo.algo',
            'celular.regex' => 'O celular deve estar no formato (XX) XXXXX-XXXX',
        ]);

        $user->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'celular' => $request->celular,
            'curso' => $request->curso,
            'tem_grupo' => $request->has('tem_grupo'),
            'bio' => $request->bio,
            'pontos_fortes' => $request->pontos_fortes,
            'pontos_fracos' => $request->pontos_fracos,
        ]);

        return redirect()->route('profile.edit')->with('status', 'Perfil atualizado com sucesso!');
    }
}
