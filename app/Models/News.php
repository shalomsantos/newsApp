<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_type_news',
        'title',
        'desc_news',
    ];

    public $timestamps = false;

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type_news::class, 'id_type_news');
    }
}
