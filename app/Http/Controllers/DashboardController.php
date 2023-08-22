<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $totalCategories = Category::count();
        return view('backend.dashboard',compact('totalUsers','totalProducts','totalCategories'));
    }
}
