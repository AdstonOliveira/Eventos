@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-success mb-3">
                <div class="card-header text-center text-success"><b>Participantes do Evento: {{$evento->nome}}</b></div>
                <div class="col-md-12" style="padding: 20px;">
                    <div class="row">
                    <div class="col col-6">
                        <form method="POST" action="{{url('/evento/adicionar/'.$evento->id)}}"> 
                            @csrf
                            <select id="lista" name="participante" class="form-control">
        
                            @forelse ($result as $lista)
                                <option value = "{{ $lista->id }}">
                                    {{$lista->nome}}
                                </option> 
                            @empty 
                                <option value = "" disabled selected>Necessário cadastrar ao menos um participante</option>
                            @endforelse
                            </select>
                        </div>
                        <div class="col align-self-end">
                            <button id="add" class="btn btn-success">Adicionar</button>
                        </div>
                    </form>
                        <div class="col col-2">
                            <a href="{{url('/participante/create')}}" class="nav-link">Cadastre aqui</a>
                        </div>
                        
                    </div>
                </div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Organização</th>
                            <th colspan='3'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($evento_participantes as $participante)
                        <tr>
                            <td>{{$participante->nome}}</td>
                            <td>{{$participante->email}}</td>
                            <td>{{$participante->telefone}}</td>
                            <td>{{$participante->organizacao}}</td>                          
                            <td>
                                <div class="btn-group" role="group" aria-label="First group">
                                        <form action="{{ url( '/evento/remover/'.$evento->id.'/'.$participante->id ) }}" method="POST">
                                            {{method_field('DELETE')}}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger">Remover</button>
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
<!--Eventos Inativos -->
{{-- <div class="container">
    <div class="row">

        <div class="col-md-12">
        <div class="card" >
            <div class="card-header text-center text-danger"><b>Eventos Inativos</b></div>
                <table class="table text-center">
                <thead>
                        <tr>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Evento</th>
                            <th>Descrição</th>
                            <th>Local</th>
                            <th colspan='3'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inativos as $inativo)
                        <tr>
                            <td>{{$inativo->data}}</td>
                            <td>{{$inativo->hora}}</td>
                            <td>{{$inativo->nome}}</td>
                            <td>{{$inativo->descricao}}</td>
                            <td>{{$inativo->local}}</td>
                            <td class="flex justify-content-between">
                                <div class="btn-group mr-2 " role="group" aria-label="First group">
                                    <a href="{{url('evento/'.$inativo->id )}}" class="btn btn-warning" style="margin-right:5px">Editar</a>
                                    <form action="{{url( 'evento/'.$inativo->id )}}" method="POST">
                                        {{method_field('DELETE')}}
                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-primary" value="Reativar" />
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
</div> --}}


@stop
@section('scripts')
<script>
    
</script>    
@endsection