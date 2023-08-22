@extends('frontend.frontend_master')
@section('title')
    Details Product
@endsection
@section('content')

    <section class="py-5">
        <div class="container  d-flex justify-content-around px-4 py-5 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-6"><img class="rounded d-block image-intro border border-1 img-fluid"
                        src="{{ asset('frontend/images/c_undershirt-removebg-preview.png') }}" />
                </div>
                <div class="col-md-6 d-flex justify-content-around">
                    <div class="d-flex">
                        <div>
                            <h3 class="display-5 fw-bolder">gray shirt</h3>
                            <div class="fs-5 mb-2">
                                <span class="fw-bold d-block">$ 50.00</span>
                            </div>
                            <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam mollitia
                                porro
                                optio pariatur beatae eum minima repellendus distinctio sequi saepe. Omnis suscipit ut,
                                quia
                                ratione beatae delectus reprehenderit aliquid dolore? </p>

                            <form>
                                <div class="form-group">
                                    <label for="quantity" class="fw-bold">Quantity:</label>
                                    <input type="number" class="form-control input-qun" value="0" id="quantity"
                                        name="quantity" min="1" max="100" >
                                </div>
                            </form>
                            <div class="d-flex">
                                <a href="javascript:;" class="btn btn-det btn-primary border border-1 mt-2 addCart">
                                    <i class="fa fa-shopping-cart icon-hover"></i>
                                    Add to cart
                                </a>
                            </div>
                        </div>
                        <div>
                            <!-- Your content for the second half of the column goes here -->
                            <!-- For example, you can add an image or additional content here -->
                        </div>
                    </div>
                </div>

    </section>

    <div id="carouselExampleDark" class="container carousel carousel-dark slide mt-5">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>

        </div>
        <div class="carousel-inner d-flex justify-content-center">
            <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="container carousel-inner" data-bs-interval="10000">
                    <div class="carousel-item active" data-bs-interval="10000">
                        <div class="row">
                            <div class="col-md-4 pb-2">
                                <img src="{{ asset('frontend/images/c_formal_gray_shirt-removebg-preview.png') }}"
                                    class="border border-1 d-block w-100" alt="...">
                            </div>
                            <div class="col-md-4 pb-2">
                                <img src="{{ asset('frontend/images/c_shirt-girl-removebg-preview.png') }}"
                                    class="border border-1 d-block w-100" alt="...">
                            </div>
                            <div class="col-md-4 pb-2">
                                <img src="{{ asset('frontend/images/c_t-shirt_men-removebg-preview.png') }}"
                                    class="border border-1 d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="10000">
                        <div class="row">
                            <div class="col-md-4 pb-2">
                                <img src="{{ asset('frontend/images/c_shirt-girl-removebg-preview.png') }}"
                                    class="border border-1 d-block w-100" alt="...">
                            </div>
                            <div class="col-md-4 pb-2">
                                <img src="{{ asset('frontend/images/c_undershirt-removebg-preview.png') }}"
                                    class="border border-1 d-block w-100" alt="...">
                            </div>
                            <div class="col-md-4 pb-2">
                                <img src="{{ asset('frontend/images/c_western-shirt-removebg-preview.png') }}"
                                    class="border border-1 d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="10000">
                        <div class="row">
                            <div class="col-md-4 pb-2">
                                <img src="{{ asset('frontend/images/top_rated_1-removebg-preview.png') }}"
                                    class="border border-1 d-block w-100" alt="...">
                            </div>
                            <div class="col-md-4 pb-2">
                                <img src="{{ asset('frontend/images/top_rated_2-removebg-preview.png') }}"
                                    class="border border-1 d-block w-100" alt="...">
                            </div>
                            <div class="col-md-4 pb-2">
                                <img src="{{ asset('frontend/images/top_rated_3-removebg-preview.png') }}"
                                    class="border border-1 d-block w-100" alt="...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <section class="py-5 mt-2">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="title text-center">
                <h2 class="position-relative mb-5 d-inline-block">More Collection</h2>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <div class="card card-more image-details overflow-hidden h-100">
                        <img class="card-img-top"
                            src="{{ asset('frontend/images/c_pant_girl-removebg-preview.png') }}" />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bold">gray shirt</h5>
                                $ 50.00
                            </div>
                        </div>
                        <div class="card pb-5 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a href="add_to_cart.html" class="btn btn-det btn-primary border border-1">
                                    <i class="fa fa-shopping-cart icon-hover"></i>
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card card-more image-details overflow-hidden h-100">
                        <img class="card-img-top"
                            src="{{ asset('frontend/images/c_shirt-girl-removebg-preview.png') }}" />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bold">gray shirt</h5>
                                $ 50.00
                            </div>
                        </div>
                        <div class="card  pb-5 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a href="add_to_cart.html" class="btn btn-det btn-primary border border-1 mt-3">
                                    <i class="fa fa-shopping-cart icon-hover"></i>
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card card-more image-details overflow-hidden h-100">
                        <img class="card-img-top"
                            src="{{ asset('frontend/images/c_tunic-shirt_girl-removebg-preview.png') }}" />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bold">gray shirt</h5>
                                $ 50.00
                            </div>
                        </div>
                        <div class="card  pb-5 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a href="add_to_cart.html" class="btn btn-det  btn-primary border border-1 mt-3">
                                    <i class="fa fa-shopping-cart icon-hover"></i>
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-5">
                    <div class="card card-more image-details overflow-hidden h-100">
                        <img class="card-img-top "
                            src="{{ asset('frontend/images/c_western-shirt-removebg-preview.png') }}" />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bold">gray shirt</h5>
                                $ 50.00
                            </div>
                        </div>
                        <div class="card  pb-5 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a href="add_to_cart.html" class="btn btn-det btn-primary border border-1 mt-3">
                                    <i class="fa fa-shopping-cart icon-hover"></i>
                                    Add to cart
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
<script>

</script>
@endsection
