<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Spatie\Image\Manipulations;

class Image extends Component
{
    public $src;
    public $src_webp;
    /**
     * @var array
     */
    public $defaultAttributes = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($class = "", $src = "", $width = null, $height = null)
    {
        $this->src = $src;
        $pathinfo = pathinfo($src);
        if ($class) {
            $this->defaultAttributes['class'] = $class;
        }
        if ($width) {
            $this->defaultAttributes['width'] = $width;
        }
        if ($height) {
            $this->defaultAttributes['height'] = $height;
        }

        $sizedSrcJpg = $pathinfo["filename"] . "-" . $width . "x" . $height . ".jpg";
        $sizedSrcWebP = $pathinfo["filename"] . "-" . $width . "x" . $height . ".webp";
        try {

            if ($width && $height) {
                if (!file_exists(public_path("images/sized/" . $sizedSrcJpg))) {
                    if (!file_exists(public_path("images/sized/"))) {
                        mkdir(public_path("images/sized/"));
                    }
                    $image = new \Spatie\Image\Image(resource_path("images/" . $this->src));
                    $image
                        ->width($width)
                        ->height($height)
                        ->fit(Manipulations::FIT_CONTAIN, $width, $height)
                        ->crop(Manipulations::CROP_CENTER, $width, $height)
                        ->optimize()
                        ->format(Manipulations::FORMAT_JPG);
                    $image->save(public_path("images/sized/" . $sizedSrcJpg));
                    $image = new \Spatie\Image\Image(resource_path("images/" . $this->src));
                    $image
                        ->width($width)
                        ->height($height)
                        ->fit(Manipulations::FIT_CONTAIN, $width, $height)
                        ->crop(Manipulations::CROP_CENTER, $width, $height)
                        ->optimize()
                        ->format(Manipulations::FORMAT_WEBP);
                    $image
                        ->save(public_path("images/sized/" . $sizedSrcWebP));
                }
            } else {
                if (!file_exists(public_path("images/sized/" . $sizedSrcJpg))) {
                    if (!file_exists(public_path("images/sized/"))) {
                        mkdir(public_path("images/sized/"));
                    }
                    $image = new \Spatie\Image\Image(resource_path("images/" . $this->src));
                    $image
                        ->optimize()
                        ->format(Manipulations::FORMAT_JPG);
                    $image
                        ->save(public_path("images/sized/" . $sizedSrcJpg));
                    $image = new \Spatie\Image\Image(resource_path("images/" . $this->src));
                    $image
                        ->optimize()
                        ->format(Manipulations::FORMAT_WEBP);
                    $image
                        ->save(public_path("images/sized/" . $sizedSrcWebP));
                }

            }
        } catch (\Exception $imageException) {
        }
        $this->src = asset("images/sized/" . $sizedSrcJpg);
        $this->src_webp = asset("images/sized/" . $sizedSrcWebP);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.image');
    }
}
