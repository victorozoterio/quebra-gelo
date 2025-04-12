<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quebra Gelo - Editar Perfil</title>
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

        .success {
            color: green;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #3a7ca5;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        
        <h2>Editar Perfil</h2>

        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="{{ auth()->user()->nome }}" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" required>

        <label for="celular">Celular:</label>
        <input type="text" name="celular" id="celular" value="{{ auth()->user()->celular }}" required>

        <label for="curso">Curso:</label>
        <input type="text" name="curso" id="curso" value="{{ auth()->user()->curso }}" required>

        <label for="tem_grupo">
            <input type="checkbox" name="tem_grupo" id="tem_grupo" value="1" {{ auth()->user()->tem_grupo ? 'checked' : '' }}>
            Tem grupo
        </label>

        <label for="bio">Bio:</label>
        <textarea name="bio" id="bio">{{ auth()->user()->bio }}</textarea>

        <label for="pontos_fortes">Pontos Fortes:</label>
        <textarea name="pontos_fortes" id="pontos_fortes">{{ auth()->user()->pontos_fortes }}</textarea>

        <label for="pontos_fracos">Pontos Fracos:</label>
        <textarea name="pontos_fracos" id="pontos_fracos">{{ auth()->user()->pontos_fracos }}</textarea>

        <button type="submit">Atualizar</button>

        @if (session('status'))
            <p class="success">{{ session('status') }}</p>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        @endif

        <a href="{{ route('user.home') }}" class="back-link">Voltar para Home</a>
    </form>

    <script>
        document.getElementById('celular').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');
            
            if (value.length <= 11) {
                if (value.length > 2) {
                    value = '(' + value.substring(0,2) + ') ' + value.substring(2);
                }
                if (value.length > 9) {
                    value = value.substring(0,9) + '-' + value.substring(9);
                }
            }
            
            e.target.value = value;
        });
    </script>
</body>

</html>