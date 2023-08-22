<?php

namespace App\View\Components;

use Closure;
use App\Models\Cart;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Category as CategoryModel;

class Navbar extends Component
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
        $categories = CategoryModel::all();
        $totalCartItems = 0;
        if(auth()->user()){
            $totalCartItems = Cart::where('customer_id', auth()->user()->id)->count();
        }
        return view('components.navbar', compact('categories','totalCartItems'));
    }
}
