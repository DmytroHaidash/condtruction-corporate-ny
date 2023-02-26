<?php

namespace App\Models;

use App\Traits\TranslatableTrait;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use TranslatableTrait;

    protected $fillable = [
        'phone',
        'phone_additional',
        'email',
        'facebook',
        'instagram',
        'twitter',
        'linked_in',
        'latitude',
        'longitude',
    ];

    protected $with = [
        'translates',
    ];
}
