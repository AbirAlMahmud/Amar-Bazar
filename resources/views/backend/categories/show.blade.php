@extends('backend.layouts.master')

@section('main_content')
    <div class="container">
        <div class="card">
            <div class="card-header">Category Details Informations</div>
            <div class="card-body">
                <p>Title: {{ $category->title ?? '' }}</p>
                <p>Description: {{ $category->description ?? '' }}</p>
                <p>Products:
                <div class="container">
                    <div class="row">
                        @foreach ($category->products as $product)
                            <div class="col-3">
                                <div class="card text-center">
                                    <div>{{ $product->title ?? '' }}
                                        <p>
                                            @if (file_exists(storage_path() . '/app/public/products/' . $product->image))
                                                <img src="{{ asset('storage/products/' . $product->image) }}" height="100">
                                            @else
                                                iamge nai
                                                <!-- <img src="{{ asset('img/default.png') }}"> -->
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                </p>
            </div>
            <div class="card-footer m-auto">
                <a class="btn btn-sm btn-primary" href="{{ route('category.index') }}"><i class="bi bi-list"></i></a>
            </div>
        </div>
    </div>
@endsection
