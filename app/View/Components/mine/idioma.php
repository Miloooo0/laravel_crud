<?php

namespace App\View\Components\mine;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class idioma extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mine.idioma');
    }
}
