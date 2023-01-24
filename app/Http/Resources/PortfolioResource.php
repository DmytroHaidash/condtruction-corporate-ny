<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PortfolioResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'body' => remove_tags($this->content->body, 200),
            'content' => $this->content,
            'logo' => $this->getFirstMediaUrl('portfolio'),
            'link' => route('app.portfolios.show', $this),
            'media' => $this->getFirstMediaUrl('uploads'),
            'subtitle' => trans('pages.header.portfolio'),
        ];
    }
}
