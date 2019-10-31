<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Participante</title>
</head>
<body>
    <form action="{{url($data['url'])}}">
    @if($data['method'] == 'PUT')
        @method('PUT')
    @endif
    @csrf
    <div>
        <label>Nome:</label>
        <input type="text" name="nome" />
    </div>
    <div>
        <label>RG:</label>
        <input type="text" name="rg" />
    </div>
    <div>
        <label>CPF:</label>
        <input type="text" name="cpf" />
    </div>
    <div>
        <label>Email:</label>
        <input type="text" name="email" />
    </div>
    <div>
        <label>Telefone:</label>
        <input type="text" name="telefone" />
    </div>
    <div>
        <label>Data de Nascimento:</label>
        <input type="text" name="data_nascimento" />
    </div>
    <div>
        <label>Organização:</label>
        <input type="text" name="organizacao" />
    </div>
    <div>
        <button type="submit">Enviar</button>
    </div>
    </form>
</body>
</html>