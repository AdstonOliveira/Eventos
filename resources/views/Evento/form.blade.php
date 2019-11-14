@extends('layouts.app')
@section('content')
<!-- <span>{{ $errors->first('hora') }}</span> -->
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
                        <input type="date" class="form-control" name="data" placeholder="DD/MM/AAAA" value="{{ isset($evento) ? date('Y-d-m', strtotime($evento->data)) : '' }}" required>
                        <span class="alert-danger" role="alert">{{ $errors->first('data') }}</span>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="hora"><b>Horário</b></label>
                        <input type="time" class="form-control" name="hora" value="{{ isset($evento) ? date('H:m', strtotime($evento->hora) ) : '' }}" required>
                        <span class="alert-danger" role="alert">{{ $errors->first('hora') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="nome"><b>Nome</b></label>
                        <input type="text" class="form-control" name="nome" required minlength="3" maxlength="20" value="{{isset($evento) ? $evento->nome : '' }}">
                        <span class="alert-danger" role="alert">{{ $errors->first('nome') }}</span>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="local"><b>Local</b></label>
                        <input type="text" class="form-control" name="local" required minlength="1" maxlength="60" value="{{isset($evento) ? $evento->local : '' }}">
                        <span class="alert-danger" role="alert">{{ $errors->first('local') }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="local"><b>Descrição</b></label>
                        <textarea class="form-control" name="descricao" required minlength="1" maxlength="40">{{isset($evento) ? $evento->descricao : '' }}</textarea>
                        <span class="alert-danger" role="alert">{{ $errors->first('descricao') }}</span>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>                    
                    
            </form>

        </div>
    </div>
  </div>
@stop
