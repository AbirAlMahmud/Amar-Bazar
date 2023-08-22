<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function dashboard()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('frontend.dashboard', compact('categories', 'products'));
    }

    public function categoryWiseProducts($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $categoryWiseProducts = $category->products;
        return view('frontend.category-wise-products', compact('category', 'categories','categoryWiseProducts'));
    }

    public function productDetails($id)
    {
        $product = Product::find($id);
        return view('frontend.product-details', compact('product'));
    }
}
