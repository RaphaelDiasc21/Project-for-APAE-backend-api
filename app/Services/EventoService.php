<?php

    namespace App\Services;

    use Illuminate\Http\Request;
    use App\Evento;
    use App\Services\FotoService;

    class EventoService
    {
        private $fotoService;

        public function __construct()
        {
            $this->fotoService = new FotoService();
        }

        public function getEventos()
        {
            return Evento::with('fotos')->get();
        }

        public function getEvento($id)
        {
            return Evento::with('fotos')->get()->find($id);
        }

        public function create(Request $request)
        {
            $eventoEntity = new Evento();
            $eventoEntity->data = $request->data;
            $eventoEntity->local = $request->local;
            $eventoEntity->titulo = $request->titulo;
            $eventoEntity->descricao = $request->descricao;
            $eventoEntity->save();

            $this->fotoService->uploadFoto($request->file('fotos'), $eventoEntity->id,'eventos');

            return $eventoEntity;
        }

        public function destroy($id)
        {
            $evento = Evento::find($id);
            $this->fotoService->deleteFoto($evento->id,'eventos');
            $evento->delete();
            return $evento;
        }

        public function update(Request $request, $id)
        {
            $evento = Evento::find($id);
            $evento->local = $request->input('local');
            $evento->titulo = $request->input('titulo');
            $evento->descricao = $request->input('descricao');
            $evento->data = $request->input('data');
            $evento->save();

            return $evento;
        }

        public function addFotos(Request $request, $id)
        {
            $this->fotoService->uploadFoto($request->file('fotos'), $id,'eventos');
        }

        public function deleteFoto($id)
        {
            $this->fotoService->destroyFoto($id,'eventos');
        }
    }