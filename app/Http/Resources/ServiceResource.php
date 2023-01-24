<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => remove_tags($this->content->body, 200),
            'media' => $this->getFirstMediaUrl('service'),
            'lang' => app()->getLocale(),
            'createdEn' => $this->created_at->format('M d, Y'),
            'created' => $this->created_at->formatLocalized('%d %B %Y'),
            'link' => route('app.services.show', $this),
        ];

    }
}
