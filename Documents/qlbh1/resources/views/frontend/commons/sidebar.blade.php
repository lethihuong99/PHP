<div class="shop-sidebar">
    <!-- Single Widget -->
    <div class="single-widget category">

        <h3 class="title">DANH MỤC SẢN PHẨM</h3>
        @foreach($categories as $category)
            <ul class="categor-list">
                <li>
                    <a href="{{route('fr.category.product',[$category->slug,$category->id])}}}">{{$category->name}}</a>
                </li>
            </ul>
        @endforeach
    </div>
    <div class="single-widget recent-post">
        <h3 class="title">Sản phẩm bán chạy</h3>
        @foreach($bestSellProducts as $product)
        <div class="single-post first">
            <div class="image">
                <img src="{{asset('uploads/images/products')}}/{{$product->image}}"
                     alt="#">
            </div>
            <div class="content">
                <h5><a href="#">{{ $product->name }}</a></h5>
                <p class="price">{{number_format($product->price)}} đ</p>
                <ul class="reviews">
                    <li class="yellow"><i
                            class="ti-star"></i></li>
                    <li class="yellow"><i
                            class="ti-star"></i></li>
                    <li class="yellow"><i
                            class="ti-star"></i></li>
                    <li><i class="ti-star"></i></li>
                    <li><i class="ti-star"></i></li>
                </ul>
            </div>
        </div>
        @endforeach
    </div>
    <div class="single-widget category">
        <h3 class="title">Thương hiệu</h3>
        <ul class="categor-list">
            @foreach($brands as $brand)
                <li>
                    <a href="{{ route('fr.brand.product',['slug' => $brand->slug,'id' => $brand->id]) }}">
                        {{$brand->name}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <!--/ End Single Widget -->
</div>
