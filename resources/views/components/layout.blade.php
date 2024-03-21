<!doctype html>
<head>
    <title>{{ $title }} - Controle de Usuários</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="container">
    <h1>{{ $title }}</h1>

    {{ $slot }}
</div>

</body>
</html>
