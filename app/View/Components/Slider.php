<?php

namespace App\View\Components;

use Closure;
use App\Models\Slider as SliderModel;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Slider extends Component
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
        $sliders = SliderModel::all();
        return view('components.slider',compact('sliders'));
    }
}
