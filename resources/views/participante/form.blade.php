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
            <!--NOME-->
            <div class="form-group">
                <label><b>Nome</b></label>
                <input type="text" value="{{old('participante.nome', $data['participante'] ? $data['participante']->nome : '')}}" name="participante[nome]" class="form-control">
                <span>{{$errors->first('participante.nome')}}</span>
                <span>{{$errors->first('participante.valor')}}</span>
            </div>
            <!--DATA DE NASCIMENTO-->
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label><b>Data de Nascimento:</b></label>
                        <input required type="date" placeholder="00/00/0000" name="participante[data_nascimento]" id="data_nascimento" class="form-control data">
                        <span> {{ $errors->first('participante.data_nascimento') }} </span>
                        <span>{{ $errors->first('participante.valor') }}</span>
                    </div>
                </div>
                <!--CPF-->
                <div class="col-md-3">
                    <div class="form-group">
                        <label><b>CPF:</b></label>
                        <div class="input-group">
                            <input required type="text" placeholder="XXX.XXX.XXX-XX" name="documentos[cpf][numero]" id="cpf" class="form-control rounded-right cpf" value="{{old('participante.cpf', $data['participante'] ? $data['participante']->cpf : '')}}">
                            <input required type="hidden" name="documentos[cpf][tipo_documento_id]" value="1">
                        </div>
                        <span class="errors"> {{ $errors->first('documentos.cpf.numero') }}</span>
                    </div>
                </div>
                <!--RG-->
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label><b>RG:</b></label>
                        <div class="input-group">
                            <input required type="text" placeholder="XX.XXX.XXX X" name="documentos[rg][numero]" id="rg" class="form-control rounded-right rg" value="{{old('participante.rg', $data['participante'] ? $data['participante']->rg : '')}}">
                            <input required type="hidden" name="documentos[rg][tipo_documento_id]" value="1">
                        </div>
                        <span class="errors"> {{ $errors->first('documentos.rg.numero') }}</span>
                    </div>
                </div>
                <!--E-MAIL-->
                <div class="col-md-4">
                    <label for="email"><b>Email:<b></label>
                    <input type="text" class="form-control" id="email" name="email">
                    <div class="valid-tooltip">
                        por favor, insira um email.
                    </div>
                </div>
            </div>
            <!--ORGANIZAÇÃO-->
            <div class="form-group">
                <label><b>Organizacao</b></label>
                <input type="text" value="{{old('participante.organizacao', $data['participante'] ? $data['participante']->organizacao : '')}}" name="participante[organizacao]" class="form-control">
                <span>{{$errors->first('participante.organizacao')}}</span>
                <span>{{$errors->first('participante.valor')}}</span>
            </div>
            <div class="d-flex justify-content-end">
                <input type="submit" value="{{$data['participante'] ? 'Atualizar' : 'Salvar'}}" class="btn btn-success ">
            </div>
        </form>
    </div>
</div>
@stop