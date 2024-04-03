<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Blog extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia,HasTranslations;

    protected $translatable=['title','description','content'];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
        // TODO: Implement registerMediaCollections() method.
    }
}
