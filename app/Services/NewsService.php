<?php
namespace App\Services;

use App\Models\News;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class NewsService{
    public function RetornaTodosOsDados(): Collection{
        return News::all();
    }

    public function ContadorDeRegistros(): int | null{
        return News::query()->count();
    }

    public function BuscarPorNome(string $nome = null): Collection{
        return News::query()->where([['nome', 'like', '%'.$nome.'%']])->get();
    }

    public function CriarNovoRegistro(array $attributes = []){
        return News::query()->create($attributes);
    }

    public function BuscarPorId(int $id = null): Model | null{
        return News::query()->find($id);
    }

    public function ExcluirRegistro(int $id = null): bool{
        return News::query()->where('id', $id)->delete();
    }

    public function AtualizaRegistro(Request $request = null, int $id = null): bool{
        return News::query()->where('id', $id)->update($request->except(['_token', '_method']));;
    }
}
?>