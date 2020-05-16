<?php

    namespace App\Services;
    use Illuminate\Support\Facades\File; 
    use App\Foto;

    class FotoService
    {
        public function uploadFoto($fotos,$entity_id,$repo)
        {
            foreach($fotos as $foto)
            {
                $foto_name_saved = md5($foto->getClientOriginalName().$entity_id).'.jpg';
                $foto->move(public_path('/images/'.$repo),$foto_name_saved);
                
                $fotoEntity = new \App\Foto();
                $fotoEntity->url = url('/images/'.$repo."/".$foto_name_saved);
                $fotoEntity->entity_id = $entity_id;
                $fotoEntity->save();
            }
        }

        public function deleteFoto($id,$repo)
        {
            $fotos = \DB::table('fotos')->where('entity_id',$id)->get()->toArray();
            $this->deleteFileOnServer($fotos,$repo);
        }

        public function destroyFoto($id,$repo)
        {
            $file = \App\Foto::find($id);
            $this->deleteFileOnServer(Array($file),$repo);
            $file->delete();
        }

        private function deleteFileOnServer($fotos,$repo)
        {
           
            foreach($fotos as $foto)
            {
                $pos = strpos($foto->url,$repo);
                $string_path = substr($foto->url,$pos);
                File::delete(public_path('/images/'.$string_path));
                \App\Foto::find($foto->id)->delete();
            }
        }
    }