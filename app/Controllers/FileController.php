<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Illuminate\Http\Request;

use App\Arquivo;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->file('arquivo')->move(public_path('/arquivos/'),$request->file('arquivo')->getClientOriginalName());
        
        $arquivo = new Arquivo();
        $arquivo->path = $request->file('arquivo')->getClientOriginalName();
        $arquivo->save();
        return response()->json(['arquivo'=>$arquivo],201,[],JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
    }

    public function getFile(Request $request)
    {
        
       $arquivo = $request->input('arquivo');
        return response()->file(public_path('/arquivos/').$arquivo);
    }

    public function getFiles()
    {
        $arquivo = Arquivo::all();
        return response()->json(['arquivos' => $arquivo]);
    }
}
