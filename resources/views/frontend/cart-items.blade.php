<x-frontend.master>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h4>Shopping Cart</h4>
                <table class="table table-sm table-bordered">
                    <tr>
                        <th>Ser No</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Total Price</th>
                        <th></th>
                    </tr>
                    @foreach ($cartItems as $cartItem)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cartItem->product_name }}</td>
                        <td>{{ $cartItem->qty }}</td>
                        <td>{{ $cartItem->unit_price }}</td>
                        <td>{{ $cartItem->total_price }}</td>
                        <td><button class="btn btn-sm btn-danger">Cancel Item</button></td>
                    </tr>
                    @endforeach
                </table>
                <button class="btn btn-md btn-success">Order Now</button>
            </div>
        </div>
    </div>
</x-frontend.master>
