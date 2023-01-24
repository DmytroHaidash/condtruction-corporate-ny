<?php

namespace App\Traits;

use Cviebrock\EloquentSluggable\Sluggable;

trait SluggableTrait
{
    use Sluggable, TranslatableTrait;

    /**
     * Set key for model
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Configuring sluggable
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'unique_slug',
            ],
        ];
    }

    /**
     * @return string
     */
    public function getUniqueSlugAttribute(): string
    {
        return request('uk.title') ?? request('title');
    }
}
