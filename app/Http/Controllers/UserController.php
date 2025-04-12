<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Método para exibir a página inicial com a lista de usuários
    public function home()
    {
        // Pega todos os usuários
        $users = User::all();

        // Retorna a view 'home' passando os usuários
        return view('home', compact('users'));
    }
}
