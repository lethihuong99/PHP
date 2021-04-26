@extends('frontend.frontend-layout')
@section('title', 'ban hang')
@section('content')

    <!-- Product Style -->
    <!-- Breadcrumbs -->
    <div class="row">
        <div class="col-12">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="bread-inner">
                                <ul class="bread-list">
                                    <li>
                                        <a href="{{ route('fr.home') }}">
                                            Trang chủ<i
                                                class="ti-arrow-right"></i>
                                        </a>
                                    </li>
                                    <li class="active">
                                        <a href="{{ route('fr.product.show', ['slug' => $product->slug, 'id' => $product->id]) }}">
                                            {{ $product->name }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumbs -->

            <!-- Shop Single -->
            <section class="shop single section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="product-gallery">
                                        <div class="flexslider-thumbnails">
                                            <ul class="slides">
                                                <li data-thumb="images/bx-slider1.jpg"
                                                    rel="adjustX:10, adjustY:">
                                                    <img class="hover-img"
                                                         src="{{ asset('/uploads/images/products/' . $product->image) }}"
                                                         alt="#">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="product-des">
                                        <div class="short">
                                            <h4>{{ $product->name }}</h4>
                                            <p>{!!$product->summary !!}</p>
                                            <p class="price">
                                                <span class="discount">{{ number_format($product->price_after_discount) }} đ</span>
                                                @if($product->discount)
                                                    <s>{{ number_format($product->price) }}
                                                        đ</s>
                                                @endif
                                            </p>

                                        </div>
                                        <div class="product-buy">
                                            <form class="d-fl"
                                                  action="{{ route('fr.cart.add_product') }}"
                                                  method="post">
                                                @csrf
                                                
                                                <div class="input-group">
                                                    <h5>Số lượng :</h5>
                                                    <!-- Input Order -->
                                                    <div class=" input-number ">
                                                         <input type="number"
                                                               name="quantity"
                                                               data-min="1"
                                                               data-max="1000"
                                                               value="1">
                                                    </div>
                                                    <!--/ End Input Order -->
                                                </div>
                                            
                                                <div class=" d-flex">
                                                    <input type="hidden"
                                                           value="{{ $product->id }}"
                                                           name="product_id">
                                                    <button type="submit"
                                                            class=" add-to-cart btn">
                                                        Chọn mua
                                                    </button>
                                                    
                                                </div>
                                            </form>
                                            <p class="cat">Danh
                                                mục: {{ $product->category->name}}</p>
                                            <p class="availability">Số sản phẩm
                                                còn lại:
                                                {{ $product->quantity }}</p>
                                        </div>
                                        <!--/ End Product Buy -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="product-info">
                                        <div class="nav-main">
                                            <!-- Tab Nav -->
                                            <ul class="nav nav-tabs" id="myTab"
                                                role="tablist">
                                                <li class="nav-item"><a
                                                        class="nav-link active"
                                                        data-toggle="tab"
                                                        href="#description"
                                                        role="tab">Mô tả</a>
                                                </li>
                                                <li class="nav-item"><a
                                                        class="nav-link"
                                                        data-toggle="tab"
                                                        href="#reviews"
                                                        role="tab">Reviews</a>
                                                </li>
                                            </ul>
                                            <!--/ End Tab Nav -->
                                        </div>
                                        <div class="tab-content"
                                             id="myTabContent">
                                            <!-- Description Tab -->
                                            <div
                                                class="tab-pane fade show active"
                                                id="description"
                                                role="tabpanel">
                                                <div class="tab-single">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div
                                                                class="single-des">
                                                                <p>{!! $product->description !!}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ End Description Tab -->
{{--                                              <!-- Reviews Tab -->
                                            <div class="tab-pane fade"
                                                 id="reviews" role="tabpanel">
                                                <div
                                                    class="tab-single review-panel">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div
                                                                class="ratting-main">
                                                                <div
                                                                    class="avg-ratting">
                                                                    <h4>4.5
                                                                        <span>(Overall)</span>
                                                                    </h4>
                                                                    <span>Based on 1 Comments</span>
                                                                </div>
                                                                <!-- Single Rating -->
                                                                <div
                                                                    class="single-rating">
                                                                    <div
                                                                        class="rating-author">
                                                                        <img
                                                                            src="images/comments1.jpg"
                                                                            alt="#">
                                                                    </div>
                                                                    <div
                                                                        class="rating-des">
                                                                        <h6>
                                                                            Naimur
                                                                            Rahman</h6>
                                                                        <div
                                                                            class="ratings">
                                                                            <ul class="rating">
                                                                                <li>
                                                                                    <i class="fa fa-star"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i class="fa fa-star"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i class="fa fa-star"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i class="fa fa-star-half-o"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i class="fa fa-star-o"></i>
                                                                                </li>
                                                                            </ul>
                                                                            <div
                                                                                class="rate-count">
                                                                                (<span>3.5</span>)
                                                                            </div>
                                                                        </div>
                                                                        <p>Duis
                                                                            tincidunt
                                                                            mauris
                                                                            ac
                                                                            aliquet
                                                                            congue.
                                                                            Donec
                                                                            vestibulum
                                                                            consequat
                                                                            cursus.
                                                                            Aliquam
                                                                            pellentesque
                                                                            nulla
                                                                            dolor,
                                                                            in
                                                                            imperdiet.</p>
                                                                    </div>
                                                                </div>
                                                                <!--/ End Single Rating -->
                                                                <!-- Single Rating -->
                                                                <div
                                                                    class="single-rating">
                                                                    <div
                                                                        class="rating-author">
                                                                        <img
                                                                            src="images/comments2.jpg"
                                                                            alt="#">
                                                                    </div>
                                                                    <div
                                                                        class="rating-des">
                                                                        <h6>
                                                                            Advin
                                                                            Geri</h6>
                                                                        <div
                                                                            class="ratings">
                                                                            <ul class="rating">
                                                                                <li>
                                                                                    <i class="fa fa-star"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i class="fa fa-star"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i class="fa fa-star"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i class="fa fa-star"></i>
                                                                                </li>
                                                                                <li>
                                                                                    <i class="fa fa-star"></i>
                                                                                </li>
                                                                            </ul>
                                                                            <div
                                                                                class="rate-count">
                                                                                (<span>5.0</span>)
                                                                            </div>
                                                                        </div>
                                                                        <p>Duis
                                                                            tincidunt
                                                                            mauris
                                                                            ac
                                                                            aliquet
                                                                            congue.
                                                                            Donec
                                                                            vestibulum
                                                                            consequat
                                                                            cursus.
                                                                            Aliquam
                                                                            pellentesque
                                                                            nulla
                                                                            dolor,
                                                                            in
                                                                            imperdiet.</p>
                                                                    </div>
                                                                </div>
                                                                <!--/ End Single Rating -->
                                                            </div>
                                                            <!-- Review -->
                                                            <div
                                                                class="comment-review">
                                                                <div
                                                                    class="add-review">
                                                                    <h5>Add A
                                                                        Review</h5>
                                                                    <p>Your
                                                                        email
                                                                        address
                                                                        will not
                                                                        be
                                                                        published.
                                                                        Required
                                                                        fields
                                                                        are
                                                                        marked</p>
                                                                </div>
                                                                <h4>Your
                                                                    Rating</h4>
                                                                <div
                                                                    class="review-inner">
                                                                    <div
                                                                        class="ratings">
                                                                        <ul class="rating">
                                                                            <li>
                                                                                <i class="fa fa-star"></i>
                                                                            </li>
                                                                            <li>
                                                                                <i class="fa fa-star"></i>
                                                                            </li>
                                                                            <li>
                                                                                <i class="fa fa-star"></i>
                                                                            </li>
                                                                            <li>
                                                                                <i class="fa fa-star"></i>
                                                                            </li>
                                                                            <li>
                                                                                <i class="fa fa-star"></i>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/ End Review -->
                                                            <!-- Form -->
                                                            <form class="form"
                                                                  method="post"
                                                                  action="mail/mail.php">
                                                                <div
                                                                    class="row">
                                                                    <div
                                                                        class="col-lg-6 col-12">
                                                                        <div
                                                                            class="form-group">
                                                                            <label>Your
                                                                                Name<span>*</span></label>
                                                                            <input
                                                                                type="text"
                                                                                name="name"
                                                                                required="required"
                                                                                placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-6 col-12">
                                                                        <div
                                                                            class="form-group">
                                                                            <label>Your
                                                                                Email<span>*</span></label>
                                                                            <input
                                                                                type="email"
                                                                                name="email"
                                                                                required="required"
                                                                                placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-12 col-12">
                                                                        <div
                                                                            class="form-group">
                                                                            <label>Write
                                                                                a
                                                                                review<span>*</span></label>
                                                                            <textarea
                                                                                name="message"
                                                                                rows="6"
                                                                                placeholder=""></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-12 col-12">
                                                                        <div
                                                                            class="form-group button5">
                                                                            <button
                                                                                type="submit"
                                                                                class="btn">
                                                                                Submit
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <!--/ End Form -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/ End Reviews Tab -->  --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/ End Shop Single -->

            @include('frontend.products.components.related-products', ['relatedProducts' => $relatedProducts])
        </div>
    </div>
@endsection

@push('stylesheets')
    <style>
        .input-number {
            margin-left:10px ;
        }
         .add-to-cart{
            margin-top:10px;
            display: block;
         }
          
    </style>
@endpush