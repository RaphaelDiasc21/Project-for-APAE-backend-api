<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ParceiroService;

class ParceiroController extends Controller
{
    public $parceiroService;

    public function __construct()
    {
        $this->parceiroService = new ParceiroService();    
    }

    public function index()
    {
        $parceiros = $this->parceiroService->getParceiros();
        return response()->json(['parceiros'=>$parceiros],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function getParceiro($id)
    {
        $parceiro =  $this->parceiroService->getParceiro($id);
        return response()->json(['parceiro'=>$parceiro],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function delete($id)
    {
        $parceiro = $this->parceiroService->destroy($id);
        return response()->json(['parceiro'=>$parceiro],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function update(Request $request, $id)
    {
        $parceiro = $this->parceiroService->update($request,$id);
        return response()->json(['parceiro'=>$parceiro],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function create(Request $request)
    {
        $parceiro = $this->parceiroService->create($request);
        return response()->json(['parceiro'=> $parceiro],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }
}
