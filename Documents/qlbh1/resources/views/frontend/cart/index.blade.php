@extends('frontend.frontend-layout')

@section('content')
    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                        <tr class="main-hading">
                            <th>Sản phẩm</th>
                            <th>Tên</th>
                            <th class="text-center">Giá tiền</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Tổng tiền</th>
                            <th class="text-center"><i
                                    class="ti-trash remove-icon"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($cart->products as $product)
                            <tr>
                                <td class="image" data-title="No">
                                    <a href="{{ route('fr.product.show',
                                        ['slug' => $product->slug, 'id' => $product->id]) }}">
                                        <img
                                            src="{{ $product->image_full_path }}"
                                            alt="#">
                                    </a>

                                </td>
                                <td class="product-des"
                                    data-title="Description">
                                    <p class="product-name"><a
                                            href="#">{{$product->name}}</a></p>
                                </td>
                                <td class="price" data-title="Price">{{-- <span>{{number_format($product->price)}} ₫</span> --}}
                                    <span class="discount">{{ number_format($product->price_after_discount) }} đ</span>
                                 
                                </td>
                                <td class="qty" data-title="Qty">
                                    <!-- Input Order -->
                                    <div class="input-group">
                                        <div class="button minus">
                                            <form
                                                action="{{ route('fr.cart.decrease_product') }}"
                                                method="post">
                                                @csrf
                                                <input type="hidden"
                                                       name="cart_id"
                                                       value="{{ $cart->id }}">
                                                <input type="hidden"
                                                       name="product_id"
                                                       value="{{ $product->id }}">
                                                <button type="submit"
                                                        class="btn btn-primary"
                                                        data-type="minus">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </form>
                                        </div>
                                        <input type="text" name="quant[1]"
                                               class="input-number"
                                               disabled
                                               data-min="1" data-max="100"
                                               value="{{$product->pivot->quantity}}">
                                        <div class="button plus">
                                            <form
                                                action="{{ route('fr.cart.increase_product') }}"
                                                method="post">
                                                @csrf
                                                <input type="hidden"
                                                       name="cart_id"
                                                       value="{{ $cart->id }}">
                                                <input type="hidden"
                                                       name="product_id"
                                                       value="{{ $product->id }}">
                                                <button type="submit"
                                                        class="btn btn-primary"
                                                        data-field="quant[1]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <!--/ End Input Order -->
                                </td>
                                <td class="total-amount" data-title="Total">
                                    <span>{{ number_format($product->getTotalPrice()) }}</span>
                                </td>
                                <td class="action" data-title="Remove">
                                    <form
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
                                            <i class="ti-trash remove-icon"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            Không có sản phẩm trong giỏ hàng
                        @endforelse
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <input type="hidden" name="cart_id"
                           value="{{ $cart->id }}">
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-5 col-12">
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Tạm tính<span>{{ number_format($cart->subTotal()) }} ₫</span>
                                        <li class="last">Thành tiền<span>{{ number_format($cart->subTotal()) }} ₫</span></li>
                                    </ul>
                                    <div class="button5">
                                        <button
                                            type="button"
                                            @if(!$cart->products->count())
                                            disabled
                                            @endif
                                            id="btnCheckout"
                                            class="btn">
                                            Tiến hành đặt hàng
                                        </button>
                                        <a href="{{route('fr.home')}}"
                                           class="btn">Mua thêm sản phâm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
    <input type="hidden" id="cartId" value="{{$cart->id}}">
    @include('frontend.modals.checkout')
    <input type="hidden" value="{{ json_encode($userAddress) }}" id="shippingCharge">
@endsection
@push('javascripts')
    <script>
        $(document).on('click', '#btnCheckout', function (e) {
            e.preventDefault();
            let cartId = $('#cartId').val();
            $('#checkoutForm').append(`<input type="hidden" value="${ cartId }" name="cart_id"/>`)
            $('#checkoutModal').modal('show');
        });
    </script>
@endpush
