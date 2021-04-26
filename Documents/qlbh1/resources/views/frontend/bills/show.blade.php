@extends('frontend.frontend-layout')

@section('content')
    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 style="text-align: center">DANH SÁCH ĐƠN HÀNG</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                        <tr class="main-hading">
                            <th>Mã đơn hàng</th>
                            <th>Sản phẩm</th>
                            <th class="text-center">Ngày mua</th>
                            <th class="text-center">Tổng tiền</th>
                            <th class="text-center">Trạng thái đơn hàng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($carts as $cart)
                            <tr>
                                <td class="product-id text-center" data-title="id">
                                    <a href="{{route('fr.bill.detail',$cart->id)}}">
                                        {{ $cart->id}}
                                    </a>
                                </td>
                                <td class="product-name text-center" data-title="id">
                                    {{$cart->productName()}}
                                </td>
                                <td class="price" data-title="Price">
                                    {{$cart->bill->order_date}}
                                </td>

                                <td class="total-amount" data-title="Total">
                                    {{number_format($cart->totalPaid())}} ₫
                                </td>
                                <td class="status text-center" data-title="status_order">
                                    {!! $cart->bill->status_label !!}
                                </td>
                                @empty
                                    Bạn không có đơn hàng nào!!
                        @endforelse
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
@endsection
