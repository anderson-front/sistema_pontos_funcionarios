<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <title>Listar Alunos</title>
    <style>
        .alinhar{
            text-align: left;
        }
    </style>
</head>
<body>
<div class="container">
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
                    <div class="col-12">
                        <h1>Registro de Funcionarios</h1>

                        <div class="form-group">
                            <a href="{{ route('funcionario.index')}}" class="btn btn-primary">Voltar</a>
                        </div>

                        <div class="table-responsive-sm">
                            <table class="table table-hover ">
                                <thead>
                                    <tr class="table-primary">
                                        <td>Id</td>
                                        <td>Nome</td>
                                        <td>Login</td>
                                        <td>Saldo</td>
                                        <th class="alinhar" colspan="2">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>                                
                                        <tr>
                                            <td>{{ $funcionario->id }}</td>
                                            <td>{{ $funcionario->nome_completo }}</td>
                                            <td>{{ $funcionario->login }}</td>
                                            <td>R$ {{  number_format($valor['saldo'], 2, '.', '') }}</td>
                                            <form action="{{ route('funcionario.destroy', $funcionario->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <td><button type="submit" class="btn btn-danger">Excluir</button></td>
                                            </form>
                                        </tr>
                                </tbody>
                            </table>
                </div>
            </div>
      </div>
   </div>
</div>
</body>
</html>