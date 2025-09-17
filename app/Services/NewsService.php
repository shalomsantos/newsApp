<?php
namespace App\Services;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class NewsService{
    public function RetornaTodosOsDados(): Collection{
        return News::with('type')->get();
    }

    public function ContadorDeRegistros(): int | null{
        return News::query()->count();
    }

    public function BuscarPorTitulo(?string $titulo = null): Collection{
        return News::query()->where([['title', 'like', '%'.$titulo.'%']])->get();
    }

    public function CriarNovoRegistro(array $attributes = []){
        return News::query()->create($attributes);
    }

    public function BuscarPorId(?int $id = null): model | null{
        return News::query()->find($id);
    }

    public function ExcluirRegistro(?int $id = null): bool{
        return News::query()->where('id', $id)->delete();
    }

    public static function AtualizaRegistro(Request $request, ?int $id): bool{
        return News::query()->where('id', $id)->update($request->except(['_token', '_method']));;
    }
}
?>
