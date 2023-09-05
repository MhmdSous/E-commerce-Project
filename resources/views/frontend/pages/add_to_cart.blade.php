@extends('frontend.frontend_master')
@section('title')
    Add To Cart
@endsection
@section('content')

    <section class="h-100 ">
        <div class="container h-100 py-5">
            <div class="border rounded border-1 bg-danger text-white p-2 d-flex justify-content-between mb-4 cartin">
                <h3 class="fw-normal mb-0  pt-5 fs-4 ">Shopping Cart</h3>
                <div>
                    <p class="mb-0 pt-5"><span class="fs-5">Sort by:</span> <a href="javascript:;"
                            class="text-body text-white text-decoration-none sort">price </a>

                </div>
            </div>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">
                     @if($cartItems->count() == 0)
                     <div class="alert alert-info text-center">
                        <i class="fas fa-shopping-cart fa-4x mb-3"></i>
                        <p class="mb-3">Your shopping cart is empty.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Continue Shopping</a>
                    </div>
                     @else
                    @foreach ($cartItems as $item)
                        <div class="card add-card rounded-3 mb-4">

                            <div class="card-body p-3">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                        <img src="{{ asset('storage/' . $item->products->image) }}" class="img-fluid">
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                        <p class="lead fw-normal pt-2 mb-2">{{ $item->products->name }}</p>
                                        <p><span class="text-muted">Size: </span>M</p>
                                    </div>
                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                        <button class="btn btn-link px-2 dec">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <input
                                            id="quantity-{{ $item->id }}"
                                            min="0"
                                            name="quantity"
                                            value="{{ $item->quantity }}"
                                            type="number"
                                            class="form-control form-control-sm"
                                        />
                                        <button class="btn btn-link px-2 inc">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0 mt-4 total-price">
                                           $ {{ $item->getTotalPrice() }}
                                        </h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="javascript:;" data-id="{{ $item->products->id }}"
                                            class="text-danger delete-cart-item"><i class="fas fa-trash fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <a href="{{ route('checkout') }}" class="btn btn-sub border border-1 btn-primary btn-lg" >Proceed To Checkout</a>
                    <a href="{{ route('cart.history') }}"
                    class="btn btn-sub border border-1 btn-primary btn-lg CartHistory">Cart History </a>
                    @endif



                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
       $(document).ready(function() {
        $('.dec, .inc').click(function() {

            var $input = $(this).parent().find('input');
            var newValue = parseInt($input.val()) + ($(this).hasClass('dec') ? -1 : 1);
            newValue = newValue < 0 ? 0 : newValue;
            $input.val(newValue);
            $input.trigger('change');

            var itemId = $input.attr('id').split('-')[1];
            var newQuantity = newValue;

            $.ajax({
                url: "{{ route('update.cart.quantity') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    item_id: itemId,
                    quantity: newQuantity
                },
                success: function(response) {
                    $('.total-price').html(response.totalPrice);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    </script>
    <script>
        $(document).on('click', '.delete-cart-item', function(e) {

            var product_id = $(this).data('id');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('/delete-cart-item') }}" + '/' + product_id,
                type: "POST",
                data: {
                    product_id: product_id,

                },
                success: function(res) {
                    toastr.success(res.message);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    toastr.error('An error occurred while adding the product.');
                }

            })




        });
    </script>
    <script>
        // cart history
        $('.CartHistory').click(function() {
            $.ajax({
                url: "{{ url('/cart-history') }}",
                type: "GET",
                success: function(res) {
                    toastr.success(res.message);

                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    toastr.error('An error occurred while adding the product.');
                }

            })
        });
    </script>
@endsection
