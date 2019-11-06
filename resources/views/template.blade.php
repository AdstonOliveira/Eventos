@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Painel</div>
    <div class="card-body">
        <h6>Bem vindo!</h6>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Menu</div>
                    <div class="card-body">
                        <a href="{{url('participante')}}" class="btn btn-outline-secondary">Participantes</a>
                        <a href="{{url('evento')}}" class="btn btn-outline-secondary">Eventos</a>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop