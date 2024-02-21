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
        
        if(!$request['id_type_news']){
            return response()->json([
                "message" => "O Id do tipo notícia deve ser enviado, use 1(Urgente) ou 2(Diário).",
            ]); 
        }else if(!$request['title']){
            return response()->json([
                "message" => "O titulo da notícia deve ser enviado.",
            ]); 
        }else if(!$request['desc_news']){
            return response()->json([
                "message" => "A descrição da notícia deve ser enviada.",
            ]); 
        }
        // CriarNovoRegistro precisa que nao haja noticia com o mesmo titulo no ar
        if(!count($this->NewsService->BuscarPorTitulo($request['title']))){
            $newsCreate = $this->NewsService->CriarNovoRegistro([
                'id_type_news' => $request['id_type_news'],
                'title' => $request['title'],
                'desc_news' => $request['desc_news'],
            ]);
    
            if(!$newsCreate){
                return response()->json([
                    "message" => "Erro ao inserir nova notícia.",
                ]);  
            }
            return response()->json([
                "message" => "Notícia sobre '". $newsCreate->title ."' criada com sucesso.",
            ]);
        }else{
            return response()->json([
                "message" => "Notícia já está no ar.",
            ]);
        }
    }

    /**
     * Exiba o recurso especificado.
     */
    public function show(int $id){
        // chamada a função na camada service para buscar por id
        $news = $this->NewsService->BuscarPorId($id);

        if(!$news){
            return response()->json([
                'message' => "Notícia não encontrada, certifique-se do número do resgistro.",
            ]);
        }else{
            //substituindo valor por dados, em colunas nao booleanas, cabe um subselect.
            $news->id_type_news == 1? $news->id_type_news = 'Ugente' : $news->id_type_news = 'Diário';

            return new NewsResource($news);
        }
    }

    /**
     * Atualize o recurso especificado no armazenamento.
     */
    public function update(Request $request, string $id){
        $newsCreate = $this->NewsService->AtualizaRegistro([
            'id_type_news' => $request['id_type_news'],
            'title' => $request['title'],
            'desc_news' => $request['desc_news'],
        ], $id);

        if($newsCreate){
            return response()->json([
                "message" => "Notícia atualizada com sucesso.",
            ]); 
        }else{
            return response()->json([
                "message" => "Erro ao atualizar notícia.",
            ]); 
        }
    }

    /**
     * Remova o recurso especificado do armazenamento.
     */
    public function destroy(int $id)
    {
        // busca noticia
        $news = $this->NewsService->BuscarPorId($id);
        // se existe
        if(!$news){
            return response()->json([
                'message' => "Não contém registro desta notícia.",
            ]);
        }
        //valida sucesso
        if($this->NewsService->ExcluirRegistro($id)){
            return response()->json([
                'message' => "Notícia deletada com sucesso.",
            ]);
        }else{
            return response()->json([
                'message' => "Erro ao deletar notícia.",
            ]);
        }

    }
}
