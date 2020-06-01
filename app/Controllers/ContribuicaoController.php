<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ContribuicaoService;

class ContribuicaoController extends Controller
{
    public $contribuicaoService;

    public function __construct()
    {
        $this->contribuicaoService = new ContribuicaoService();    
    }

    public function index()
    {
        $fale = $this->contribuicaoService->getContribuicoes();
        return response()->json(['fale'=>$fale],201);
    }

    public function create(Request $request)
    {
        $fale = $this->contribuicaoService->create($request);
        return response()->json(['fale'=> $fale]);
    }

    public function deleteContribuicao($id)
    {
        $foto = $this->contribuicaoService->deleteContribuicao($id);
        return response()->json(['foto' => $foto]);
    }
}
