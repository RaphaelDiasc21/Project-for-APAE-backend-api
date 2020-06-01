<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DiretoriaService;

class DiretoriaController extends Controller
{
    public $diretoriaService;

    public function __construct()
    {
        $this->diretoriaService = new DiretoriaService();    
    }

    public function index()
    {
        $diretoria = $this->diretoriaService->getDiretoria();
        return response()->json(['diretoria'=>$diretoria],201);
    }


    public function create(Request $request)
    {
        $diretoria = $this->diretoriaService->create($request);
        return response()->json(['diretoria'=> $diretoria]);
    }

    public function update(Request $request, $id)
    {
        $diretoria = $this->diretoriaService->update($request, $id);
        return response()->json(['diretoria'=> $diretoria]);
    }
    
}
