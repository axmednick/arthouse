<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia,HasTranslations;

    protected $translatable=['name','description'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile();
        $this->addMediaCollection('images');


        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100)
            ->optimize()
            ->performOnCollections('main', 'images');

    }
    public function getDiscountedPriceAttribute()
    {

        if (auth()->check()) {

            $discountPercent = auth()->user()->discount_percent;


            $discountAmount = $this->price * ($discountPercent / 100);


            return $this->price - $discountAmount;
        } else {

            return $this->price;
        }
    }
}
