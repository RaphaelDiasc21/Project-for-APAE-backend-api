<?php

    namespace App\Services;

    use Illuminate\Http\Request;
    use App\Carosel;
    use App\Services\FotoService;

    class CaroselService
    {
        private $fotoService;

        public function __construct()
        {
            $this->fotoService = new FotoService();
        }

        public function create(Request $request)
        {
            $caroselEntity = new Carosel();
            $carosel = $caroselEntity->save();

            $this->fotoService->uploadFoto($request->file('fotos'),$carosel->id,'carosel');
        }

        public function getCarosel()
        {
            return Carosel::with('fotos')->get();
        }

        public function addFoto($request,$id)
        {
            $this->fotoService->uploadFoto($request->file('fotos'),$id,'carosel');
        }

        public function deleteFoto($id)
        {
            return $this->fotoService->deleteFoto($id);
        }
    }