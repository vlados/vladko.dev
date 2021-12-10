<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = [
        "project_name",
        "description",
        "success",
        "technologies",
        "release_date",
        "client_name"
    ];
    protected $casts = [
        "technologies" => "json",
        "release_date" => "date"
    ];

    function setImagesAttribute() {

    }
    function setVideosAttribute() {

    }

    public function registerMediaCollections(): void
    {
        // images
        $this
            ->addMediaCollection('images')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumb')
                    ->format('jpg')
                    ->width(360)
                    ->height(270)
                    ->optimize()
                    ->fit(Manipulations::FIT_CONTAIN, 360, 270)
                    ->crop(Manipulations::CROP_CENTER, 360, 270);

                $this->addMediaConversion('large')
                    ->format('jpg')
                    ->fit(Manipulations::FIT_CONTAIN, 1800, 1350)
                    ->optimize()
                    ->withResponsiveImages();
            });
        // videos
        $this
            ->addMediaCollection('videos')
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('thumb')
                    ->format('jpg')
                    ->width(360)
                    ->height(270)
                    ->extractVideoFrameAtSecond(10)
                    ->optimize()
                    ->fit(Manipulations::FIT_CONTAIN, 360, 270)
                    ->crop(Manipulations::CROP_CENTER, 360, 270);

                $this->addMediaConversion('large')
                    ->format('jpg')
                    ->fit(Manipulations::FIT_CONTAIN, 1800, 1350)
                    ->extractVideoFrameAtSecond(10)
                    ->optimize()
                    ->withResponsiveImages();
            });
    }

}
