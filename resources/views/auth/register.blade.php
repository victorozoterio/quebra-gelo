<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quebra Gelo - Cadastro</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #e8f4fb;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 10px;
        }

        form {
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(135, 206, 250, 0.3);
            max-width: 500px;
            width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #3a7ca5;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #bcdff1;
            border-radius: 5px;
            background-color: #f9fcff;
        }

        input[type="checkbox"] {
            margin-top: 10px;
        }

        textarea {
            resize: vertical;
            min-height: 60px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 25px;
            background-color: #3a7ca5;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #2c678a;
        }

        p {
            text-align: center;
            margin-top: 15px;
        }

        a {
            color: #3a7ca5;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }

        .success {
            color: green;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <form action="{{ route('register.store') }}" method="POST">
        <h2>Cadastro</h2>

        @csrf

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome" value="{{ old('nome') }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Digite seu email" value="{{ old('email') }}" required>

        <label for="celular">Celular:</label>
        <input type="text" name="celular" id="celular" placeholder="Digite seu celular" value="{{ old('celular') }}" required>

        <label for="ra">RA:</label>
        <input type="text" name="ra" id="ra" placeholder="Digite seu RA" value="{{ old('ra') }}" required>

        <label for="curso">Curso:</label>
        <input type="text" name="curso" id="curso" placeholder="Digite seu curso" value="{{ old('curso') }}" required>

        <label for="tem_grupo">
            <input type="checkbox" name="tem_grupo" id="tem_grupo" value="1" {{ old('tem_grupo') ? 'checked' : '' }}>
            Tem grupo
        </label>

        <label for="bio">Bio:</label>
        <textarea name="bio" id="bio" placeholder="Escreva sobre você">{{ old('bio') }}</textarea>

        <label for="pontos_fortes">Pontos Fortes:</label>
        <textarea name="pontos_fortes" id="pontos_fortes" placeholder="Seus pontos fortes">{{ old('pontos_fortes') }}</textarea>

        <label for="pontos_fracos">Pontos Fracos:</label>
        <textarea name="pontos_fracos" id="pontos_fracos" placeholder="Seus pontos fracos">{{ old('pontos_fracos') }}</textarea>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" placeholder="Digite sua senha" required>

        <label for="password_confirmation">Confirmar Senha:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme sua senha" required>

        <button type="submit">Cadastrar</button>

        @if (session('status'))
            <p class="success">{{ session('status') }}</p>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        @endif

        <p>Já tem uma conta? <a href="{{ route('login') }}">Faça login</a></p>
    </form>

</body>

</html