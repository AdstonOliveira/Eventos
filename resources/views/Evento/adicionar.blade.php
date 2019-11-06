@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">Adicionar a lista de {{isset($evento) ? $evento->nome : '' }}</div>
        <div class="card-body">

            <div class="row">
                <div class="col col-3">
                    <select id="part" class="form-control">

                    @forelse ($participantes as $participante)
                        <option value = "{{ $participante->id }}">
                            {{$participante->nome}}
                        </option> 
                    @empty 
                        <option value = "" disabled selected>Necessário cadastrar ao menos um participante</option>
                    </select>

                        <a href="{{url('/participante/create')}}" class="nav-link">Cadastre aqui</a>
                    @endforelse
                    </select>
                
                </div>
                
                <div class="col">
                    <a href="" class="btn btn-success">Adicionar</a>
                </div>



            </div>






        </div>
    </div>
</div>
@stop
@section('scripts')
<script>
    $( document ).ready(function() {
        
    });

</script>    
@endsection
