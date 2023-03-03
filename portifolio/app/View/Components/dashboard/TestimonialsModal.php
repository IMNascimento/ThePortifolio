<?php

namespace App\View\Components\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TestimonialsModal extends Component
{
    /**
     * Create a new component instance.
     */
    public $portfolio;
    public function __construct($portfolio)
    {
        //
        $this->portfolio = $portfolio;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.testimonials-modal');
    }
}
