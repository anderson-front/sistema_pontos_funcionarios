<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <title>Cadastro de Funcionarios</title>
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
    <div class="row">
        <div class="col-6">
            <div class="form-group col-md-12">
                <h2 class="page-header">Cadastro de Funcionários</h2>
            </div>

            <div class="form-group col-md-8">
                <a href="{{ route('funcionario.index')}}" class="btn btn-primary">Voltar</a>
            </div>
            
            <form action="{{route('funcionario.create')}}" method="POST">
                @csrf
                <div class="form-group col-md-8">
                    <label for="">Nome Completo</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group col-md-8">
                    <label for="">Login</label>
                    <input type="text" name="login" class="form-control">
                </div>

                <div class="form-group col-md-8">
                    <label for="">Senha</label>
                    <input type="text" name="senha" class="form-control">
                </div>

                <div class="form-group col-md-8">
                    <label for="">Administrador</label>
                    <select class="custom-select" name="administrador_id">
                        @foreach ($administrador as $adm)
                            <option>                            
                                {{ $adm->id }} - {{ $adm->name }}                            
                            </option>
                        @endforeach
                    </select>                    
                </div>
                <div class="form-group col-md-8">
                    <button class="btn btn-success">Cadastrar</button>
                </div>
            </form>
    </div>    
</div>
    
</body>
</html>