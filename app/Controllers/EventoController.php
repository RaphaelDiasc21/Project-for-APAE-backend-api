<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EventoService;

class EventoController extends Controller
{
    public $eventoService;

    public function __construct()
    {
        $this->eventoService = new EventoService();    
    }

    public function index()
    {
        $eventos = $this->eventoService->getEventos();
        return response()->json(['eventos'=>$eventos],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function getEvento($id)
    {
        $evento = $this->eventoService->getEvento($id);
        return response()->json(['evento'=>$evento],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function delete($id)
    {
        $evento = $this->eventoService->destroy($id);
        return response()->json(['eventos'=>$evento],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function update(Request $request,$id)
    {
        $evento = $this->eventoService->update($request,$id);
        return response()->json(['evento'=>$evento],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function create(Request $request)
    {
        $evento = $this->eventoService->create($request);
        return response()->json(['evento'=> $evento],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function addFoto(Request $request,$id)
    {
        $album = $this->eventoService->addFoto($request,$id);
        return response()->json(['mensagem'=>'Foto adicionada no carosel'],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function deleteFoto(Request $request,$id)
    {
        $this->eventoService->deleteFoto($id);
    }
}
