@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Participantes</div>
    <div class="card-body">

        <div class="col-md-12">
            <div class="text-right">
                <a href="{{url('participante/create')}}" class="btn btn-success">Novo Participante</a>
            </div>
        </div>
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">Relações de Participantes</div>
                <div class="card-body">
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
                            @foreach($data['participantesAtivos'] as $participante)
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
                    <td>
                    </td>
                </div>
            </div>
        </div>
    </div>
</div>

        @stop