


        @extends('user.master')
        @section('content')

        <div class="product">
            <div class="text-center mt-5">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
                <h1>Cart Page</h1>
            </div>
            <div class="container">
                <div class="row">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Product name</th>
                            <th scope="col">Product price</th>
                            <th scope="col">Product Qty</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse($cart as $cart)
                            <tr>
                                <td>{{ $cart->id }}</td>
                                <td>{{ $cart->product_name }}</td>
                                <td>{{ $cart->product_price }}</td>
                                <td>{{ $cart->Qty }}</td>
                                <td><a class="btn btn-danger" href="{{ url('/cart/cancel') . '/' . $cart->id }}">cancel</a></td>

                            </tr>
                            @empty
                        <tr class="text-center">
                            <td colspan="4">No product add</td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                        <div>
                            <a class="btn btn-primary" href="{{ url('/cart/order') . '/' . auth()->user()->id }}">Payment</a>
                        </div>
                </div>
            </div>
        </div>

        @endsection


