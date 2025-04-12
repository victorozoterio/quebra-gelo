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
    <h2>Login</h2>

    <form action="{{ route('login.authenticate') }}" method="POST">
        @csrf
        @method('POST')

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Digite seu E-mail"
                value="{{ old('email') }}">
        </div>
        <div>
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" placeholder="Digite sua senha">
        </div>
        <button type="submit">Entrar</button>

        @if (session('status'))
            <p style="color: red;">
                {{ session('status') }}
            </p>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color: red;">
                    {{ $error }}
                </p>
            @endforeach
        @endif

    </form>

    <p>Não tem uma conta? <a href="{{ route('register') }}">Cadastre-se</a></p>

</body>

</html>
