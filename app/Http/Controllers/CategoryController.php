<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Exception;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('backend.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        try{
            Category::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return redirect()->route('category.index')->withMessage('Category Added');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = $request->except('_token');
            Category::where('id',$id)->update($data);
            return redirect()->route('category.index')->withMessage('Category Updated');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function destroy($id)
    {
        try{
            $category = Category::find($id);
            $category->delete();
            return redirect()->route('category.index')->withMessage('Category Deleted');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('backend.categories.show',compact('category'));
    }

    public function trashlist()
    {
        $categories = Category::onlyTrashed()->get();
        return view('backend.categories.trashlist',['categories'=>$categories]);
    }

    public function restore($id)
    {
        Category::withTrashed()->where('id',$id)->restore();
        return redirect()->route('category.index')->withMessage('Category Restore Successfully');
    }

    public function restoreall()
    {
        Category::withTrashed()->restore();
        return redirect()->route('category.index')->withMessage('All Category Restore Successfully');
    }

    public function delete($id)
    {
        Category::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->withMessage('Permanently Deleted');
    }

    public function categoryWiseProducts($id)
    {
        $products = Product::where('category_id', $id)->get();

        return response()->json([
            'status' => 200,
            'products' => $products,
        ]);
    }

}
