<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PhpParser\Node\Scalar\String_;

class Button extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public String $href , public String $type , public String $label)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return <<<blade
         <a href={$this->href} class="btn btn-{$this->type} text-light">{$this->label}</a>
        blade;
    }
}