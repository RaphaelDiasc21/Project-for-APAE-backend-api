<?php

    namespace App\Services;

    use Illuminate\Http\Request;
    use App\Galeria;
    use App\Services\FotoService;

    class GaleriaService
    {
        private $fotoService;

        public function __construct()
        {
            $this->fotoService = new FotoService();
        }

        public function getAlbuns()
        {
            return Galeria::with('fotos')->get();
        }

        public function getAlbum($id)
        {
            return Galeria::find($id)->with('fotos')->get();
        }

        public function create(Request $request)
        {
            $galeriaEntity = new Galeria();
            $galeriaEntity->album = $request->album;
            $galeriaEntity->save();

            $this->fotoService->uploadFoto($request->file('fotos'), $galeriaEntity->id,'galeria');

            return $galeriaEntity;
        }

        public function destroy($id)
        {
            $album = Galeria::find($id);
            $album->delete();
            return $album;
        }

        public function update(Request $request, $id)
        {
            $album = Galeria::find($id);
            $album->album = $request->album;
            $album->save();

            return $album;
        }

        public function addFotos(Request $request, $id)
        {
            $this->fotoService->uploadFoto($request->file('fotos'), $id,'galeria');
        }

        public function deleteFoto($id)
        {
            return $this->fotoService->deleteFoto($id);
           
        }
    }