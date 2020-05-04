<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use App\Controllers\Controller;
use App\Estatuto;


class EstatutoController extends Controller
{

    //Acabei optando por não utilizar um construtor
    //e instanciar os models dentro da função
    //mesmo, espero que esteja tudo bem

    /*Observação: tive a impressão de que
    criando os métodos de forma "padrão"
    iria acarretar um problema pois a ideia, pelo que entendi, é
    de que houvesse somente um registro na tabela em questão. Por isso,
    tentei "forçar" essa coisa de ter uma linha só (desculpe se não era
    essa a ideia, rs, tenho o pressentimento que posso ter entendido essa
    parte totalmente errado)
    */


    public function index()
    {

        $estatuto = Estatuto::findOrFail(1);
        
        return response()->json(['estatuto'=>$estatuto->estatuto], 200);

    }

    public function create(Request $request)
    {

    //Se inserção ainda não foi feita -> realiza inserção
    //Se não                          -> mensagem de erro

    if( Estatuto::find(1) == null ) {

        $novoEstatuto = new Estatuto;
        $novoEstatuto->id = 1;
        $novoEstatuto->estatuto = $request->estatuto;

        $novoEstatuto->save();

        return response()->json(['estatuto'=>$novoEstatuto->estatuto], 201);
  
    } else {

        return response ('Erro: estatuto já foi inserido, logo a inclusão foi negada. Utilize uma chamada do tipo put pa
        ra realizar uma atualização, caso esse seja o desejado', 403);

    }

    }

    public function update(Request $request/*, $id*/)
    {
        $estatutoASerAtualizado = Estatuto::findOrFail(1);
        $estatutoASerAtualizado->estatuto = $request->estatuto;

        $estatutoASerAtualizado->save();

        return response()->json(['estatuto'=>$estatutoASerAtualizado->estatuto], 200);
    }

}
