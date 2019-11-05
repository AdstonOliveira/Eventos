@extends('layouts.app')
@section('content')
  <body style="height: 100vh">
    
  <div class="container flex col-5 h-100 justify-content-center border">
    
    <div class="d-flex h-100 align-items-center justify-content-center">
        <div class="card">
            <div class="card-title bg bg-primary d-flex justify-content-center"><h3 class="text-light">Evento</h3></div>
            <div class="card-body">

            <form action="/evento/novo" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="form-group col-sm-6">
                        <label for="data"><h4>Data</h4></label>
                        <input type="date" class="form-control" name="data">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="hora"><h4>Horário</h4></label>
                        <input type="text" class="form-control" name="hora">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group col-sm-12">
                        <label for="nome"><h4>Nome</h4></label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="form-group col-sm-12">
                        <label for="local"><h4>Local</h4></label>
                        <input type="text" class="form-control" name="local">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="local"><h4>Descrição</h4></label>
                        <textarea class="form-control" name="descricao"></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
            </div>
        </div>
    </div>
  </div>

    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>