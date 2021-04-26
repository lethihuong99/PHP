@extends('admin.admin-layout')
@section('content')
    <div class="card shadow mb-4">


        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="m-0 font-weight-bold text-primary float-left">
                        Danh sách sản phẩm</h4>
                </div>
                <div class="col-md-4">
                    <form method="{{ route('admin.product.search') }}">
                        <div class="input-group">
                            <input type="text"
                                   name="search_keyword"
                                   class="form-control bg-light border small js-keyword-brand"
                                   placeholder="Search for..."
                                   aria-label="Search"
                                   aria-describedby="basic-addon2" name="search" value="">
                            <div class="input-group-append">
                                <button class="btn btn-primary js-search-brand"
                                        type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-4 ">
                    <a href="{{route('admin.product.create')}}"
                       class="d-none d-sm-inline-block btn btn-primary shadow-sm float-right"
                       data-toggle="tooltip"
                       data-placement="bottom" title="Thêm sản phẩm"><i
                            class="fas fa-plus-circle fa-sm text-white-50"></i>
                        Thêm sản phẩm</a>
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
                    <th>ID</th>
                    <th>Mã sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    <th width="40%">Tên sản phẩm</th>
                    <th width="40%">Ảnh sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá sản phẩm</th>
                    <th>Giảm giá</th>
                    <th>Trạng thái</th>
                    <th  >Hành động</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Mã sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Thương hiệu</th>
                    <th width="40%">Tên sản phẩm</th>
                    <th width="40%">Ảnh sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá sản phẩm</th>
                    <th>Giảm giá</th>
                    <th>Trạng thái</th>
                    <th >Hành động</th>
                </tr>
                </tfoot>

                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->product_id}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->brand->name}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                            <img class="img-fluid zoom w-20 "
                                 style="width: 100px"
                                 src="{{asset('uploads/images/products')}}/{{$product->image}}">
                        </td>
                        <td>
                            {{$product->quantity}}
                        </td>
                        <td>{{number_format($product->price).''.'VNĐ'}}</td>
                        <td>{{$product->discount}}% </td>
                        <td>
                            {!! $product->status_label !!}
                        </td>
                        {{-- <td >{!! $product->summary !!}</td> --}}
                        <td>
                            <a class="btn btn-primary btn-sm float-left mr-1"
                               style="height:30px; width:30px;border-radius:50%"
                               data-toggle="tooltip"
                               title="edit"
                               href="{{route('admin.product.edit',$product->id)}}"
                               data-placement="bottom">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form
                                action="{{ route('admin.product.destroy', $product->id) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm dltBtn"
                                        type="submit"
                                        style="height:30px; width:30px;border-radius:50%"
                                        data-toggle="tooltip"
                                        data-placement="bottom"
                                        title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            <span style="float:right">
                {{$products->links() }}
            </span>

        </div>
        </div>

    </div>

@endsection
@push('stylesheets')
    <style>
        .zoom {
            transition: transform .2s; /* Animation */
        }
        .zoom:hover {
            transform: scale(3.2);
        }
    </style>
@endpush
