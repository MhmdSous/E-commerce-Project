@extends('frontend.frontend_master')
@section('title')
E-commerce Website | Home Page
@endsection
@section('content')



    <!-- Start Header -->
    <header id="header" class="vh-100 carousel slide" data-bs-ride="carousel" style="padding-top: 104px;">
        <div class="container h-100 d-flex align-items-center carousel-inner">
            <div class="text-center carousel-item">
                <h2 class="text-capitalize text-white">Best collection</h2>
                <h1 class="text-uppercase py-2 fw-bold text-black">New Arrivals</h1>
                <a href="#" class="btn mt-3 text-uppercase rounded-pill btn-primary">Shop Now</a>
            </div>
            <div class="text-center carousel-item active">
                <h2 class="text-capitalize text-white">Best price &amp; Offer</h2>
                <h1 class="text-uppercase py-2 fw-bold text-black">New Season</h1>
                <a href="#" class="btn mt-3 text-uppercase rounded-pill btn-primary">Buy Now</a>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#header" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </header>
    <!-- end Header -->


    <!-- Start Collection -->
    <section class="py-5" id="COLLECTION">
        <div class="container">
            <div class="title text-center">
                <h2 class="position-relative d-inline-block">New Collection</h2>
            </div>
            <div class="row g-0">
                <div class="col-md-6 col-lg-4 col-xl-3 p-2 Best">
                </div>
                <div class="d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                    <button type="button" data-filter="*"
                        class="btn active-filter-btn btn-primary border border-1 m-2 ">All</button>
                    <button type="button" data-filter=".Best" class="btn btn-primary  border border-1 m-2">Best
                        Sellers</button>
                    <button type="button" data-filter=".Faatured"
                        class="btn btn-primary  border border-1 m-2 ">Faatured</button>
                    <button type="button" data-filter=".New" class="btn btn-primary  border border-1 m-2 ">New
                        Arrival</button>
                </div>

                <div class="collection-list  mt-4 row gx-0 gy-3">
                    <div class="col-md-6 border-1 border col-lg-4 col-xl-3 p-2 Best">
                        <div class="collection-img position-relative  overflow-hidden">
                            <img src="{{ asset('frontend/images/c_formal_gray_shirt-removebg-preview.png')}}" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                                <span class="fw-bold d-block">$ 50.00</span>
                                <a href="{{ route('product.details') }}" class="btn btn-primary border border-1 mt-3">Details
                                    Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 Faatured">
                        <div class="collection-img position-relative  overflow-hidden">
                            <img src="{{ asset('frontend/images/c_pant_girl-removebg-preview.png')}}" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                                <span class="fw-bold d-block">$ 50.00</span>
                                <a href="{{ route('product.details') }}" class="btn btn-primary border border-1 mt-3">Details
                                    Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 border-1 border col-lg-4 col-xl-3 p-2 Faatured">
                        <div class="collection-img position-relative  overflow-hidden">
                            <img src="{{ asset('frontend/images/c_polo-shirt-removebg-preview.png')}}" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                                <span class="fw-bold d-block">$ 50.00</span>
                                <a href="{{ route('product.details') }}" class="btn btn-primary border border-1 mt-3">Details
                                    Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 Best">
                        <div class="collection-img position-relative overflow-hidden">
                            <img src="{{ asset('frontend/images/c_shirt-girl-removebg-preview.png')}}" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                                <span class="fw-bold d-block">$ 50.00</span>
                                <a href="{{ route('product.details') }}" class="btn btn-primary border border-1 mt-3">Details
                                    Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 border-1 border col-lg-4 col-xl-3 p-2 New">
                        <div class="collection-img position-relative overflow-hidden">
                            <img src="{{ asset('frontend/images/c_t-shirt_men-removebg-preview.png')}}" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                                <span class="fw-bold d-block">$ 50.00</span>
                                <a href="{{ route('product.details') }}" class="btn btn-primary border border-1 mt-3">Details
                                    Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 Faatured">
                        <div class="collection-img position-relative  overflow-hidden">
                            <img src="{{ asset('frontend/images/c_tunic-shirt_girl-removebg-preview.png')}}" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                                <span class="fw-bold d-block">$ 50.00</span>
                                <a href="{{ route('product.details') }}" class="btn btn-primary border border-1 mt-3">Details
                                    Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 border border-1 col-lg-4 col-xl-3 p-2 Best">
                        <div class="collection-img position-relative  overflow-hidden">
                            <img src="{{ asset('frontend/images/c_undershirt-removebg-preview.png')}}" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                                <span class="fw-bold d-block">$ 50.00</span>
                                <a href="{{ route('product.details') }}" class="btn btn-primary border border-1 mt-3">Details
                                    Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-3 p-2 Best">
                        <div class="collection-img position-relative overflow-hidden">
                            <img src="{{ asset('frontend/images/c_western-shirt-removebg-preview.png')}}" class="w-100">
                            <span
                                class="position-absolute bg-primary text-white d-flex align-items-center justify-content-center">sale</span>
                        </div>
                        <div class="text-center">
                            <div class="rating mt-3">
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                                <span class="text-primary"><i class="fas fa-star"></i></span>
                            </div>
                            <div class="text-center">
                                <p class="text-capitalize mt-3 mb-1">gray shirt</p>
                                <span class="fw-bold d-block">$ 50.00</span>
                                <a href="{{ route('product.details') }}" class="btn btn-primary border border-1 mt-3">Details
                                    Product</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end Collection -->



    <!-- Start Special Selection -->
    <section id="SPECIALS" class="py-5">
        <div class="container">
            <div class="title text-center">
                <h2 class="position-relative py-5 d-inline-block">Special Selection</h2>
            </div>
            <div class="special-list row g-0">
                @foreach ($products as $product)


                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <img src="{{ asset("storage/$product->image")}}" class="w-100">
                        <span
                            class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                            <i class="fas fa-heart"></i>
                        </span>
                    </div>
                    <div class="text-center">
                        <p class="text-capitalize mt-3 mb-1">{{ $product->name }}</p>
                        <span class="fw-bold d-block">{{ $product->price }}</span>
                        <a href="javascript:;" data-url="{{ route('add.to.carts') }}" data-id="{{ $product->id }}" class="btn btn-primary border border-1 mt-3 addCart">Add to Cart</a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Special Selection -->



    <!-- Start Blogs -->
    <section id="offers" class="py-5">
        <div class="container">
            <div
                class="row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
                <div class="offers-content">
                    <span class="text-white">Discount Up To 40%</span>
                    <h2 class="mt-2 mb-4 text-black">Grand Sale Offer!</h2>
                    <a href="#" class="btn btn-primary p-6 mt-3">Buy Now</a>

                </div>
            </div>
        </div>
    </section>
    <!-- end Blogs -->


    <!-- Our Latest Blog -->
    <section id="Partner" class="py-5">
        <div class="container">
            <div class="title text-center py-5">
                <h2 class="position-relative d-inline-block">Our Partner</h2>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="lc-block">
                            <div id="carouselLogos" class="carousel slide pt-5 pb-4" data-bs-ride="carousel">
                                <div class="carousel-inner px-5">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-6 col-lg-2 align-self-center">
                                                <img class="d-block w-100 px-3 mb-3" src="{{ asset('frontend/images/nanoIt.jpg')}}" alt="">
                                            </div>
                                            <div class="col-6 col-lg-2  align-self-center">
                                                <img class="d-block w-100 px-3  mb-3" src="{{ asset('frontend/images/Partner8.jpg')}}" alt="">
                                            </div>
                                            <div class="col-6 col-lg-2  align-self-center">
                                                <img class="d-block w-100 px-3  mb-3" src="{{ asset('frontend/images/Partner9.jpg')}}" alt="">
                                            </div>
                                            <div class="col-6 col-lg-2  align-self-center">
                                                <img class="d-block w-100 px-3  mb-3" src="{{ asset('frontend/images/Partner10.jpg')}}" alt="">
                                            </div>
                                            <div class="col-6 col-lg-2  align-self-center">
                                                <img class="d-block w-100 px-3  mb-3" src="{{ asset('frontend/images/Partner11.jpg')}}" alt="">
                                            </div>
                                            <div class="col-6 col-lg-2  align-self-center">
                                                <img class="d-block w-100 px-3  mb-3" src="{{ asset('frontend/images/Partner12.jpg')}}" alt="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-6 col-lg-2 align-self-center">
                                                <img class="d-block w-100 px-3 mb-3" src="{{ asset('frontend/images/Partner1.jpg')}}" alt="">
                                            </div>
                                            <div class="col-6 col-lg-2  align-self-center">
                                                <img class="d-block w-100 px-3  mb-3" src="{{ asset('frontend/images/Partner2.jpg')}}" alt="">
                                            </div>
                                            <div class="col-6 col-lg-2  align-self-center">
                                                <img class="d-block w-100 px-3  mb-3" src="{{ asset('frontend/images/Partner3.jpg')}}" alt="">
                                            </div>
                                            <div class="col-6 col-lg-2  align-self-center">
                                                <img class="d-block w-100 px-3  mb-3" src="{{ asset('frontend/images/Partner4.jpg')}}" alt="">
                                            </div>
                                            <div class="col-6 col-lg-2  align-self-center">
                                                <img class="d-block w-100 px-3  mb-3" src="{{ asset('frontend/images/Partner5.jpg')}}" alt="">
                                            </div>
                                            <div class="col-6 col-lg-2  align-self-center">
                                                <img class="d-block w-100 px-3  mb-3" src="{{ asset('frontend/images/Partner6.jpg')}}" alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="w-100 px-3 text-center mt-4">
                                    <a class="carousel-control-prev position-relative d-inline me-4"
                                        href="#carouselLogos" data-bs-slide="prev">
                                        <span class="text-dark" aria-hidden="true"><i
                                                class="fa-solid fa-arrow-left"></i></span>
                                        <span class="visually-hidden">Previous</span>
                                    </a>
                                    <a class="carousel-control-next position-relative d-inline" href="#carouselLogos"
                                        data-bs-slide="next">
                                        <span class="text-dark" aria-hidden="true"><i class="fa-solid fa-arrow-right"></i></span>
                                        <span class="visually-hidden">Next</span>
                                    </a>
                                </div>



                            </div>
                        </div><!-- /lc-block -->
                    </div><!-- /col -->
                </div>
            </div>



        </div>
    </section>
    <!-- Our Latest Blog -->


    <!-- Start About Us -->
    <section id="ABOUT_US" class="py-5">
        <div class="container">
            <div class="row gy-lg-5 align-item-center">
                <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                    <div class="title pt-3 pb-4">
                        <h2 class="position-relative py-5 d-inline-block ms-4">About Us</h2>
                    </div>
                    <p class="lead text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis,
                        ipsam.
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem fuga blanditiis, modi
                        exercitationem quae quam eveniet! Minus labore voluptatibus corporis recusandae accusantium
                        velit, nemo, nobis, nulla ullam pariatur totam quos.
                    </p>

                </div>
                <div class="col-lg-6 order-lg-0">
                    <img src="{{ asset('frontend/images/about_us.jpg')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us -->


    <!-- start Popular  -->

    <section id="POPULAR" class="py-5">
        <div class="container">
            <div class="title text-center pt-3 pb-5">
                <h2 class="position-relative d-inline-block">Popular Of This Year</h2>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4 row g-3">
                    <h3 class="fs-5">Top Rated</h3>
                    <div class="d-flex align-items-center justify-content-start">
                        <img src="{{ asset('frontend/images/top_rated_1.jpg')}}" class="img-fluid pe-3 w-25" alt="">
                        <div class="">
                            <p class="mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-start">
                        <img src="{{ asset('frontend/images/top_rated_2.jpg')}}" class="img-fluid pe-3 w-25" alt="">
                        <div class="">
                            <p class="mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-start">
                        <img src="{{ asset('frontend/images/top_rated_3.jpg')}}" class="img-fluid pe-3 w-25" alt="">
                        <div class="">
                            <p class="mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 row g-3">
                    <h3 class="fs-5">Best Selling</h3>
                    <div class="d-flex align-items-center justify-content-start">
                        <img src="{{ asset('frontend/images/best_selling_1.jpg')}}" class="img-fluid pe-3 w-25" alt="">
                        <div class="">
                            <p class="mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-start">
                        <img src="{{ asset('frontend/images/best_selling_2.jpg')}}" class="img-fluid pe-3 w-25" alt="">
                        <div class="">
                            <p class="mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-start">
                        <img src="{{ asset('frontend/images/best_selling_3.jpg')}}" class="img-fluid pe-3 w-25" alt="">
                        <div class="">
                            <p class="mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 row g-3">
                    <h3 class="fs-5">On Sale</h3>
                    <div class="d-flex align-items-center justify-content-start">
                        <img src="{{ asset('frontend/images/on_sale_1.jpg')}}" class="img-fluid pe-3 w-25" alt="">
                        <div class="">
                            <p class="mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-start">
                        <img src="{{ asset('frontend/images/on_sale_2.jpg')}}" class="img-fluid pe-3 w-25" alt="">
                        <div class="">
                            <p class="mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-start">
                        <img src="{{ asset('frontend/images/on_sale_3.jpg')}}" class="img-fluid pe-3 w-25" alt="">
                        <div class="">
                            <p class="mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end Popular  -->


    <!-- start Newsletter  -->
    <section id="newsletter" class="py-5">
        <div class="container">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <div class="title text-center pt-3 pb-5">
                    <h2 class="position-relative d-inline-block ms-4">Newsletter Subscription</h2>
                </div>

                <p class="text-center text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus
                    rem
                    officia accusantium maiores quisquam dolorum?</p>
                <div class="input-group mb-3 mt-3">
                    <input type="text" class="form-control" placeholder="Enter Your Email ...">
                    <button class="btn btn-primary" type="submit">Subscribe</button>
                </div>
            </div>
        </div>
    </section>
    <!-- end Newsletter  -->





    <button onclick="topFunction()" title="Go To Up" id="mybtn"><i class="fa-solid fa-arrow-up"></i> Top</button>

@endsection
