<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="{{ asset("css/mfegkstyle.css")}}">
</head>
<body>

        <h1>Site Lindão</h1>
        <!-- Menu -->
        <div>
            <ul>
                <li class="links_home"><a href="{{ route('home')}}">HOME</a></li>
                <li class="links_home"><a href="{{ route('produtos')}}">Produtos</a></li>
            </ul>
        </div>


        @yield('content')
</body>
</html>

