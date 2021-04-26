@extends('admin.admin-layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="m-0 font-weight-bold text-primary float-left">
                        Danh sách đơn hàng đang giao</h4>
                </div>

                <div class="col-md-4">
                    <form>
                        <div class="input-group">

                            <input type="text"
                                   class="form-control bg-light border small js-keyword-brand"
                                   placeholder="Search for..."
                                   aria-label="Search"
                                   aria-describedby="basic-addon2" value="">
                            <div class="input-group-append">
                                <button class="btn btn-primary js-search-brand"
                                        type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!--table-->
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%"
                   cellspacing="0">
                <thead>
                <tr>
                    <th>Mã đặt hàng</th>
                    <th width="10%">Tên khách hàng</th>
                    <th width="10%">Email</th>
                    <th width="10%">Phone</th>
                    <th width="10%">Tạm tính</th>
                  {{--   <th width="10%">Ghi chú</th> --}}
                    <th>Phí ship</th>
                    <th>Tổng tiền</th>
                    <th width="10%">Phương thức thanh toán</th>
                    <th width="10%">Trạng thái</th>
                    <th width="15%">Hành động</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Mã đặt hàng</th>
                    <th width="10%">Tên khách hàng</th>
                    <th width="10%">Email</th>
                    <th width="10%">Phone</th>
                    <th width="10%">Tạm tính</th>
                   {{--  <th width="10%">Ghi chú</th> --}}
                    <th>Phí ship</th>
                    <th>Tổng tiền</th>
                    <th width="10%">Phương thức thanh toán</th>
                    <th width="10%">Trạng thái</th>
                    <th width="15%">Hành động</th>
                </tr>
                </tfoot>
                @forelse($orders as $order)
                    @php
                        $cart = $order->cart;
                    @endphp
                    <tr>
                        <td>
                            <a href="{{ route('admin.order.edit', $order->id) }}">
                                {{ $order->id }}
                            </a>
                        </td>
                        <td>{{ $cart->user->name }}</td>
                        <td>{{ $cart->user->email }}</td>
                        <td>{{ $cart->bill->phone }}</td>
                        <td>{{ number_format($cart->subTotal()) }} ₫</td>
                       {{--  <td></td> --}}
                        <td>{{ number_format($cart->bill->shipping_price) }} ₫</td>
                        <td>{{ number_format($cart->totalPaid()) }} ₫</td>
                        <td>Thanh toán Khi nhận hàng</td>
                        <td>{!! $order->status_label !!}</td>
                        <td class="text-center">
                            <a class="btn btn-primary btn-sm"
                               style="height:30px; width:30px;border-radius:50%"
                               data-toggle="tooltip" title="edit"
                               href="{{ route('admin.order.edit', $order->id) }}"
                               data-placement="bottom"><i
                                    class="fas fa-edit"></i></a>
                        </td>
                        @empty
                            Không tồn tại đơn đặt hàng
                @endforelse
            </table>
            </div>
        </div>

    </div>

@endsection
