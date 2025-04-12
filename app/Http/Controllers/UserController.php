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
}
