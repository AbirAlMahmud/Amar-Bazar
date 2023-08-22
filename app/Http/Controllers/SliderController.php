<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.sliders.index', compact('sliders'));
    }

    public function create()
    {
        $sliders = Slider::all();
        return view('backend.sliders.create', compact('sliders'));
    }

    public function store(SliderRequest $request)
    {
        try{
            if($request->hasFile('image')){
                $image = $this->uploadImage($request->image, $request->title);
            }
            Slider::create([
                'title' => $request->title,
                'image' => $image,
            ]);
            return redirect()->route('slider.index')->withMessage('Slider Added');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = $request->except('_token');
            if($request->hasFile('image')){
                $previousImage = Slider::find($id)->image;
                $this->unlink($previousImage);
                $data['image'] = $this->uploadImage($request->image, $request->title);
            }
            Slider::where('id',$id)->update($data);
            return redirect()->route('slider.index')->withMessage('Slider Updated');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try{
            $slider = Slider::find($id);
            $slider->delete();
            return redirect()->route('slider.index')->withMessage('Slider Deleted');
        }catch(Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function show($id)
    {
        $slider = Slider::find($id);
        return view('backend.sliders.show',compact('slider'));
    }

    public function trashlist()
    {
        $sliders = Slider::onlyTrashed()->get();
        return view('backend.sliders.trashlist',['sliders'=>$sliders]);
    }

    public function restore($id)
    {
        Slider::withTrashed()->where('id',$id)->restore();
        return redirect()->route('slider.index')->withMessage('Slider Restore Successfully');
    }

    public function restoreall()
    {
        Slider::withTrashed()->restore();
        return redirect()->route('slider.index')->withMessage('All Slider Restore Successfully');
    }

    public function delete($id)
    {
        Slider::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->back()->withMessage('Permanently Deleted');
    }

    public function uploadImage($file, $title)
    {
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

        $file_name = $timestamp . '-' . $title . '.' . $file->getClientOriginalExtension();

        $pathToUpload = storage_path().'/app/public/sliders/';

        if(!is_dir($pathToUpload)){
            mkdir($pathToUpload, 0755, true);
        }

        Image::make($file)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
    }

    private function unlink($file)
    {
        $pathToUpload = storage_path().'/app/public/sliders/';
        if($file != '' && file_exists($pathToUpload.$file)){
            @unlink($pathToUpload.$file);
        }
    }
}
