@extends('Layout')

@section('content')
    <div class="container my-5">
        <h2 class="mb-4">Checkout</h2>

        <div class="row">
            <div class="col-md-5 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush mb-3">

                            @foreach ($cartItems as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $item->product->name }}
                                    <span>${{ number_format($item->product->price, 2) }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <div class="d-flex justify-content-between border-top pt-2 fw-bold">
                            <span>Total:</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Billing & Shipping Info</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('order.add') }}" method="POST">
                            @csrf

                            <input type="hidden" name='total_price' value={{ $total }}></input>
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone number</label>
                                <input type="number" name="phone_number" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="3" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
