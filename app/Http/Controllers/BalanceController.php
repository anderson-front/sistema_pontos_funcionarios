<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Historic;
use App\User;
use Illuminate\Http\Request;

class BalanceController extends Controller
{

    public function edit($id_user,$id_func)
    {
        $administrador = User::find($id_user);
        $funcionario   = Funcionario::find($id_func);

        return view('balance.edit',[
            'administrador' => $administrador,
            'funcionario'   => $funcionario
        ]);
    }

    public function balanceStore(Request $request)
    {
        if($request->tipo == 'Entrada') {
            $tipo = 'E';
        }

        if($request->tipo == 'Saida') {
            $tipo = 'S';
        }

        Historic::create([
           'tipo_movimentacao'   => $tipo,
           'observation'         => $request->observacao,
           'valor'               => $request->valor,
           'funcionario_id'      => $request->funcionario,
           'user_id'             => $request->administrador, 
       ]);

       return redirect()->route('funcionario.index');
    }
}
