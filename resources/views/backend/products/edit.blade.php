@extends('backend.layouts.master')

@section('main_content')
    @include('backend.layouts.includes.message')


    <div class="container">
        <div class="card">
            <div class="card-header">Edit Product</div>
            <div class="card-body">
                <form action="{{ route('product.update', $product->id) }}" method="POST">
                    @csrf
                    <div>
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category_id">
                            <option>Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" checked>{{ $category->title ?? '' }}</option>
                            @endforeach
                            @error('category_id')
                                <div class="text-danger mt-3">{{ $message }}</div>
                            @enderror
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $product->title }}">
                        @error('title')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" value="{{ $product->price }}">
                        @error('price')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label class="form-label">Select Colors</label>
                        @foreach ($colors as $color)
                            <input type="checkbox" name="color_id[]" value="{{ $color->id }}"
                                {{ in_array($color->id, $selectedColors) ? 'checked' : '' }}>{{ $color->title ?? '' }}
                        @endforeach
                        @error('color_id[]')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mt-3"><i class="bi bi-check"></i> Save</button>
                    <a href="{{ route('product.index') }}" class="btn btn-sm btn-danger mt-3"><i class="bi bi-x"></i>
                        Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
