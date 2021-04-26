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
                            <th>Giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-center">Giảm giá</th>
                            <th class="text-center">Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cart->products as $product)
                            <tr>
                                <td class="product-id" data-title="id">
                                    {{ $product->name}}
                                </td>
                                <td class="text-center" data-title="id">
                                    {{ $product->pivot->price}} ₫
                                </td>
                                <td class="text-center" data-title="id">
                                    {{ $product->pivot->quantity}}
                                </td>
                                <td class="text-center" data-title="id">
                                    {{ $product->pivot->discount}}%
                                </td>
                                <td class="price" data-title="Price">
                                    {{number_format($cart->subTotal())}} ₫
                                </td>

                            </tr>
                        </tbody>
                        @endforeach
                        <tfoot>
                        <tr>
                            <td colspan="4"><span>Tạm tính</span></td>
                            <td>{{number_format($cart->subTotal())}} ₫</td>
                        </tr>
                        <tr>
                            <td colspan="4"><span>Phí vận chuyển</span></td>
                            <td>{{ number_format($cart->bill->shipping_price) }}
                                ₫
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"><span>Tổng cộng</span></td>
                            <td><span class="sum">{{ number_format($cart->totalPaid()) }} ₫</span>
                            </td>
                        </tr>
                        </tfoot>


                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
@endsection
