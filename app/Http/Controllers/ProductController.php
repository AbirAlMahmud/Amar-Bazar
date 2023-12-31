<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Color;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $this->authorize('product_create');
        $categories = Category::all();
        $colors = Color::all();
        return view('backend.products.create', compact('categories','colors'));
    }

    public function store(ProductRequest $request)
    {
        try{
            if($request->hasFile('image')){
                $image = $this->uploadImage($request->image, $request->title);
            }
            $product = Product::create([
                'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description,
                'image' => $image,
                'category_id' => $request->category_id,
            ]);
            $product->colors()->attach($request->color_id);
            return redirect()->route('product.index')->withMessage('Product Added');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        $this->authorize('product_edit');
        $categories = Category::all();
        $colors = Color::all();
        $product = Product::find($id);
        $selectedColors = $product->colors->pluck('id')->toArray();
        return view('backend.products.edit', compact('product','categories','colors','selectedColors'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = $request->except('_token', 'color_id');
            $product = Product::find($id);
            $product->update($data);
            $product->colors()->sync($request->color_id);
            return redirect()->route('product.index')->withMessage('Product Updated');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try{
            $this->authorize('product_delete');
            $product = Product::find($id);
            $product->delete();
            return redirect()->route('product.index')->withMessage('Product Deleted');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('backend.products.show',compact('product'));
    }

    public function trashlist()
    {
        $products = Product::onlyTrashed()->get();
        return view('backend.products.trashlist',['products'=>$products]);
    }

    public function uploadImage($file, $title)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

        $file_name = $timestamp . '-' . $title . '.' . $file->getClientOriginalExtension();

        $pathToUpload = storage_path().'/app/public/products/';

        if(!is_dir($pathToUpload)){
            mkdir($pathToUpload, 0755, true);
        }

        Image::make($file)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
    }

    public function restore($id)
    {
        Product::withTrashed()->where('id',$id)->restore();
        return redirect()->route('product.index')->withMessage('Product Restore Successfully');
    }

    public function restoreall()
    {
        Product::withTrashed()->restore();
        return redirect()->route('product.index')->withMessage('All Product Restore Successfully');
    }

    public function delete($id)
    {
        Product::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->withMessage('Permanently Deleted');
    }
}
