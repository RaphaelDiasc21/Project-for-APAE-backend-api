<?php

    namespace App\Services;

    use Illuminate\Http\Request;
    use App\Noticia;
    use App\Services\FotoService;

    class NoticiaService
    {
        private $fotoService;

        public function __construct()
        {
            $this->fotoService = new FotoService();
        }

        public function getNoticias()
        {
            return Noticia::with('fotos')->get();
        }

        public function getNoticia($id)
        {
            return Noticia::find($id)->with('fotos')->get();
        }

        public function create(Request $request)
        {
            $noticiaEntity = new Noticia();
            $noticiaEntity->data = $request->data;
            $noticiaEntity->texto = $request->texto;
            $noticiaEntity->titulo = $request->titulo;
            $noticiaEntity->save();

            $this->fotoService->uploadFoto($request->file('fotos'), $noticiaEntity->id,'noticia');

            return $noticiaEntity;
        }

        public function destroy($id)
        {
            $noticia = Noticia::find($id);
            $noticia->delete();
            $this->fotoService->deleteFoto($id,'noticia');
            return $noticia;
        }

        public function update(Request $request, $id)
        {
            $noticia = Noticia::find($id);
            $noticia->titulo = $request->input('titulo');
            $noticia->texto = $request->input('texto');
            $noticia->data = $request->input('data');
            $noticia->save();

            return $noticia;
        }

        public function addFotos(Request $request, $id)
        {
            $this->fotoService->uploadFoto($request->file('fotos'), $id,'noticia');
        }
    }