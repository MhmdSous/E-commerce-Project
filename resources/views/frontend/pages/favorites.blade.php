@extends('frontend.frontend_master')
@section('title')
    Favorites
@endsection
@section('content')
    <section class="h-100 ">
        <div class="container h-100 py-5">
            <div class="border rounded border-1 bg-danger text-white p-2 d-flex justify-content-between mb-4 cartin">

                <h3 class="fw-normal mb-0  pt-5 fs-4">Favorite Items</h3>

                {{-- <div>
                    <p class="mb-0 pt-5"><span class="fs-5">Sort by:</span> <a href="javascript:;"
                            class="text-body text-white text-decoration-none sort">price </a>
                </div> --}}


            </div>
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">
                    @if($favItems->count() == 0)
                    <div class="alert alert-info text-center">
                        <i class="fas fa-shopping-cart fa-4x mb-3"></i>
                        <p class="mb-3">Your favorites list is empty.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Home </a>
                    </div>
                    @else
                    @foreach ($favItems as $item)
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

                                        <input id="form1" min="0" name="quantity" value="0" type="number"
                                            class="form-control form-control-sm" />

                                        <button class="btn btn-link px-2 inc">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <h5 class="mb-0 mt-4">
                                            $ {{ $item->products->price }}

                                            {{-- $@php

                                                            $total = $item->products->price * $item->quantity;
                                                            echo $total;
                                                        @endphp --}}
                                        </h5>
                                    </div>
                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                        <a href="javascript:;" data-id="{{ $item->products->id }}"
                                            data-url="{{ route('favorite.remove', $item->id) }}"
                                            class="text-danger delete-fav-item"><i class="fas fa-trash fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <button type="button" class="btn btn-sub border border-1 btn-primary btn-lg AddtoCart"
                        data-favorite-ids="{{ implode(',', $favItems->pluck('product_id')->toArray()) }}">
                        Add to Cart
                    </button>
                </div>
            </div>

        </div>
        @endif
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.dec').click(function() {
                // when click dec button the price will be decrease
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;

                count = count < 0 ? 0 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.inc').click(function() {
                // i need  when click inc button the price will be increase
                var $input = $(this).parent().find('input');

                $input.val(parseInt($input.val()) + 1);
                $input.change();

                return false;
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Existing code for quantity increase and decrease

            $(document).on('click', '.AddtoCart', function() {
                var user_id = {{ Auth::user()->id }};
                var favorite_ids = $(this).data('favorite-ids').split(',');
                var products = [];


                // Loop through each selected favorite item
                favorite_ids.forEach(function(product_id) {
                    var quantity = $('#form1-' + product_id)
                        .val(); // Get the quantity for each product
                    var price = $('#price-' + product_id).val();
                    // var total = quantity * price;
                    var image = $('#image-' + product_id).val();
                    var name = $('#name-' + product_id).val();

                    products.push({
                        product_id: product_id,
                        quantity: quantity,
                        price: price,
                        // total: total,
                        image: image,
                        name: name
                    });
                });
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // Send the products array to the server for adding to the cart
                $.ajax({
                    url: "{{ url('/add-multiple-to-cart') }}",
                    type: "POST",
                    data: {
                        user_id: user_id,
                        products: products
                    },
                    success: function(res) {
                        toastr.success(res.message);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        toastr.error('An error occurred while adding the products.');
                    }
                });
            });

            $(document).on('click', '.delete-fav-item', function() {
                // delete favorite item
                var product_id = $(this).data('id')
                var _url = "{{ route('favorite.remove', ':product_id') }}";
                $.ajax({
                    url: _url,
                    type: "GET",
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
        });
    </script>
@endsection
