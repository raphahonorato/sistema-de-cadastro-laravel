<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css'); }}" />
    <title>Cadastro de produtos</title>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div id="container-form">

            <form action="{{ route('products.edit', $product->id) }}" method="POST" id="formulario">
                @csrf
                <p>Editar Produto</p>
                <div class="linha">
                    <label for="name">Nome</label>
                    <input class="input-style" type="text" id="name" name="name" value='{{ $product->name}}' required />
                </div>
                <div class="linha">
                    <label for="description">Descrição</label>
                    <input class="input-style" type="text" id="description" name="description" value='{{ $product->description}}' required />
                </div>
                <div class="linha">
                    <label for="quantity">Quantidade</label>
                    <input class="input-style" type="number" id="quantity" name="quantity" style="width: 40px;" value='{{ $product->quantity}}' required />
                </div>
                <button class="btn">Enviar</button>

                @if(session('success'))
                <div id="success-message" style="color: green; margin-top: 10px;">
                    {{ session('success') }}
                </div>
                @endif
            </form>
            <a class="ancora" id="ancora-lista" href="{{ route('products.list') }}">Lista de produtos</a>
            <a class="ancora" id="ancora-lista" href="{{ route('products.create') }}">Cadastrar produto</a>
        </div>
    </div>
</body>

</html>