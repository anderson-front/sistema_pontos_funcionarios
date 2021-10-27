<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <title>Editar Funcionário</title>
</head>
<body>
<div class="container">
    <header>
        <div class="container" id="container">
            <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
                <a href="" class="navbar-brand">
                    Dashboard
                </a>
            </nav>      
        </div>
    </header>

    <div class="container">
        <div id="form-funcionario">
            <div class="row">
                <div class="col-6">
                    <div class="form-group col-md-8">
                        <h2 class="page-header">Movimentação</h2>

                        <div class="form-group">
                            <a href="{{ route('funcionario.index')}}" class="btn btn-primary">Voltar</a>
                        </div>
                    </div>

                    <form action="{{route('balance.store')}}" method="POST">
                        @csrf
                        <div class="form-group col-md-8">
                            <label for="">Tipo</label><br />
                            <select class="custom-select" name="tipo">
                                <option>Entrada</option>
                                <option>Saida</option>
                            </select>
                        </div>
        
                        <div class="form-group col-md-8">
                            <label for="">Valor</label>
                            <input type="text" name="valor" class="form-control">
                        </div>
        
                        <div class="form-group col-md-8">
                            <label for="">Observação</label>
                            <input type="text" name="observacao" class="form-control">
                        </div>

                            <input type="hidden" name="funcionario"  class="form-control"  value="{{$funcionario->id }}">

                            <input type="hidden" name="administrador" class="form-control"  value="{{$administrador->id}}">
        
                        <div class="form-group col-md-8">
                            <button class="btn btn-success">Cadastrar</button>
                        </div>
                    </form>
            </div>
        </div>
   </div>    
</div>
    
</body>
</html>