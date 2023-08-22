<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::all();

        return view('backend.sizes.index', compact('sizes'));
    }

    public function create()
    {
        return view('backend.sizes.create');
    }

    public function store(SizeRequest $request)
    {
        try{
            Size::create([
                'title' => $request->title,
                'description' => $request->description,
            ]);
            return redirect()->route('size.index')->withMessage('Size Added');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function edit($id)
    {
        $size = Size::find($id);
        return view('backend.sizes.edit', compact('size'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = $request->except('_token');
            Size::where('id',$id)->update($data);
            return redirect()->route('size.index')->withMessage('Size Updated');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }

    }

    public function destroy($id)
    {
        try{
            $size = Size::find($id);
            $size->delete();
            return redirect()->route('size.index')->withMessage('Size Deleted');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function show($id)
    {
        $size = Size::find($id);
        return view('backend.sizes.show',compact('size'));
    }

    public function trashlist()
    {
        $sizes = Size::onlyTrashed()->get();
        return view('backend.sizes.trashlist',['sizes'=>$sizes]);
    }

    public function restore($id)
    {
        Size::withTrashed()->where('id',$id)->restore();
        return redirect()->route('size.index')->withMessage('Size Restore Successfully');
    }

    public function restoreall()
    {
        Size::withTrashed()->restore();
        return redirect()->route('size.index')->withMessage('All Size Restore Successfully');
    }

    public function delete($id)
    {
        Size::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->withMessage('Permanently Deleted');
    }
}
