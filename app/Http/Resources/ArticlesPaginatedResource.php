<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticlesPaginatedResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'items' => ArticlesResource::collection($this),
            'next' => $this->nextPageUrl(),
            'blog' => route('app.articles.index'),
        ];
    }
}
