<style>
    table thead th, table tbody td {
        width: 100px;
        text-align: right;
    }
    table tfoot td {
        text-align: right
    }
</style>
@php
    $cart = $bill->cart;
@endphp
@if($bill->isDelivery())
    <h1>Đơn hàng của bạn bắt đầu được vận chuyển</h1>
@elseif($bill->isDone())
    <h1>Cảm ơn bạn đã mua hàng tại cửa hàng</h1>
@endif
<div class="card order">
    <h4 class="card-header">Chi tiết đơn hàng</h4>
    <div class="card-body">
        <div class="form-group">
            <h5 class="mb-2">
                Khách hàng: <span>{{ $cart->user->name }}</span>
            </h5>
            <h5 class="d-block mb-2">
                Địa chỉ giao hàng:
                <span>{{ $bill->shipping_address }}</span>
            </h5>
            <h5 class="d-block mb-2">
                Số điện thoại nhận hàng:
                <span>{{ $bill->phone }}</span>
            </h5>
            <h5 class="d-block mb-2">
                Ngày mua:
                <span>{{ $bill->created_at->format('d/m/Y') }}</span>
            </h5>
        </div>
        <div class="form-group">
            <table class="table shopping-summery">
                <thead>
                <tr class="main-hading">
                    <th>Ảnh</th>
                    <th class="text-center">Tên</th>
                    <th class="text-center">Đơn giá</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Giảm giá</th>
                    <th class="text-right">Tổng tiền</th>
                </tr>
                </thead>
                <tbody>
                @forelse($bill->cart->products as $product)
                    <tr>
                        <td class="image" data-title="No">
                            <a href="{{ route('fr.product.show',
                                        ['slug' => $product->slug, 'id' => $product->id]) }}">
                                <img style="width: 75px"
                                     src="{{ $product->image_full_path }}"
                                     alt="#">
                            </a>

                        </td>
                        <td class="product-des text-center"
                            data-title="Description">
                            <p class="product-name"><a
                                    href="#">{{$product->name}}</a></p>
                        </td>
                        <td class="price text-center"
                            data-title="Price">
                            <span>{{$product->price}} ₫</span>
                        </td>
                        <td class="qty text-center" data-title="Qty">
                            {{$product->pivot->quantity}}
                        </td>
                        <td class="qty text-center" data-title="Qty">
                            <span>{{ number_format($product->getTotalDiscount()) }} ₫</span>
                        </td>
                        <td class="total-amount text-right"
                            data-title="Total">
                            <span>{{ number_format($product->getTotalPrice()) }} đ</span>
                        </td>
                    </tr>
                @empty
                    Không có sản phẩm trong giỏ hàng
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6">
                        Tạm tính {{ number_format($cart->subTotal()) }} ₫
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        Phí giao hàng
                        @if($cart->bill->shipping_price)
                            {{ number_format($cart->bill->shipping_price) }} ₫
                        @else
                            Free
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        Thanh toán {{ number_format($cart->totalPaid()) }} ₫
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

