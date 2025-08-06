@extends('Layout')

@section('content')
    @if ($orders->isEmpty())
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <h1 class="fw-bold text-secondary">Your cart is empty</h1>
        </div>
    @else
        <div class="container my-5">
            <h2 class="mb-4">Orders</h2>

            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Client Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>Total Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->client_name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ number_format($order->total_price,2) }}</td>
                                <td style="color:orange; font-weight:bold;">{{ $order->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
