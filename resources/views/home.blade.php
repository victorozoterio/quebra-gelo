<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quebra Gelo</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <style>
        /* Estilos para o fundo escuro */
        body {
            background-color: #121212;
            color: white;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        /* Estilos para os cards */
        .user-card {
            background-color: #333;
            border-radius: 10px;
            padding: 20px;
            margin: 15px;
            width: 200px;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }

        /* Estilo do botão de status */
        .status-btn {
            padding: 5px 15px;
            border-radius: 5px;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }

        /* Estilo para disponível (verde) */
        .available {
            background-color: green;
        }

        /* Estilo para indisponível (vermelho) */
        .unavailable {
            background-color: red;
        }
    </style>
</head>

<body>
    <h2>Alunos</h2>

    <div>
        @foreach ($users as $user)
            <div class="user-card">
                <h3>{{ $user->nome }}</h3>
                <p>{{ $user->curso }}</p>
                <p>{{ $user->celular }}</p>
                <p>{{ $user->bio }}</p>
                <p><strong>Pontos Fortes:</strong> {{ $user->pontos_fortes }}</p>
                <p><strong>Pontos Fracos:</strong> {{ $user->pontos_fracos }}</p>
                <button class="status-btn {{ $user->tem_grupo ? 'available' : 'unavailable' }}">
                    {{ $user->tem_grupo ? 'Disponível' : 'Indisponível' }}
                </button>
            </div>
        @endforeach
    </div>

<div style="margin: 20px 0; text-align: center;">
    <a href="{{ route('profile.edit') }}" style="
        display: inline-block;
        padding: 10px 20px;
        background-color: #333;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-right: 10px;
    ">Editar Perfil</a>

    <form action="{{ route('logout') }}" method="POST" style="display: inline-block;">
        @csrf
        <button type="submit">Logout</button>
    </form>
</div>
</body>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>

</html>
