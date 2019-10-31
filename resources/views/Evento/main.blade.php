<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evento</title>
</head>
<body>
<h1> Index </h1>

{{
    @forelse($evento as $e)
        <p> $e->data </p>
}}

    
</body>
</html>