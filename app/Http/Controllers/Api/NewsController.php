<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct(
        protected NewsService $NewsService,
        public readonly News $news
    ){

    }
    /**
     * Exiba uma listagem do recurso.
     */
    public function index(){
        // Acessando dados e retornando utilizando padronização(http/resource) de retorno de dados
        $news = $this->NewsService->RetornaTodosOsDados();


        if($this->NewsService->ContadorDeRegistros() == 0){
            return response()->json([
                "message" => "Base de dados não contém registro.",
            ]);
        }
        //resolvendo consulta com operador ternário, mas um tipo que variável maior que dois valores cabe uma consulta normal
        foreach($news as $item){
            $item->id_type_news == 1? $item->id_type_news = 'Ugente' : $item->id_type_news = 'Diário';
        }

        return NewsResource::collection($news);
    }

    /**
     * Armazene um recurso recém-criado no armazenamento.
     */
    public function store(Request $request){
        // recebe e entao armazena na variavel data para criar novo registro
        if(empty($request['id_type_news'])){
            return response()->json([
                "message" => "O Id do tipo notícia deve ser enviado, use 1(Urgente) ou 2(Diário).",
            ]); 
        }else if(empty($request['title'])){
            return response()->json([
                "message" => "O titulo da notícia deve ser enviado.",
            ]); 
        }else if(empty($request['desc_news'])){
            return response()->json([
                "message" => "A descrição da notícia deve ser enviada.",
            ]); 
        }
        $newsCreate = $this->NewsService->CriarNovoRegistro([
            'id_type_news' => $request['id_type_news'],
            'title' => $request['title'],
            'desc_news' => $request['desc_news'],
        ]);

        if($newsCreate){
            return $newsCreate;
        }

        return response()->json([
            "message" => "Erro ao criar produto.",
        ]);   
    }

    /**
     * Exiba o recurso especificado.
     */
    public function show(string $id){
        // findOfFail já devolve o response 404 se for o caso
        $news = News::findOrFail($id);
        if(!$news){
            return response()->json([
                'message' => "Id não encontrado, certifique-se do número do resgistro.",
            ]);
        }

        return new NewsResource($news);
    }

    /**
     * Mostre o formulário para editar o recurso especificado.
     */
    public function edit(string $id){
        return response()->json([
            'edit' => true,
        ]);
    }

    /**
     * Atualize o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id){
        return response()->json([
            'update' => true,
        ]);
    }

    /**
     * Remova o recurso especificado do armazenamento.
     */
    public function destroy(string $id)
    {
        $news = News::where('id', $id)->delete();

        if(!$news){
            return response()->json([
                'message' => "Erro ao deletar notícia sobre ". $news->title .".",
            ]);
        }

        return response()->json([
            'message' => "Notícia sobre ". $news->title ." deletada com sucesso.",
        ]);
    }
}
