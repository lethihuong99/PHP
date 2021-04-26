@extends('admin.admin-layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="m-0 font-weight-bold text-primary float-left">Danh mục Thương hiệu</h4>
                </div>

                <div class="col-md-4">
                    <form role="search" method="GET" id="searchform" action="{{route('admin.brand.search')}}">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border small js-keyword-brand"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="search" value="">
                            <div class="input-group-append">
                                <button class="btn btn-primary js-search-brand" type="submit"  value="">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
                <div class="col-md-4 ">
                    <a href="{{ route('admin.brand.create')}}"
                        class="d-none d-sm-inline-block btn btn-primary shadow-sm float-right" data-toggle="tooltip"
                        data-placement="bottom" title="Thêm thương hiệu"><i
                        class="fas fa-plus-circle fa-sm text-white-50"></i>  Thêm thương hiệu</a>
             </div>
            </div>
        </div>
        <!--table-->

        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <td width="5%">ID</td>
                        <th width="5%">Tên thương hiệu</th>
                        <th width="5%">Mô tả</th>
                        <th width="10%">Tình trạng</th>
                        <th colspan="2" width="10%">Hành động</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td>ID</td>
                        <th> Tên thương hiệu</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                        <th colspan="2" width="10%">Hành động</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($listBrands as $key => $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                <a href="{{ route('admin.brand.edit', ['brand' => $item->id]) }}">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td>{!! $item->description !!}</td>
                            <td>

                                @if($item->status== 1)
                                <span class="badge badge-success">Hoạt động</span>
                                @else
                                <span class="badge badge-warning">Ngừng hoạt động</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('admin.brand.edit', $item->id)}}"
                                   class="btn btn-primary btn-sm float-left mr-1"
                                   style="height:30px; width:30px;border-radius:50%"
                                   data-toggle="tooltip" title="edit"
                                   data-placement="bottom"><i
                                        class="fas fa-edit"></i></a>
                                <form
                                    action="{{route('admin.brand.destroy',$item->id)}}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"
                                            style="height:30px; width:30px;border-radius:50%"
                                            type="submit"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            title="Delete"><i
                                            class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{-- Hien thi phan trang --}}
               {{ $listBrands->links() }}
            </div>

        </div>

    </div>
@endsection
@push('javascripts')
  <script type="text/javascript">
    var urlAjax = "{{ route('admin.brand.destroy',['brand=> $item->id']) }}";

</script>
    <script type="text/javascript" src="{{ asset('backend/js/admin-brands.js') }}"></script>

@endpush
