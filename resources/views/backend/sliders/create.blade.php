@extends('backend.layouts.master')


@section('main_content')
    @include('backend.layouts.includes.message')

    <div class="container">
        <div class="card">
            <div class="card-header">Create Slider</div>
            <div class="card-body">
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="bi bi-check"></i> Save</button>
                    <a href="{{ route('slider.index') }}" class="btn btn-sm btn-danger mt-3"><i class="bi bi-x"></i>
                        Cancel</a>
                </form>
            </div>
        </div>
    </div>

@endsection
