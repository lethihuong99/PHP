<!-- HEADER -->
@php
    use Illuminate\Support\Facades\Auth;
@endphp
<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-headphone-alt"></i> +84 (222)
                                222-222
                            </li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            @auth
                                <li>
                                    <i class="ti-user"></i> <a
                                        href="#">{{ Auth::user()->name }}</a>
                                </li>
                                <li>
                                    <i class="ti-power-off"></i><a
                                        href="{{ route('fr.auth.logout') }}">Logout</a>
                                </li>
                            @endauth
                            @guest
                                <li>
                                    <i class="ti-power-off"></i><a
                                        href="{{ route('fr.auth.login') }}">Login</a>
                                </li>
                                    <li>
                                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        <a href="{{ route('fr.auth.register') }}">Register</a>
                                    </li>
                            @endguest
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="{{ route('fr.home') }}"><img
                                src="{{asset('uploads/images/banners/pccchn21.png')}}"
                                alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i
                                    class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..."
                                       name="search">
                                <button value="search" type="submit"><i
                                        class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <form role="search" method="GET" id="searchform" action="{{route('fr.searchproduct')}}">
                                <input name="search"
                                       value="{{ request('search') }}"
                                       placeholder="Tìm kiếm sản phẩm....."
                                       type="search">
                                <button class="btnn"><i class="ti-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i
                                    class="fa fa-heart-o"
                                    aria-hidden="true"></i></a>
                        </div>
                        <div class="sinlge-bar shopping">
                            <a href="#" class="single-icon"><i
                                    class="ti-bag"></i> <span
                                    class="total-count">{{ $cart->countProducts() }}</span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>{{$cart->products->count()}} món đồ</span>
                                    <a href="{{ route('fr.cart') }}">Xem giỏ hàng</a>
                                </div>
                                <ul class="shopping-list">
                                    @forelse($cart->products as $product)
                                        <li>
                                                    {{--  <form
                                                action="{{ route('fr.cart.delete_product') }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden"
                                                    name="cart_id"
                                                    value="{{ $cart->id }}">
                                                <input type="hidden"
                                                    name="product_id"
                                                    value="{{ $product->id }}">
                                                <button type="submit"
                                                        class="bg-transparent border-0">
                                                        <i class="fa fa-remove"></i>
                                                </button>
                                            </form>  --}}
                                            <a class="cart-img" href="{{ route('fr.product.show',
                                        ['slug' => $product->slug, 'id' => $product->id]) }}"><img
                                                    src="{{ $product->image_full_path }}"
                                                    alt="#"></a>
                                            <h4>
                                                <a href="{{ route('fr.product.show',
                                        ['slug' => $product->slug, 'id' => $product->id]) }}">{{ $product->name }}</a>
                                            </h4>
                                            <p class="quantity">{{ $product->pivot->quantity }}
                                                - <span class="amount">
                                                  {{ $product->getTotalPrice() }}
                                                </span></p>
                                        </li>
                                    @empty
                                        Không có sản phẩm trong giỏ hàng
                                    @endforelse
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span
                                            class="total-amount">{{ number_format($cart->subTotal()) }} ₫</span>
                                    </div>
                                    <form
                                        action="{{ route('fr.cart.checkout') }}"
                                        method="post">
                                        @csrf
                                        <input type="hidden" name="cart_id"
                                               value="{{ $cart->id }}">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="sinlge-bar">
                            @auth
                                <a href="{{route('fr.bill')}}" class="single-icon" data-toggle="tooltip" data-placement="top" title="Đơn hàng của bạn">
                                    <i class="fa fa-money"></i>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-9 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{ request()->is('/') ? 'active' : '' }}">
                                                <a href="{{route('fr.home')}}">TRANG CHỦ</a>
                                            </li>
                                            <li class="{{ request()->is('category/*') ? 'active' : '' }}"><a href="#">DANH MỤC</a>
                                                <ul class="dropdown">
                                                    @foreach($categories as $category)
                                                        <li>
                                                            <a href="{{ route('fr.category.product', [$category->slug,$category->id]) }}">{{$category->name}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>

                                            <li class="{{ request()->is('post') ? 'active' : '' }}">
                                                <a href="{{ route('fr.post.index') }}">
                                                    BÀI VIẾT
                                                </a>
                                            </li>
                                            <li class="{{ request()->is('about') ? 'active' : '' }}">
                                                <a href="{{ route('fr.about.index') }}">GIỚI THIỆU</a>
                                            </li>

                                            <li class="{{ request()->is('contact') ? 'active' : '' }}">
                                                <a href={{route('fr.contact.index')}}>
                                                    ĐỊA CHỈ</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!--/ End Header -->
<!-- /HEADER -->

