<?php

namespace App\View\Components\mine;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;


class Nav extends Component
{
    public $titulo;

    public function __construct($titulo = "Inicio")
    {
        $this->titulo = $titulo;
    }

    public function render()
    {
        return view('components.mine.nav');
    }
}
