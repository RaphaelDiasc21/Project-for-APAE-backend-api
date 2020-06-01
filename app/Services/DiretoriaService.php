<?php

    namespace App\Services;

    use Illuminate\Http\Request;
    use App\Diretoria;
    use App\Services\FotoService;

    class DiretoriaService
    {

      

        public function create(Request $request)
        {
            $diretoriaEntity = new Diretoria();
            $diretoriaEntity->diretoria = $request->diretoria;
            $diretoria = $diretoriaEntity->save();
            return $diretoria;

        }

        public function getDiretoria()
        {
            return Diretoria::all();
        }

        public function update(Request $request, $id)
        {
            $diretoriaEntity = Diretoria::find($id);
            $diretoriaEntity->diretoria = $request->diretoria;
            $diretoria = $diretoriaEntity->save();
            return $diretoria;

        }

    }