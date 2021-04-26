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
                            <th class="text-center">Giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Tổng tiền</th>
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
                                <td class="price" data-title="Price"><span>{{number_format($product->price)}} ₫</span>
                                </td>
                                <td class="qty text-center" data-title="Qty">
                                    <span>{{$product->pivot->quantity}}</span>
                                </td>
                                <td class="total-amount" data-title="Total">
                                    <span>{{ $product->getTotalPrice() }}</span>
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
                    <form action="{{ route('fr.cart.checkout') }}"
                          method="post">
                        @csrf
                        <input type="hidden" name="cart_id"
                               value="{{ $cart->id }}">
                        <input type="hidden" name="address"
                               value="{{ $fulldAdress }}">
                        <input type="hidden" name="fee"
                               value="{{ $shippingCharge->fee }}">
                        <input type="hidden" name="phone"
                               value="{{ $phone }}">
                        <div class="total-amount">
                            <div class="row">
                                <div class="col-lg-8 col-md-5 col-12">
                                    <div class="left">
                                        <div class="mb-3">
                                            <h6> Địa chỉ giao hàng:</h6>
                                            {{ $fulldAdress }}
                                        </div>
                                        <div>
                                            <h6> Số điện thoại nhận hàng:</h6>
                                            {{ $phone }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-7 col-12">
                                    <div class="right">
                                        <ul>
                                            <li>Tạm tính<span>{{ number_format($cart->subTotal()) }} ₫</span>
                                            </li>
                                            <li>Phí vận chuyển<span>{{ number_format($shippingCharge->fee) }} ₫</span></li>
                                            <li class="last">Thành tiền:
                                                <span>{{ $cart->amountAfterFee($shippingCharge->fee) }} ₫</span>
                                            </li>
                                        </ul>
                                        <div class="button5">
                                            <button
                                                type="submit"
                                                @if(!$cart->products->count())
                                                disabled
                                                @endif
                                                class="btn">
                                                Xác nhận
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
    <input type="hidden" id="cartId" value="{{$cart->id}}">
@endsection
@push('javascripts')
    <script src="{{asset('js/shipping_charge.js')}}"></script>
    <script>
        $(document).on('click', '#btnCheckout', function (e) {
            e.preventDefault();
            let cartId = $('#cartId').val();
            console.log('car', cartId);
            $('#checkoutForm').append(`<input type="hidden" value="${ cartId }" name="cart_id"/>`)
            $('#checkoutModal').modal('show');
        });
    </script>
@endpush
