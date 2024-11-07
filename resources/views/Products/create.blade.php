<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css'); }}" />
    <title>Cadastro de produtos</title>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50" id="container-create">
        <div id="container-form">
            <h1>Cadastrar Produto</h1>
            <form action="{{ route('products.create') }}" method="POST" id="formulario">
               @csrf

                <div class="linha">
                    <label for="name">Nome</label>
                    <input class="input-style" type="text" id="name" name="name" required />
                </div>
                <div class="linha">
                    <label for="description">Descrição</label>
                    <input class="input-style" type="text" id="description" name="description" required />
                </div>
                <div class="linha">
                    <label for="quantity">Quantidade</label>
                    <input class="input-style" type="number" id="quantity" name="quantity" style="width: 30px" required />
                </div>
                <button class="btn">Enviar</button>

                @if(session('success'))
                <div id="success-message" style="color: green; margin-top: 10px;">
                    {{ session('success') }}
                </div>
                @endif
            </form>
        </div>
        <a class="ancora" id="ancora-lista" href="{{ route('products.list') }}">Lista de produtos</a>
    </div>
</body>

</html>