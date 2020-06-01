<?php

    namespace App\Services;

    use Illuminate\Http\Request;
    use App\Parceiro;
    use App\Services\FotoService;

    class ParceiroService
    {
        private $fotoService;

        public function __construct()
        {
            $this->fotoService = new FotoService();
        }

        public function getParceiros()
        {
            return Parceiro::with('fotos')->get()->toArray();
        }

        public function getParceiro($id)
        {
            return Parceiro::with('fotos')->get()->find($id);
        }

        public function create(Request $request)
        {
            $parceiroEntity = new Parceiro();
            $parceiroEntity->nome = $request->nome;
            $parceiroEntity->descricao = $request->descricao;
            $parceiroEntity->save();
        
            $this->fotoService->uploadFoto($request->fotos, $parceiroEntity->id,'parceiros');

            return $parceiroEntity;
        }

        public function destroy($id)
        {
            $parceiro = Parceiro::find($id);
            $parceiro->delete();
            $this->fotoService->deleteFoto($id,'parceiros');
            return $parceiro;
        }

        public function update(Request $request, $id)
        {
            $parceiro = Parceiro::find($id);
            $parceiro->nome = $request->input('nome');
            $parceiro->descricao = $request->input('descricao');
            $parceiro->save();

            return $parceiro;
        }
    }