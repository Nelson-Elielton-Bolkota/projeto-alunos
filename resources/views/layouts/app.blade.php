<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Sistema de Alunos')</title>
    <!-- Estilização simples para apresentação -->
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f4f4f9; }
        header { background: #333; color: #fff; padding: 15px; text-align: center; }
        nav a { color: #fff; margin: 0 10px; text-decoration: none; }
        .container { padding: 20px; max-width: 800px; margin: auto; background: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); margin-top: 20px; border-radius: 5px; }
        footer { text-align: center; padding: 15px; background: #333; color: #fff; margin-top: 30px; position: fixed; bottom: 0; width: 100%; }
        ul { list-style-type: none; padding: 0; }
        li { padding: 8px; border-bottom: 1px solid #eee; }
        .alert { color: red; font-weight: bold; }
    </style>
</head>
<body>

    <header>
    <h1>Painel Acadêmico</h1>
    @include('partials/nav')
    </header>

    <div class="container">
        @yield('conteudo')
    </div>

    <footer>
        <p>&copy; 2026 - Sistema Escolar Laravel</p>
    </footer>

</body>
</html>