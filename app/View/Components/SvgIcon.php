<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SvgIcon extends Component
{
    private string $src;
    private $class;

    public function __construct($type, $name, $class)
    {
        $this->class = $class;
        $this->src = resource_path("icons/fontawesome-pro/svgs/${type}/${name}.svg");
        if (!file_exists($this->src)) {
            throw new \Exception("Could not find svg ${name} (" . $this->src . ')');
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $svg = file_get_contents($this->src);
        $svg = str_replace('<svg', '<svg class="' . $this->class . '"', $svg);

        return $svg;
    }
}
