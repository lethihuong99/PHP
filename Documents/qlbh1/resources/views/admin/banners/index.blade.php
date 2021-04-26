@extends('admin.admin-layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="m-0 font-weight-bold text-primary float-left">Danh sách banner</h4>
                </div>

                <div class="col-md-4">
                    <div>
                        <form role="search" method="GET" id="searchform" action="{{route('admin.banner.search')}}">
                            <div class="input-group">
                                    <input type="text" class="form-control bg-light border small js-keyword-brand"
                                           placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="search" value="">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary js-search-brand" type="submit" value="">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="col-md-4 ">
                    <a href="{{ route('admin.banner.create') }}"
                       class="d-none d-sm-inline-block btn btn-primary shadow-sm float-right" data-toggle="tooltip"
                       data-placement="bottom" title="Thêm banner"><i
                            class="fas fa-plus-circle fa-sm text-white-50"></i>  Thêm </a>
                </div>
            </div>
        </div>

    @if(session('success'))
            <div class="alert alert-success alert-dismissable fade show">
                <button class="close" data-dismiss="alert" aria-label="Close">
                    ×
                </button>
                {{session('success')}}
            </div>
        @endif


        @if(session('error'))
            <div class="alert alert-danger alert-dismissable fade show">
                <button class="close" data-dismiss="alert" aria-label="Close">
                    ×
                </button>
                {{session('error')}}
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="banner-dataTable"
                       width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th width="50%">Ảnh</th>
                        <th>Trạng th</th>
                        <th width="20%">Hành động</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Ảnh</th>
                        <th>Trạng thái</th>
                        <th>Hoạt động</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($banners as $banner)
                        <tr>
                            <td>{{$banner->id}}</td>
                            <td>{{$banner->title}}</td>
                            <td>
                                <img class="img-fluid zoom img-thumbnail w-20"
                                     style="width:200px"
                                     src="{{asset('uploads/images/banners')}}/{{$banner->photo}}">
                            </td>
                            <td>{!! $banner->status_label !!}</td>
                            <td>
                                <a href="{{route('admin.banner.edit', $banner->id)}}"
                                   class="btn btn-primary btn-sm float-left mr-1"
                                   style="height:30px; width:30px;border-radius:50%"
                                   data-toggle="tooltip" title="edit"
                                   data-placement="bottom"><i
                                        class="fas fa-edit"></i></a>
                                <form
                                    action="{{route('admin.banner.destroy',$banner->id)}}"
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
                   {{ $banners->links() }}
                </div>
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



@push('styles')
    <link
        href="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.css')}}"
        rel="stylesheet">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"/>
    <style>
        div.dataTables_wrapper div.dataTables_paginate {
            display: none;
        }

        .zoom {
            transition: transform .2s; /* Animation */
        }

        .zoom:hover {
            transform: scale(3.2);
        }
    </style>
@endpush

@push('javascripts')

    <!-- Page level plugins -->
    <script
        src="{{asset('backend/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script
        src="{{asset('backend/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('backend/js/demo/datatables-demo.js')}}"></script>
    <script>

        $('#banner-dataTable').DataTable({
            "columnDefs": [
                {
                    "orderable": false,
                    "targets": [3, 4, 5]
                }
            ]
        });

        // Sweet alert

        function deleteData(id) {

        }
    </script>

@endpush
