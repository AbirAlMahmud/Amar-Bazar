@extends('backend.layouts.master')


@section('main_content')
    @include('backend.layouts.includes.message')

    <div class="container">
        <div class="card">
            <div class="card-header">Create Product</div>
            <div class="card-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category_id" onchange="getProduct(this)">
                            <option>Select Category</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->title ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <select id="products">

                        </select>
                    </div>
                    <div>
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control">
                        @error('price')
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
                    <div>
                        <label class="form-label">Description</label>
                        <textarea type="text" name="description" class="form-control" id="ckeditor"></textarea>
                        @error('description')
                            <div class="text-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label class="form-label">Select Colors</label>
                        @foreach ($colors as $color)
                        <input type="checkbox" name="color_id[]" value="{{ $color->id }}">{{ $color->title ?? '' }}
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


    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('ckeditor');

        let productSection = document.getElementById('products');

        function getProduct(obj){
            let catId = obj.value;

            let formattedOptions = '';

            const API = `/api/get-products-with-cat/${catId}`;

            fetch(API)
                .then(res => res.json())
                .then(data => {
                data.products.forEach(product => {
                    formattedOptions += `<option value="${product.id}">${product.title}</option>`;
                });
                productSection.innerHTML = formattedOptions;
            })
        }
    </script>
@endsection
