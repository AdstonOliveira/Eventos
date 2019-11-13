<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista</title>
</head>
<style>
    *{
        border: 0px; margin: 0px; padding: 0px;
        text-align: center;
        box-sizing: border-box;
    }
    /* body{
        width: 100vw; height: 100vh;
    } */
    table{
        border: 1px solid black;
        border-collapse: collapse;
        width: 100%;
    }
    td{
        border-bottom: 1px solid gray;
    }
    th{
        height: 40px;
        border-bottom: 1px solid gray;
    }
    td.topo {
        height: 80px;
        border-bottom: 1px solid gray;
    }
    h1{
        padding-top: 20px; padding-bottom: 20px;
    }

    
</style>
<body>
    <h1>Lista de participantes</h1>
    <div>
    <table>
        <tr>
            <td colspan="2" class="topo"><span>Evento: </span>{{isset($evento) ? $evento->nome : ''}}</td>
            <td><span>Data: </span>{{isset($evento) ? $evento->data : ''}}</td>
            <td><span>Hora: </span>{{isset($evento) ? $evento->hora : ''}}</td>
        </tr>

        <tr>
            <th><span>Nome </span></th>
            <th><span>CPF </span></th>
            <th><span>RG </span></th>
            <th><span>Organização </span></th>
        </tr>
        @forelse ($evento->participantes as $participante)
            <tr style="border-bottom: 1px solid #C30;">
                <td>{{$participante->nome}}</td>
                <td>{{$participante->cpf}}</td>
                <td>{{$participante->rg}}</td>
                <td>{{$participante->organizacao}}</td>
            </tr>
        @empty
            
        @endforelse


    </table>
</div>
</body>
</html>
