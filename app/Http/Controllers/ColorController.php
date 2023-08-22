<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use Exception;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('backend.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('backend.colors.create');
    }

    public function store(ColorRequest $request)
    {
        try{
            Color::create([
                'title' => $request->title,
            ]);
            return redirect()->route('color.index')->withMessage('Color Added');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function edit($id)
    {
        $color = Color::find($id);
        return view('backend.colors.edit', compact('color'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = $request->except('_token');
            Color::where('id',$id)->update($data);
            return redirect()->route('color.index')->withMessage('Color Updated');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function destroy($id)
    {
        try{
            $color = Color::find($id);
            $color->delete();
            return redirect()->route('color.index')->withMessage('Color Deleted');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function show($id)
    {
        $color = Color::find($id);
        return view('backend.colors.show',compact('color'));
    }

    public function trashlist()
    {
        $colors = Color::onlyTrashed()->get();
        return view('backend.colors.trashlist',['colors'=>$colors]);
    }

    public function restore($id)
    {
        Color::withTrashed()->where('id',$id)->restore();
        return redirect()->route('color.index')->withMessage('Color Restore Successfully');
    }

    public function restoreall()
    {
        Color::withTrashed()->restore();
        return redirect()->route('color.index')->withMessage('All Color Restore Successfully');
    }

    public function delete($id)
    {
        Color::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->withMessage('Permanently Deleted');
    }
}
