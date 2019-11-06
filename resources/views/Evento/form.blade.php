@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">{{isset($evento) ? $evento->nome : 'Novo evento'}}</div>
        <div class="card-body">
    
              <form action="{{isset($evento) ? url('/evento/'.$evento->id) : url('/evento/novo') }}" method="POST">
                @if(isset($evento))
                    @method('PUT')
                @endif

                @csrf

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="data"><b>Data</b></label>
                    <input type="date" class="form-control" name="data" placeholder="DD/MM/AAAA" value="{{ isset($evento) ? $evento->data->format('Y-m-d') : '' }}">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="hora"><b>Horário</b></label>
                        <input type="text" class="form-control" name="hora" value="{{isset($evento) ? $evento->hora : '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="nome"><b>Nome</b></label>
                        <input type="text" class="form-control" name="nome" value="{{isset($evento) ? $evento->nome : '' }}">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="local"><b>Local</b></label>
                        <input type="text" class="form-control" name="local" value="{{isset($evento) ? $evento->local : '' }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="local"><b>Descrição</b></label>
                        <textarea class="form-control" name="descricao">{{isset($evento) ? $evento->descricao : '' }}</textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success col-2">Salvar</button>
                </div>                    
                    
            </form>

        </div>
    </div>
  </div>
@stop
