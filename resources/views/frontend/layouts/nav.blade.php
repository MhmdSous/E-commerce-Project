
@php
    $products = \App\Models\Cart::where('user_id', Auth::id())->get();
    $favorites = \App\Models\Favorite::where('user_id', Auth::id())->get();
@endphp

<div class="container">
    <a href="{{ route('home') }}" class="navbar-brand d-flex justify-content-between
    align-item-center order-lg-0">
         <img src="{{ asset('frontend/images/logo.png') }}"alt="">
        <!-- <span class="text-uppercase fw-lighter ms-2">Attire</span>  -->
    </a>

    <div class="order-lg-2" id="cartCount">
        <a href="{{ route('cart.view') }}"  class="btn position-relative" >
            <i class="fa fa-shopping-cart icon-hover"></i>
            <span class="position-absolute top-0 Start-100 translate-middle badge bg-primary">{{ $products->count() }}</span>
        </a>
        <a href="{{ route('favorite.view') }}" class="btn position-relative">
            <i class="fa-solid fa-heart icon-hover"></i>
            <span class="position-absolute top-0 Start-100 translate-middle badge bg-primary">{{ $favorites->count() }}</span>
        </a>
    </div>

    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#nevMenu">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-lg-1 text-center" id="nevMenu">
        <ul class="navbar-nav mx-auto" id='list'>
            <li class="nav-item px-2  py-2 text-dark border-0"><a href="{{ route('home') }}"
                    class="nav-link fw-bold active ">Home</a>
            </li>
            <li class="nav-item px-2  py-2 text-dark border-0"><a href="#COLLECTION"
                    class="nav-link fw-bold">COLLECTION</a></li>
            </li>
            <li class="nav-item px-2  py-2 text-dark border-0"><a href="#Partner" class="nav-link text-uppercase fw-bold">Partner</a>
            </li>
            <li class="nav-item px-2  py-2 text-dark border-0"><a href="#ABOUT_US" class="nav-link fw-bold">ABOUT US</a>
            </li>
            <li class="nav-item px-2  py-2 text-dark  border-0"><a href="#POPULAR" class="nav-link fw-bold ">POPULAR</a>
            </li>
            <li class="nav-item px-2  py-2 text-dark  border-0"><a href="{{ route('contact_us') }}"
                    class="nav-link fw-bold ">Contact Us</a>
            </li>
            <li class="nav-item px-2  py-2 text-dark  border-0"><a href="{{ route('login') }}"
                    class="nav-link fw-bold ">Login</a>
            </li>
        </ul>
    </div>


</div>

