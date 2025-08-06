@extends('Layout')
@section('content')
    @if ($role)
        @section('role-content')
            @if ($role === 'user')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.view') }}">Cart</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.view') }}">Orders</a>
                </li>
            @endif
        @endsection
    @endif

    <div class="container container-custom">
        <div class="row justify-content-center">

            <!-- Products Section -->
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 py-10">
                        <img src="{{ $product->image_path }}" class="card-img-top" alt="Smartphone" />
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <div class="price">${{ $product->price }}</div>
                            <button class="btn btn-add-cart mt-auto" data-id="{{ $product->id }}"
                                {{ $role != 'user' ? 'disabled' : '' }}>
                                Add to Cart
                            </button>
                            @if ($role != 'user')
                                <small class="text-danger mt-2">You must sign in as user to add to cart</small>
                                <a href="{{route('login.index')}}">{{$role == 'admin' ? 'Switch role' : 'login'}}</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // Sending products to cart.
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $(document).on('click', '.btn-add-cart', function() {
            let productId = $(this).data('id');

            $.post('{{ route('cart.add') }}', {
                product_id: productId
            }, function(response) {
                if (response.message) {
                    alert(response.message)
                }
            });
        });
    </script>
@endpush
