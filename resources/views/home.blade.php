<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quebra Gelo</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
</head>

<body>
    <h2>Lista de Usuários</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Celular</th>
                <th>Curso</th>
                <th>Grupo</th>
                <th>Bio</th>
                <th>Pontos Fortes</th>
                <th>Pontos Fracos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->nome }}</td>
                    <td>{{ $user->celular }}</td>
                    <td>{{ $user->curso }}</td>
                    <td>{{ $user->tem_grupo ? 'Sim' : 'Não' }}</td>
                    <td>{{ $user->bio }}</td>
                    <td>{{ $user->pontos_fortes }}</td>
                    <td>{{ $user->pontos_fracos }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>

</html>
