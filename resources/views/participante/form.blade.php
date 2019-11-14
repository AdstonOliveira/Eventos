@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">{{$data['participante'] ? 'Editar participante' : 'Novo participante'}}</div>
    <div class="card-body">
    <p id="mensagem" class="alert "></p>
        <form method="POST" id="form" action="{{url($data['url'])}}">
        @if($data['method'] == 'PUT')
             @method('PUT')
         @endif

        @csrf

            @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
                @if (session()->has('success'))

                <div class="alert alert-success">
                     {{session()->get("success")}}
                    </div>
        @endif


            <!--NOME-->
            <div class="form-group">
                <label><b>Nome</b></label>
                <input type="text" autocomplete="off" value="{{old('participante.nome', $data['participante'] ? $data['participante']->nome : '')}}" id="nome" name="nome" class="form-control">
                <span>{{$errors->first('participante.nome')}}</span>
                <span>{{$errors->first('participante.valor')}}</span>
            </div>
            <!--DATA DE NASCIMENTO-->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>Data de Nascimento:</b></label>
                        <input required type="text" autocomplete="off" placeholder="00/00/0000" name="data_nascimento" id="data_nascimento" class="form-control data" value="{{old('participante.data_nascimento', $data['participante'] ? date('d-m-Y', strtotime($data['participante']->data_nascimento)) : '')}}">
                        <span> {{ $errors->first('participante.data_nascimento') }} </span>
                        <span>{{ $errors->first('participante.valor') }}</span>
                    </div>
                </div>
                <!--CPF-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>CPF:</b></label>
                        <div class="input-group">
                            <input required type="text" autocomplete="off" placeholder="XXX.XXX.XXX-XX" maxlength="14" name="cpf" id="cpf" class="form-control rounded-right cpf" value="{{old('participante.cpf', $data['participante'] ? $data['participante']->cpf : '')}}">
                        </div>
                        <span class="errors"> {{ $errors->first('participante.cpf') }}</span>
                    </div>
                </div>
                <!--RG-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>RG:</b></label>
                        <div class="input-group">
                            <input required type="text" autocomplete="off" placeholder="XX.XXX.XXX X" maxlength="12" name="rg" id="rg" class="form-control rounded-right rg" value="{{old('participante.rg', $data['participante'] ? $data['participante']->rg : '')}}">
                        </div>
                        <span class="errors"> {{ $errors->first('participante.rg') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <!--E-MAIL-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email"><b>Email:</b></label>
                        <div class="input-group">
                            <input type="email" class="form-control" autocomplete="off" id="email" name="email" value="{{old('participante.email', $data['participante'] ? $data['participante']->email : '')}}">
                        </div>
                        <span class="errors"> {{ $errors->first('participante.email') }}</span>
                    </div>
                </div>

                <!--TELEFONE-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefone"><b>Telefone:</b></label>
                        <div class="input-group">
                            <input type="text" class="form-control" autocomplete="off" maxlength="13" id="telefone" name="telefone" value="{{old('participante.telefone', $data['participante'] ? $data['participante']->telefone : '')}}">
                        </div>
                        <span class="errors"> {{ $errors->first('participante.telefone') }}</span>
                    </div>
                </div>

                <!--ORGANIZACAO-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="organizacao"><b>Organização:</b></label>
                        <div class="input-group">
                        <input type="text" class="form-control" id="organizacao" autocomplete="off" name="organizacao" value="{{old('participante.telefone', $data['participante'] ? $data['participante']->organizacao : '')}}">
                        </div>
                    </div>
                </div>
            </div>

            <!--Botao-->
            <div class="d-flex justify-content-end">
                <input type="submit" value="{{$data['participante'] ? 'Atualizar' : 'Salvar'}}" id="btnEnviar" class="btn btn-success ">
            </div>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>

<script>
$(document).ready(function () {
    $('#mensagem').hide()
$('#rg').change(function(){
    
    if($('#rg').length>12){
    $('#rg').val('')
    alert('O RG nap pode conter mais de 12 caracteres')
    }
    $("#rg").bind('paste', function(e) {
        e.preventDefault();
    });

})

$('#btnEnviar').click(function(e){
    e.preventDefault();
    validaCadastro()
})
     $("#data_nascimento").mask('00/00/0000')
     var cpf = $("#cpf");
     $("#cpf").mask('###.###.###-##')
     $('#rg').mask('##.###.###-#')
     $('#telefone').mask('(##)####-####')
   //  cpf.mask('000.000.000-00', {reverse: true});
    // var rg = $("#rg");
    // rg.mask('00.000.000-0');
    // $('#telefone').mask('(00) 0000-00009');

    $('#telefone').change(function(event) {
    if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
        $('#telefone').mask('(00) 00000-0009');
    } else {
        $('#telefone').mask('(00)0000-0000');
    }
    });
    function validaCadastro(){
        //pegando a data do form
        var dtNasc = $('#data_nascimento').val()
      // separando a data por / e colocando em um array new_date
        var new_date= dtNasc.split('/')
        // colocando na ordem inversa (ano mes dia)
       new_date = new_date[2] + '-' + new_date[1] + '-' +new_date[0];

        var validaEmail = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/
        var nome = $('#nome').val()
        var cpf = $('#cpf').val()
        var rg = $('#rg').val()
        var dtNasc = $('#data_nascimento').val()
        var email = $('#email').val()
        var telefone = $('#telefone').val()
        var organizacao = $('#organizacao').val()
        var retorno = [];
        
       //Verificando se o email é válido
        if(nome.length <= 3){
            retorno['erro'] = true;
            retorno['Mensagem'] = 'O campo <b>nome</b> deve conter no mínimo 3 caracteres';
  
        }else if(cpf.length<14){
            console.log(cpf.length)
            retorno['erro'] = true;
            retorno['Mensagem'] = 'O campo <b>cpf</b> deve conter no mínimo 11 caracteres';
        }
        else if(rg.length<11){
            retorno['erro'] = true;
            retorno['Mensagem'] = 'O campo <b>RG</b> deve conter no mínimo 9 caracteres';
        }else if(!validaEmail.test(email)){
            retorno['erro'] = true;
            retorno['Mensagem'] = 'O  <b>email</b> inserido não é um email válido';
        }else if (telefone.length < 13){
            retorno['erro'] = true;
            retorno['Mensagem'] = 'O campo <b>telefone</b> deve conter no mínimo 10 caracteres';
        }else if(organizacao.length < 2){
            retorno['erro'] = true;
            retorno['Mensagem'] = 'O campo <b>Organização</b> deve conter no mínimo 2 caracteres';

        }else{
            retorno['erro'] = false;
        }
       if(retorno['erro']){
        $('#mensagem').html(retorno['Mensagem'])
        $('#mensagem').addClass('alert-warning')
        $('#mensagem').removeClass('alert-success')

       }else{
        $('#mensagem').html(retorno['Mensagem'])
        $('#mensagem').addClass('alert-success')
        $('#mensagem').removeClass('alert-warning')   
        $('#form').submit()
       }
        $('#mensagem').fadeIn()
      console.log(retorno['Mensagem'])
    }



});
</script>





@endsection
