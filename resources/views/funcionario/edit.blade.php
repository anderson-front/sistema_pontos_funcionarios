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
                    <h2 class="page-header">Editar Funcionário</h2>
                    
                    <div class="form-group">
                        <a href="{{ route('funcionario.index')}}" class="btn btn-primary">Voltar</a>
                    </div>

                    <form action="{{route('funcionario.update',$funcionario->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="">Nome Completo</label>
                            <input type="text" name="nome_completo" class="form-control" value="{{ $funcionario->nome_completo }}">
                        </div>

                        <div class="form-group">
                            <label for="">Login</label>
                            <input type="text" name="login" class="form-control" value="{{ $funcionario->login }}">
                        </div>

                        <div class="form-group">
                            <label for="">Senha</label>
                            <input type="text" name="senha" class="form-control" value="{{ $funcionario->password }}">
                        </div>

                        <button class="btn btn-success">Atualizar</button>
                    </form>
            </div>
        </div>
   </div>    
</div>
    
</body>
</html>