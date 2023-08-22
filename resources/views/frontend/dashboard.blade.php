<x-frontend.master>

    <div class="row">
        <div class="col-md-4">
            <h4>Category List</h4>
            <ul class="list-group">
                @foreach ($categories as $category)
                    <li class="list-group-item" aria-disabled="true">{{ $category->title }}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-8">
            <x-slider></x-slider>
        </div>
    </div>

    <hr>

    <div class="container">
        <div class="row">
            <h4 class="text-center">Featured Category</h4>
            <p class="text-center">Get Your Desired Product From Featured Category!</p>
        </div>

        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-3">
                    <a href="{{ route('category_wise.products', $category->id) }}">
                        <div class="card m-3 product-card">
                            <div class="card-body">
                                <h6 class="text-center">{{ $category->title }}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="row">
            <h4 class="text-center">Featured Product</h4>
            <p class="text-center">All Products</p>
        </div>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4 product-card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('storage/products/' . $product->image) }}"
                            height="230px" width="100%">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->title }}</h5>
                            <p class="card-text">{!! $product->description !!}</p>
                            <p>Price: <del>{{ $product->price }}</del> {{ $product->price }} BDT</p>
                            <a href="{{ route('product.details', $product->id) }}" class="btn btn-primary">Details</a>
                            <a href="#" class="btn btn-success">Add Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="bg-dark p-5">
        <h4 class="text-white text-center">This is Footer</h4>
    </div>

    <style>
        body {
            background-color: rgb(243, 234, 234);
        }

        .product-card:hover {
            box-shadow: -1px 1px 8px 0px rgba(83, 77, 77, 0.75);
            cursor: pointer;
        }
    </style>

</x-frontend.master>
