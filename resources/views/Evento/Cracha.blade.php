<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cracha Participante</title>
    <style>
        *{
            padding: 0px;
            border: 0px;
            margin: 0px;
        }
        body{
            width: 100vw;
            height: 100vh;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    
    <div class="d-flex container h-100 justify-content-center">
        <div class="card w-50">
            <div class="card-header">
                <div class="col">
                    <div class="row justify-content-center">
                        <h2>Identificação participante</h2>
                    </div>
                    <div class="row justify-content-center">
                        <h3>{{isset($evento) ? $evento->nome : 'Evento inexistente' }}</h3>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @forelse ($participante as $participante)

                <div class="col col-md-12 border">

                    <div class="row pl-2">
                        <div class="col col-md-7">
                            <div class="row">
                                <b>Nome:</b>
                            </div>
                            <div class="row">
                                {{isset($participante) ? $participante->nome : 'Nenhum participante selecionado'}}
                            </div>
                        </div>

                        <div class="col">
                            <div class="row">
                                <b>Dt nascimento:</b>
                            </div>
                            <div class="row">
                                {{isset($participante) ? $participante->data_nascimento : 'Nenhum participante selecionado'}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col col-md-12 border">
                    <div class="row  pl-2">
                        <div class="col col-7">
                            <div class="row"><b>RG:</b></div>
                            <div class="row">
                                {{isset($participante) ? $participante->rg : 'Nenhum participante selecionado'}}
                            </div>
                        </div>
                        <div class="col">
                            <div class="row"><b>CPF:</b></div>
                            <div class="row">
                                {{isset($participante) ? $participante->cpf : 'Nenhum participante selecionado'}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- protected $fillable = ['nome', 'rg', 'cpf', 'email', 'telefone', 'data_nascimento', 'organizacao ']; --}}
                <div class="col col-md-12 border">
                    <div class="row">
                        <div class="flex col ">
                            <div class="row justify-content-center">
                                <b>Organização:</b>
                            </div>
                            <div class="row justify-content-center">
                                {{isset($participante) ? $participante->organizacao : 'Nenhum participante selecionado'}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                        {!! QrCode::size(300)->generate(
                            $evento->id.''.$participante->id.''.$participante->cpf.''.$participante->rg.''.$participante->organizacao
                            ); 
                        !!}
                </div>
                @empty
                <div class="row">
                    <h2>Este participante não esta listado neste evento</h2>
                </div>
                <div class="row">
                        <a href="{{url('/evento/participantes/'.$evento->id ) }}"> 
                            Para cadastrar clique aqui
                        </a>
                </div>
                @endforelse
                
            </div>
        
            
        
        
        </div>







    </div>



    
</body>
</html>