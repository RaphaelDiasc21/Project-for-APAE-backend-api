<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CaroselService;

class CaroselController extends Controller
{
    public $caroselService;

    public function __construct()
    {
        $this->caroselService = new CaroselService();    
    }

    public function index()
    {
        $albuns = $this->caroselService->getCarosel();
        return response()->json(['carosel'=>$albuns],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }


    public function create(Request $request)
    {
        $carosel = $this->caroselService->create($request);
        return response()->json(['carosel'=> $carosel],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function destroy($id)
    {
        $carosel = $this->caroselService->deleteCarosel($id);
        return response()->json(['carosel'=> $carosel],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function deleteFoto($id_foto)
    {
        $foto = $this->caroselService->deleteFoto($id_foto);
        return response()->json(['foto' => $foto],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function addFoto(Request $request,$id)
    {
        $album = $this->caroselService->addFoto($request,$id);
        return response()->json(['mensagem'=>'Foto adicionada no carosel'],201);
    }
}
