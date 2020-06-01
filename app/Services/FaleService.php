<?php

    namespace App\Services;

    use Illuminate\Http\Request;
    use App\Fale;

    class FaleService
    {
        public function create(Request $request)
        {
            $faleService = new Carosel();
            $faleService->nome = $request->input("nome");
            $faleService->email = $request->input("email");
            $faleService->telefone = $request->input("telefone");
            $faleService->cidade = $request->input("cidade");
            $faleService->estado = $request->input("estado");
            $faleService->assunto = $request->input("assunto");
            $faleService->menssagem = $request->input("menssagem");
            $carosel = $faleService->save();

        }

        public function getFales()
        {
            return Fale::all();
        }
        
        public function deleteFale($id)
        {
            return Fale::find($id)->delete();
        }
    }