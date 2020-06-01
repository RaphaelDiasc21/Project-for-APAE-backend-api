<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\InfomacoesService;

class InformacoesController extends Controller
{
    public $informacoesService;

    public function __construct()
    {
        $this->infomacoesService = new InformacoesService();    
    }

    public function index()
    {
        $informacoes = $this->informacoesService->getInformacoes();
        return response()->json(['informacoes'=>$informacoes],201);
    }


    public function create(Request $request)
    {
        $informacoes = $this->informacoesService->create($request);
        return response()->json(['informacoes'=> $informacoes]);
    }

    public function update(Request $request, $id)
    {
        $inormacoes = $this->informacoesService->update($request, $id);
        return response()->json(['informacoes'=> $informacoes]);
    }
}
