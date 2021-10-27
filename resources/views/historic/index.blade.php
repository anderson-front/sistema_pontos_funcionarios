@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Extrato</title>
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <style>
        .alinhamento{
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="container-index" id="container">
                <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
                    <a href="" class="navbar-brand">
                        Dashboard
                    </a>
    
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
    
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </nav>      
            </div>
        </header>

<div class="container">
    <div id="form-funcionario">
        <div class="row">
            <div class="col-12">
                    <h1>Extrato</h1>

                    <div class="form-group">
                        <a href="{{ route('funcionario.index')}}" class="btn btn-primary">Voltar</a>
                    </div>

                    <h5 class="card-title">
                        Exibindo {{ $extrato->count()}} registros de {{ $extrato->total()}} ({{$extrato->firstItem()}} a {{$extrato->lastItem()}}) 
                    </h5>

                    <div class="form-group">
                        <form action="{{ route('historic.search') }}" method="POST" class="form form-inline">
                            @csrf
                            <input type="text" name="filter" id="pesquisa">
                            <button type="submit" class="btn btn-info btn-sm" id="pesquisa-btn">Pesquisar</button>
                        </form>
                    </div>

                    <div class="table-responsive-sm">
                        <table class="table table-hover ">
                            <thead>
                                <tr class="table-primary">
                                    <td>Id</td>
                                    <td>Entrada/Saída</td>
                                    <td>Observação</td>
                                    <td>Valor</td>
                                    <td>Funcionario</td>
                                    <td>Administrador</td>
                                    <td>Data Mov</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($extrato as $e)
                                    <tr>
                                        <td>{{ $e->id }}</td>
                                        <td>{{ $e->tipo_movimentacao }}</td>
                                        <td>{{ $e->observation }}</td>
                                        <td>R$ {{ number_format($e->valor, 2, '.', '') }}</td>
                                        <td>{{ $e->funcionario_id }}</td>
                                        <td>{{ $e->user_id }}</td>
                                        <td>{{ $e->created_at }}</td>
                                    </tr>                            
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group">
                            {{ $extrato->links() }}
                          </div>
                  </div>
              </div>
        </div>
      </div>
   </div>
</div>

</body>
</html>
@endsection