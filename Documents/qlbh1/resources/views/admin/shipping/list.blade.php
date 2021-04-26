@extends('admin.admin-layout')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>

        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="m-0 font-weight-bold text-primary float-left">
                        Danh sách phí ship</h4>
                </div>

                <div class="col-md-4">
                    <form>
                        <div class="input-group">
                            <input type="search" name="search"
                                   class="form-control">
                            <span class="input-group-prepend">
                          <button type="submit" class="btn btn-primary"><i
                                  class="fas fa-search"></i></button>
                      </span>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <a href="{{ route('admin.shipping_charge.create') }}"
                       class="d-none d-sm-inline-block btn btn-primary shadow-sm float-right"><i
                            class="fas fa-plus-circle fa-sm text-white-50"></i>
                        Thêm</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="banner-dataTable"
                       width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tỉnh/Thành phố</th>
                        <th>Quận/Huyện</th>
                        <th>Phường/Xã</th>
                        <th>Giá</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tỉnh/Thành phố</th>
                        <th>Quận/Huyện</th>
                        <th>Phường/Xã</th>
                        <th>Giá</th>
                        <th>Hành động</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($shippingCharges as $shippingCharge)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $shippingCharge->province->name }}</td>
                            <td>{{ $shippingCharge->district->name }}</td>
                            <td>{{ $shippingCharge->ward->name }}</td>
                            <td>
                                {{ number_format($shippingCharge->fee) }} ₫
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm float-left mr-1"
                                   style="height:30px; width:30px;border-radius:50%"
                                   data-toggle="tooltip" title="edit"
                                   href="{{route('admin.shipping_charge.edit', $shippingCharge->id)}}"
                                   data-placement="bottom">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.shipping_charge.destroy', $shippingCharge->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm delete-btn"
                                            type="submit"
                                            style="height:30px; width:30px;border-radius:50%"
                                            data-toggle="tooltip"
                                            data-placement="bottom" title="Delete">
                                        <i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <span style="float:right"></span>
            </div>
        </div>
    </div>
@endsection

