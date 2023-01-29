<?php

namespace App\Models;

use App\Http\Resources\ImageResource;
use App\Http\Resources\PortfolioResource;
use App\Traits\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Portfolio extends Model implements HasMedia
{
    use SluggableTrait, HasMediaTrait;

    protected $fillable = [
        'slug',
        'video',
    ];

    /**
     * @return MorphMany
     */
    public function meta(): MorphMany
    {
        return $this->morphMany(Meta::class, 'metable');
    }

    /**
     * @return string
     */
    public function getPreviewImageAttribute()
    {
        $media = 'images/no-image.png';

        if ($this->hasMedia('portfolio')) {
            $media = substr($this->getFirstMediaUrl('portfolio', 'preview'), 1);
        }

        return asset($media);
    }

    public function registerMediaCollections()
    {
        $this
            ->addMediaCollection('portfolio')
            ->registerMediaConversions(function (Media $media = null) {
                $this
                    ->addMediaConversion('thumb')
                    ->crop(Manipulations::CROP_CENTER, 100, 100)
                    ->width(100)
                    ->height(100);

                $this
                    ->addMediaConversion('preview')
                    ->crop(Manipulations::CROP_CENTER, 385, 193)
                    ->width(385)
                    ->height(193);
            });
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function getImagesListAttribute()
    {
        return ImageResource::collection($this->getMedia('uploads'));
    }

    public function getPortfolioListAttribute()
    {
        return PortfolioResource::collection($this);
    }

    /**
     * @return string
     */
    public function getVideoImageAttribute()
    {
        return 'https://img.youtube.com/vi/' . get_video_id($this->video) . '/maxresdefault.jpg';
    }

    /**
     * @return mixed
     */
    public function getVideoIdAttribute()
    {
        if ($this->video) {
            preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/",
                $this->video, $matches);
            return $matches[1];
        }
        return $this->image;
    }

    public function getVideoLinkAttribute()
    {
        return 'https://www.youtube.com/embed/' . get_video_id($this->video);
    }
}
