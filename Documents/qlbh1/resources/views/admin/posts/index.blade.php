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
                        Danh sách Bài viết </h4>
                </div>

                <div class="col-md-4">
                    <form action="{{ route('admin.post.index') }}" method="get">
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
                    <a href="{{route('admin.post.create')}}"
                       class="d-none d-sm-inline-block btn btn-primary shadow-sm float-right"
                       data-toggle="tooltip"
                       data-placement="bottom" title="Add User"><i
                            class="fas fa-plus"></i> Thêm bài viết</a>
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
                        <th>Tiêu đề</th>
                        <th>Tên danh mục</th>
                        <th>Tagz</th>
                        <th>Ảnh</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                        <th style="width:10%">Hành động</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tiêu đề</th>
                        <th>Tên danh mục</th>
                        <th>Tag</th>
                        <th>Ảnh</th>
                        <th>Mô tả</th>
                        <th>Tình trạng</th>
                        <th>Hành động
                        </th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($posts as $key => $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>
                                {{ optional($post->postCategory)->title }}
                            </td>
                            <td>{!! $post->tag_labels !!}</td>
                            <td>
                                <img class="img-fluid zoom img-thumbnail"
                                     style="width: 250px"
                                     src="{{asset('uploads/images/posts')}}/{{$post->image}}">
                            </td>
                            <td>{!! $post->summary !!}</td>
                            <td>{!! $post->status_label !!}</td>
                            <td>
                                <a class="btn btn-primary btn-sm float-left mr-1"
                                   style="height:30px; width:30px;border-radius:50%"
                                   data-toggle="tooltip" title="edit"
                                   href="{{ route('admin.post.edit', ['post' => $post->id]) }}"
                                   data-placement="bottom">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form
                                    action="{{ route('admin.post.destroy',['post'=>$post->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm"
                                            style="height:30px; width:30px;border-radius:50%"
                                            data-toggle="tooltip"
                                            data-placement="bottom"
                                            type="submit"
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
                    {{$posts->links() }}
                </span>

            </div>
        </div>
    </div>
@endsection

@push('stylesheets')

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
