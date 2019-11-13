@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">{{$data['participante'] ? 'Editar participante' : 'Novo participante'}}</div>
    <div class="card-body">
        <form method="POST" action="{{url($data['url'])}}">
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
                <input type="text" value="{{old('participante.nome', $data['participante'] ? $data['participante']->nome : '')}}" name="nome" class="form-control">
                <span>{{$errors->first('participante.nome')}}</span>
                <span>{{$errors->first('participante.valor')}}</span>
            </div>
            <!--DATA DE NASCIMENTO-->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>Data de Nascimento:</b></label>
                        <input required type="date" placeholder="00/00/0000" name="data_nascimento" id="data_nascimento" class="form-control data" value="{{old('participante.data_nascimento', $data['participante'] ? $data['participante']->data_nascimento : '')}}">
                        <span> {{ $errors->first('participante.data_nascimento') }} </span>
                        <span>{{ $errors->first('participante.valor') }}</span>
                    </div>
                </div>
                <!--CPF-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>CPF:</b></label>
                        <div class="input-group">
                            <input required type="text" placeholder="XXX.XXX.XXX-XX" name="cpf" id="cpf" class="form-control rounded-right cpf" value="{{old('participante.cpf', $data['participante'] ? $data['participante']->cpf : '')}}">
                        </div>
                        <span class="errors"> {{ $errors->first('participante.cpf') }}</span>
                    </div>
                </div>
                <!--RG-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>RG:</b></label>
                        <div class="input-group">
                            <input required type="text" placeholder="XX.XXX.XXX X" name="rg" id="rg" class="form-control rounded-right rg" value="{{old('participante.rg', $data['participante'] ? $data['participante']->rg : '')}}">
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
                            <input type="text" class="form-control" id="email" name="email" value="{{old('participante.email', $data['participante'] ? $data['participante']->email : '')}}">
                        </div>
                        <span class="errors"> {{ $errors->first('participante.email') }}</span>
                    </div>
                </div>

                <!--TELEFONE-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefone"><b>Telefone:</b></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="telefone" name="telefone" value="{{old('participante.telefone', $data['participante'] ? $data['participante']->telefone : '')}}">
                        </div>
                        <span class="errors"> {{ $errors->first('participante.telefone') }}</span>
                    </div>
                </div>

                <!--ORGANIZACAO-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="organizacao"><b>Organização:</b></label>
                        <div class="input-group">
                        <input type="text" class="form-control" id="organizacao" name="organizacao" value="{{old('participante.telefone', $data['participante'] ? $data['participante']->organizacao : '')}}">
                        </div>
                    </div>
                </div>
            </div>

            <!--Botao-->
            <div class="d-flex justify-content-end">
                <input type="submit" value="{{$data['participante'] ? 'Atualizar' : 'Salvar'}}" class="btn btn-success ">
            </div>
        </form>
    </div>
</div>
@stop