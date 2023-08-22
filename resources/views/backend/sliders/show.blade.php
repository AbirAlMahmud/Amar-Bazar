@extends('backend.layouts.master')

@section('main_content')
    <div class="container">
        <div class="card">
            <div class="card-header">Slider Details Informations</div>
            <div class="card-body">
                <p>Title: {{ $slider->title ?? '' }}</p>
                <p>Image:</p>
                <p>
                    @if (file_exists(storage_path() . '/app/public/sliders/' . $slider->image))
                        <img src="{{ asset('storage/sliders/' . $slider->image) }}" height="100">
                    @else
                        iamge nai
                        <!-- <img src="{{ asset('img/default.png') }}"> -->
                    @endif
                </p>
            </div>
            <div class="card-footer m-auto">
                <a class="btn btn-sm btn-primary" href="{{ route('slider.index') }}"><i class="bi bi-list"></i></a>
            </div>
        </div>
    </div>
@endsection
