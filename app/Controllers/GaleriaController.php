<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\GaleriaService;

class GaleriaController extends Controller
{
    public $galeriaService;

    public function __construct()
    {
        $this->galeriaService = new GaleriaService();    
    }

    public function index()
    {
        $albuns = $this->galeriaService->getAlbuns();
        return response()->json(['albuns'=>$albuns],201);
    }

    public function album($id)
    {
        $album = $this->galeriaService->getAlbum($id);
        return response()->json(['album'=>$album],201);
    }

    public function create(Request $request)
    {
        $album = $this->galeriaService->create($request);
        return response()->json(['album'=> $album ]);
    }

    public function destroy($id)
    {
        $album = $this->galeriaService->destroy($id);
        return response()->json(['album' => $album]);
    }

    public function update(Request $request,$id)
    {
        $album = $this->galeriaService->update($request,$id);
        return response()->json(['album'=>$album]);
    }

    public function addAlbumFoto(Request $request, $id)
    {
        $this->galeriaService->addFotos($request,$id);
        return response()->json(["mensagem"=>"Foto adicionada"],200);
    }

    public function deleteAlbumFoto($id_foto)
    {
        $foto = $this->galeriaService->deleteFoto($id_foto);
        return response()->json(["foto"=>$foto],201);
    }
}
