<?php

namespace App\View\Components\system;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Service extends Component
{
    public $dat;
    public function __construct($dat)
    {
        $this->dat = $dat;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.system.service');
    }
}
