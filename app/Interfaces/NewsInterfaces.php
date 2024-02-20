<?php
namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface NewsInterfaces{
    public static function loadModel(): Model;
    public static function RetornaTodosOsDados(): Collection;
    public static function ContadorDeRegistros(array $attributes): int | null;
    public static function BuscarPorNome(string $nome): Collection;
    public static function CriarNovoRegistro(array $attributes);
    public static function BuscarPorId(int $id): Model | null;
    public static function ExcluirRegistro(int $id): bool;
    public static function AtualizaRegistro(Request $request, int $id): bool;
}

?>