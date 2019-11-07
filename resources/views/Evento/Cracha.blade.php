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
    
    <div class="d-flex container h-100 justify-content-center border">
        <div class="card w-50">
            <div class="card-header text-center">
                Cracha de Evento
            </div>
            <div class="card-body">
                
                <div class="col col-md-12 border ">
                    <div class="row">
                        <div class="col col-md-7">
                            <div class="row">
                                <b>Nome:</b>
                            </div>
                            <div class="row">
                                {{isset($participante) ? $participante->nome : 'Nenhum participante selecionado'}}
                            </div>
                        </div>
                        <div class="col text-center">
                            <div class="row">
                                <b>Dt nascimento:</b>
                            </div>
                            <div class="row">
                                {{isset($participante) ? $participante->dt_nascimento : 'Nenhum participante selecionado'}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col col-md-12 border">
                    <div class="row">
                        <div class="col col-6">
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
                        <div class="col">
                            <div class="row">
                                <b>Organização:</b>
                            </div>
                            <div class="row">
                                {{isset($participante) ? $participante->rg : 'Nenhum participante selecionado'}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            
        
        
        </div>







    </div>



    
</body>
</html>