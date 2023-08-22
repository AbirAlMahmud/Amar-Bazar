<x-frontend.master>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <img class="card-img-top mt-4" src="{{ asset('storage/products/' . $product->image) }}" height="230px"
                    width="100%">
            </div>
            <div class="col-md-9">
                <h4 class="mt-4">{{ $product->title }}</h4>
                <p>{!! $product->description !!}</p>

                <form action="{{ route('cart.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <input type="hidden" name="price" value="{{ $product->price }}">

                    <input type="number" name="qty" class="m-2" placeholder="Quantity">
                    <br>
                    <label>Colors</label><br>
                    <select name="color_id" class="m-2">
                        @foreach ($product->colors as $color)
                        <option value="{{ $color->id }}">{{ $color->title }}</option>
                        @endforeach
                    </select>
                    <br>
                    <button class="btn btn-sm btn-primary m-3">Add to Cart</button>
                </form>

                <div>
                    Customer Reviews
                    <form action="{{ route('comment.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <textarea name="comment" id="" cols="30" rows="4" class="form-control"></textarea>
                        <button class="btn btn-sm btn-outline-success mt-2">Comment</button>
                    </form>
                </div>
                <h6>Customer Comments</h6>
                <hr>
                @foreach ($product->comments as $comment)
                <div class="bg-light">
                    <img src="{{ asset('img/user.webp') }}" height="30px" width="30px"> {{ $comment->user_name }}
                    <p>{{ $comment->comment }}</p>
                    <p class="fw-bold">post on: {{ $comment->created_at->diffForHumans() ?? '' }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-frontend.master>
