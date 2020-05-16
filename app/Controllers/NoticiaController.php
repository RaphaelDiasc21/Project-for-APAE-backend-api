<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\NoticiaService;

class NoticiaController extends Controller
{
    public $noticiaService;

    public function __construct()
    {
        $this->noticiaService = new NoticiaService();    
    }

    public function index()
    {
        $noticias = $this->noticiaService->getNoticias();
        return response()->json(['noticias'=>$noticias],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function getNoticia(Request $request)
    {
        $noticia =  $this->noticiaService->getNoticia($request->id);
        return response()->json(['noticia'=>$noticia],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function delete($id)
    {
        $noticia = $this->noticiaService->destroy($id);
        return response()->json(['noticia'=>$noticia],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function update(Request $request, $id)
    {
        $noticia = $this->noticiaService->update($request,$id);
        return response()->json(['noticia'=>$noticia],200,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function create(Request $request)
    {
        $noticia = $this->noticiaService->create($request);
        return response()->json(['noticia'=> $noticia],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function addFoto(Request $request,$id)
    {
        $this->noticiaService->addFoto($request,$id);
        return response()->json(['mensagem'=>'Foto adicionada no carosel'],201);
    }
}
