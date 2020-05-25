<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\FaleService;

class FaleController extends Controller
{
    public $faleService;

    public function __construct()
    {
        $this->faleService = new FaleService();    
    }

    public function index()
    {
        $fale = $this->faleService->getFales();
        return response()->json(['fale'=>$fale],201);
    }

    public function create(Request $request)
    {
        $fale = $this->faleService->create($request);
        return response()->json(['fale'=> $fale]);
    }

    public function deleteFale($id)
    {
        $foto = $this->faleService->deleteFale($id);
        return response()->json(['foto' => $foto]);
    }

}
