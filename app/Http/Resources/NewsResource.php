<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'type'        => $this->type ? $this->type->type_news_desc : null,
            'title'       => $this->title,
            'desc_news'   => $this->desc_news,
        ];
    }
}
