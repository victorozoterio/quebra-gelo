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
    <h2>Cadastro</h2>

    <form action="{{ route('register.store') }}" method="POST">
        @csrf

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" placeholder="Digite seu nome"
                value="{{ old('nome') }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Digite seu email"
                value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="celular">Celular:</label>
            <input type="text" name="celular" id="celular" placeholder="Digite seu celular"
                value="{{ old('celular') }}" required>
        </div>

        <div>
            <label for="ra">RA:</label>
            <input type="text" name="ra" id="ra" placeholder="Digite seu RA" value="{{ old('ra') }}"
                required>
        </div>

        <div>
            <label for="curso">Curso:</label>
            <input type="text" name="curso" id="curso" placeholder="Digite seu curso"
                value="{{ old('curso') }}" required>
        </div>

        <div>
            <label for="tem_grupo">Tem grupo:</label>
            <input type="checkbox" name="tem_grupo" id="tem_grupo" value="1"
                {{ old('tem_grupo') ? 'checked' : '' }}>
        </div>

        <div>
            <label for="bio">Bio:</label>
            <textarea name="bio" id="bio" placeholder="Escreva sobre você">{{ old('bio') }}</textarea>
        </div>

        <div>
            <label for="pontos_fortes">Pontos Fortes:</label>
            <textarea name="pontos_fortes" id="pontos_fortes" placeholder="Seus pontos fortes">{{ old('pontos_fortes') }}</textarea>
        </div>

        <div>
            <label for="pontos_fracos">Pontos Fracos:</label>
            <textarea name="pontos_fracos" id="pontos_fracos" placeholder="Seus pontos fracos">{{ old('pontos_fracos') }}</textarea>
        </div>

        <div>
            <label for="password">Senha:</label>
            <input type="password" name="password" id="password" placeholder="Digite sua senha" required>
        </div>

        <div>
            <label for="password_confirmation">Confirmar Senha:</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                placeholder="Confirme sua senha" required>
        </div>

        <button type="submit">Cadastrar</button>

        @if (session('status'))
            <p style="color: green;">
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

    <p>Já tem uma conta? <a href="{{ route('login') }}">Faça login</a></p>

</body>

</html>
