<div class="single-product">
    <div class="product-img">
        <a href="{{ route('fr.product.show', ['slug' => $product->slug, 'id' => $product->id]) }}">
            <img class="default-img"
                 src="{{asset('uploads/images/products')}}/{{$product->image}}"
                 alt="#">
            <img class="hover-img"
                 src="{{asset('uploads/images/products')}}/{{$product->image}}"
                 alt="#">
        </a>

        <div class="button-head">
            {{-- <div class="product-action">
                <a data-toggle="modal"
                   data-target="#exampleModal"
                   title="Quick View"
                   href="#"><i
                        class=" ti-eye"></i><span>Quick Shop</span></a>
                <a title="Wishlist" href="#"><i
                        class=" ti-heart "></i><span>Add to Wishlist</span></a>
                <a title="Compare" href="#"><i
                        class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
            </div> --}}
            <div class="product-action-2">
                <form
                    action="{{ route('fr.cart.add_product') }}"
                    method="post">
                    @csrf
                    <input type="hidden"
                           value="{{ $product->id }}"
                           name="product_id">
                    <button class="bg-transparent border-0 "
                        title="Add to cart"
                        type="submit">
                        Mua sản phẩm
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="product-content">
        <h3>
            <a href="{{ route('fr.product.show', ['slug' => $product->slug, 'id' => $product->id]) }}">
                {{$product->name}}
            </a>
        </h3>
        <div class="product-price">
         {{--    <span class="old">{{number_format($product->price)}} đ</span> --}}
            @php 
            $after_discount=($product->price-($product->price*$product->discount)/100)
            @endphp
            <span>{{number_format($after_discount)}} đ</span>
            @if($product->discount)
            <s>{{ number_format($product->price) }}
                đ</s>
            @endif 
          {{--   <span class="discount">{{ number_format($product->price_after_discount) }} đ</span>
            @if($product->discount)
                <s>{{ number_format($product->price) }}
                    đ</s>
            @endif --}}
        </div>
    </div>
</div>
@push('stylesheets')
    <style>
    .default-img{
        width:278px;
        height:388px;
        object-fit: contain;
    }
    .hover-img{
        width:278px;
        height:388px;
        object-fit: contain;
    }
    </style>
@endpush
@push('javascripts')
    <script src="{{asset('frontend/js/active.js')}}"></script>
@endpush
