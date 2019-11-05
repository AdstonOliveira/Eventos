@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center text-success"><b>Relações de Participantes</b></div>
                <div class="col-md-12" style="padding: 20px;">
                    <div class="text-right">
                        <a href="{{url('participante/create')}}" class="btn btn-success">Novo Participante</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Data de Nascimento</th>
                            <th>Organização</th>
                            <th colspan='3'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($participantes as $participante)
                        <tr>
                            <td>{{$participante->nome}}</td>
                            <td>{{$participante->rg}}</td>
                            <td>{{$participante->cpf}}</td>
                            <td>{{$participante->email}}</td>
                            <td>{{$participante->telefone}}</td>
                            <td>{{$participante->data_nascimento}}</td>
                            <td>{{$participante->organizacao}}</td>

                            <td>
                                <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <a href="{{url('participante/'.$participante->id.'/edit')}}" class="btn btn-warning" style="margin-right:5px">Editar</a>
                                    <form action="{{url('participante', [$participante->id])}}" method="POST">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-danger" value="Desativar" />
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Produto Inativo -->
<div class="container">
    <div class="row">

        <div class="col-md-12">
        <div class="card" >
                <div class="card-header text-center text-danger"><b>Participantes Inativos</b></div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>RG</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Data de Nascimento</th>
                            <th>Organização</th>
                            <th colspan='3'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($participantesInativos as $participante)
                        <tr>
                            <td>{{$participante->nome}}</td>
                            <td>{{$participante->rg}}</td>
                            <td>{{$participante->cpf}}</td>
                            <td>{{$participante->email}}</td>
                            <td>{{$participante->telefone}}</td>
                            <td>{{$participante->data_nascimento}}</td>
                            <td>{{$participante->organizacao}}</td>
                            <td>
                                <form action="{{url('participante', [$participante->id])}}" method="POST">
                                    {{method_field('DELETE')}}
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary" value="Ativar" />
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop