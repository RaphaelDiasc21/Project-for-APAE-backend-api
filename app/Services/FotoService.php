<?php

    namespace App\Services;

    class FotoService
    {
        public function uploadFoto($fotos,$entity_id,$repo)
        {
            foreach($fotos as $foto)
            {
                $fotoEntity = new \App\Foto();
                $fotoEntity->url = $foto->store($repo);
                $fotoEntity->entity_id = $entity_id;
                $fotoEntity->save();
            }
        }

        public function deleteFoto($id)
        {
            $foto = \App\Foto::find($id);
            $foto->delete();

            return $foto;
        }
    }