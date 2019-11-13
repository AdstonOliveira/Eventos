@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex row">

            <div class="col col-8 col-sm-12 col-md-10 ">
                <div class="row justify-content-center"><h4>{{ isset($participante) ? $participante->nome : 'Testes'}}</h4></div>
                <div class="row justify-content-center">{{ isset($participante) ? 'Participante cadastrado nos seguintes eventos' : 'Modo teste'}}</div>                
            </div>

            <div class="col col-md-2 col-sm-12">
                <div class="row justify-content-end">
                    <button class="btn btn-default" id="print">
                        <i class="material-icons" style="font-size: 40px">
                            print
                        </i>
                    </button>
                </div>
            </div>

        </div>
    </div>

        <div class="card-body">
            <table class="table table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th>Evento</th>
                        <th>Data</th>
                        <th>Hora</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($participante->eventos as $evento)
                        <tr>
                            <td>{{$evento->nome}}</td>
                            <td>{{$evento->data}}</td>
                            <td>{{$evento->hora}}</td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
@section('scripts')
    <script>
        $('#print').on('click', function(){
            window.print();
        })
        
    
    
    </script>
@endsection