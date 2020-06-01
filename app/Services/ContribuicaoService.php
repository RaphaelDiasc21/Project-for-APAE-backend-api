<?php

    namespace App\Services;

    use Illuminate\Http\Request;
    use App\Contribuicao;

    class ContribuicaoService
    {
        public function create(Request $request)
        {
            $contribuicaoEntity = new Contribuicao();
            $contribuicaoEntity->nome = $request->input("valor");
            $contribuicaoEntity->email = $request->input("nome");
            $contribuicaoEntity->telefone = $request->input("email");
            $contribuicaoEntity->cidade = $request->input("cpf");
            $contribuicaoEntity->estado = $request->input("aniversario");
            $contribuicaoEntity->assunto = $request->input("telefone");
            $carosel = $contribuicaoEntity->save();
        }

        public function getContribuicoes()
        {
            return Contribuicao::all();
        }
        
        public function deleteContribuicao($id)
        {
            return Contribuicao::find($id)->delete();
        }
    }