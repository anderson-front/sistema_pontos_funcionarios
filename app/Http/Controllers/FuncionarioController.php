<?php

namespace App\Http\Controllers;

// use App\Administrador;
use App\Funcionario;
use App\User;
use App\Balance;
use App\Historic;
use Illuminate\Http\Request;


class FuncionarioController extends Controller
{
    protected $request;
    private   $repository;

    public function __construct(Request $request, Funcionario $funcionario)
    {
        $this->request    = $request;
        $this->repository = $funcionario;
        $this->middleware('auth');
    }

    public function index()
    {

        $funcionarios = Funcionario::paginate(5);
        return view('funcionario.index', [
            'funcionarios' => $funcionarios, 
        ]);
    }

    public function show($id)
    {
        $funcionario = Funcionario::find($id);
        $administrador = User::all();

        $historicoE = Historic::where('tipo_movimentacao','E')->where('funcionario_id',$id)
        ->select('valor')
        ->get();

        $historicoS = Historic::where('tipo_movimentacao','S')->where('funcionario_id',$id)
        ->select('valor')
        ->get();

        $entrada = $historicoE->sum('valor');
        $saida   = $historicoS->sum('valor');

        $saldo = $entrada - $saida;

        $valor = ['saldo'=>$saldo];


        if (!$funcionario) {
            return redirect()->back();
        }

        return view('funcionario.show',compact('funcionario','valor'));
    }

    public function create()
    {
        $administrador = User::all();
        return view('funcionario.create',[
            'administrador' =>$administrador
        ]);
    }

    public function store(Request $request)
    {

        $parcial = explode(" ",$request->administrador_id);
        $id_adm = intVal($parcial[0]);

        Funcionario::create([
           'nome_completo'       => $request->name,
           'login'               => $request->login,
           'password'            => $request->senha,
           'user_id'             => $id_adm
       ]);

       return redirect()->route('funcionario.index');
    }

    public function edit($id)
    {
        if (!$funcionario = Funcionario::find($id)){
            return redirect()->back();
        }

        return view('funcionario.edit',[
            'funcionario' =>$funcionario,
        ]);
    }

    public function update(Request $request,$id)
    {        
        $funcionario = $this->repository->find($id);
        if (!$funcionario) {
            return redirect()->back();
        }

        $funcionario->update($request->all());
        return redirect()->route('funcionario.index');
    }

    public function destroy($id)
    {
        $funcionario = $this->repository->where('id', $id)->first();
        if (!$funcionario) {
            return redirect()->back();
        }

        $funcionario->delete();

        return redirect()->route('funcionario.index');
    }

    public function search(Request $request)
    {
        $funcionarios = $this->repository->search($request->filter);

        return view('funcionario.index', [
            'funcionarios' => $funcionarios
        ]);
    }
}
