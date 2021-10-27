<?php

namespace App\Http\Controllers;

use App\Historic;
use Illuminate\Http\Request;

class HistoricController extends Controller
{

    protected $request;
    private   $repository;

    public function __construct(Request $request, Historic $historic)
    {
        $this->request    = $request;
        $this->repository = $historic;
        // $this->middleware('auth');
    }


    public function index()
    {
        $extrato = Historic::paginate(5);
        return view('historic.index', [
            'extrato' => $extrato, 
        ]);

    }

    public function search(Request $request)
    {
        $extrato = $this->repository->search($request->filter);

        return view('historic.index', [
            'extrato' => $extrato
        ]);
    }
}
