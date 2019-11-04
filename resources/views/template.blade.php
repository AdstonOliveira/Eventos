<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eventos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('assets/main.css') }}" />
</head>
<body>
    <div class="nav">
        <a href="/eventos">Eventos</a>
        <a href="/participantes">Participantes</a>
    </div>
    
    <div class="content">
        @yield('content')
    </div>
</body>
</html>