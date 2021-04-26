@extends('admin.admin-layout')
@section('content')
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="row">
            <div class="col-md-12">
                @if(session('success'))
                    <div
                        class="alert alert-success alert-dismissable fade show">
                        <button class="close" data-dismiss="alert"
                                aria-label="Close">×
                        </button>
                        {{session('success')}}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissable fade show">
                        <button class="close" data-dismiss="alert"
                                aria-label="Close">×
                        </button>
                        {{session('error')}}
                    </div>
                @endif
            </div>
        </div>
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-4">
                    <h4 class="m-0 font-weight-bold text-primary float-left">
                        Danh mục bài viết</h4>
                </div>

                <div class="col-md-4">
                    <form action="{{ route('admin.post_category.search') }}" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text"
                                   class="form-control bg-light border small js-keyword-brand"
                                   placeholder="Search for..."
                                   name="search"
                                   aria-label="Search"
                                   aria-describedby="basic-addon2"
                                   value="{{ request('search') }}">
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
                    <a href="{{route('admin.post_category.create')}}"
                       class="d-none d-sm-inline-block btn btn-primary shadow-sm float-right"
                       data-toggle="tooltip"
                       data-placement="bottom" title="Add User"><i
                            class="fas fa-plus"></i> Thêm danh mục </a>
                </div>
            </div>
        </div>

       {{--  <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary float-left">Danh mục
                bài viết </h6>
            <a href="{{route('admin.post_category.create')}}"
               class="btn btn-primary btn-sm float-right" data-toggle="tooltip"
               data-placement="bottom" title="Add User"><i
                    class="fas fa-plus"></i> Thêm danh mục bài viết</a>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="banner-dataTable"
                       width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Mô tả</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($postCategories as $key => $postCategory)
                        <tr>
                            <td>{{$postCategory->id}}</td>
                            <td>
                                {{ $postCategory->title }}
                            </td>
                            <td>
                                {!! $postCategory->description !!}
                            </td>
                            <td>
                                @if($postCategory->status=='1')
                                    <span
                                        class="badge badge-success">Hoạt động</span>
                                @else
                                    <span class="badge badge-warning">Không hoạt động</span>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm float-left mr-1"
                                   style="height:30px; width:30px;border-radius:50%"
                                   data-toggle="tooltip" title="edit"
                                   href="{{route('admin.post_category.edit',['postCategory' => $postCategory->id])}}"
                                   data-placement="bottom">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form
                                    action="{{route('admin.post_category.destroy',['postCategory'=>$postCategory->id])}}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"
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
                    </tbody>
                </table>
                <span style="float:right">
                    {{$postCategories->links() }}
                </span>

            </div>
        </div>
    </div>
@endsection

