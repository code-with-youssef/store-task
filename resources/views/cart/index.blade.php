@extends('Layout')

@section('content')
    @if ($cartItems->isEmpty())
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <h1 class="fw-bold text-secondary">Your cart is empty</h1>
        </div>
    @else
        <div class="container my-5">
            <h2 class="mb-4">Your Cart</h2>


            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>1</td>
                                <td>${{ number_format($item->product->price, 2) }}</td>
                                <td>${{ number_format($item->product->price * 1, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-start mt-3">
                <form method="GET" action="{{ route('cart.checkout') }}">
                    @csrf
                    <button class="btn btn-success btn-lg">Checkout</button>
                </form>
            </div>
        </div>
    @endif

@endsection
