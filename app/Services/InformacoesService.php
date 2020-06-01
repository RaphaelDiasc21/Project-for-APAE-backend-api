<?php

    namespace App\Services;

    use Illuminate\Http\Request;
    use App\Informacoes;

    class InformacoesService
    {
        
        public function create(Request $request)
        {
            $informacoesEntity = new Informacoes();
            $informacoesEntity->endereco = $request->endereco;
            $informacoesEntity->telefone = $request->telefone;
            $informacoesEntity->email = $request->email;
            $informacoesEntity->redes_sociais = $request->redes_sociais;
            $informacoes = $informacoesEntity->save();
            return $informacoes;
        }

        public function getInformacoes()
        {
            return Informacoes::all();
        }

        public function update(Request $request, $id)
        {
            $informacoesEntity = Informacoes::find($id);
            $informacoesEntity->endereco = $request->endereco;
            $informacoesEntity->telefone = $request->telefone;
            $informacoesEntity->email = $request->email;
            $informacoesEntity->redes_sociais = $request->redes_sociais;
            $informacoes = $informacoesEntity->save();
        }
    }