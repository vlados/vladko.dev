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
        if($class) {
            $this->defaultAttributes['class'] = $class;
        }
        if($width) {
            $this->defaultAttributes['width'] = $width;
        }
        if($height) {
            $this->defaultAttributes['$height'] = $height;
        }

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
