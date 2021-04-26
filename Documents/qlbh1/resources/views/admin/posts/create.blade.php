@extends('admin.admin-layout')
@section('content')

    <div class="card">
        <h5 class="card-header">Thêm bài viết</h5>
        <div class="card-body">
            <form method="post" action="{{route('admin.post.store')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="col-form-label">Tiêu đề <span
                            class="text-danger">*</span></label>
                    <input id="title" type="text" name="title"
                           placeholder="Enter title" value="{{ old('title') }}"
                           class="form-control">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="post_category_id" class="col-form-label">Tên danh
                        mục</label>
                    <select name="post_category_id" class="form-control">
                        <option value="">--Select any category--</option>
                        @foreach($postCategories as $key=>$postCategory)
                            <option value="{{$postCategory->id}}"
                                    @if(old('post_category_id') == $postCategory->id) selected @endif
                            >{{$postCategory->title}}</option>
                        @endforeach
                    </select>
                </div>
                @error('post_category_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    <label for="quote" class="col-form-label">Trích dẫn</label>
                    <textarea class="form-control" id="quote"
                              name="quote">{{old('quote')}}</textarea>
                    @error('quote')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="tagIds" class="col-form-label">Tag</label>
                    <select name="tag_ids[]" class="form-control select2-js"
                            id="tagIds"
                            multiple="multiple">
                        @foreach($tags as $key => $tag)
                            <option
                                @if(in_array($tag->id, old('tag_ids', [])))
                                    selected
                                @endif
                                value="{{$tag->id}}">{{$tag->title}}</option>
                        @endforeach
                    </select>
                </div>
                @error('tag_ids')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    <label for="description" class="col-form-label">Mô
                        tả</label>
                    <textarea class="form-control" id="description"
                              name="description">{{ old('description') }}</textarea>
                </div>
                @error('description')
                <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="form-group">
                    <label for="summary"
                           class="col-form-label">Mô tả vắn tắt</label>
                    <textarea class="form-control"
                              id="summary"
                              name="summary">{{ old('summary')}}</textarea>
                    
                </div>
                @error('summary')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="row border p-2">
                    <div class="col">
                        <div class="input-field">
                            <label for="imagePost">Ảnh sản phẩm<span
                                    class="text-danger">*</span></label>
                            <div class="input-images"
                                 type="file"
                                 name="imagePost"
                                 id="imagePost"></div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label">Trạng thái <span
                            class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        @foreach(\App\Model\Post::STATUS as $key => $status)
                            <option value="{{ $key }}"
                                    @if(old('status', \App\Model\Post::ACTIVE) == $key) selected @endif>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Quay lại
                    </button>
                    <button class="btn btn-success" type="submit">Cập nhập
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
@push('stylesheets')
    <link rel="stylesheet"
          href="{{asset('backend/summernote-0.8.18-dist/summernote.min.css')}}">
@endpush
@push('javascripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script
        src="{{asset('backend/summernote-0.8.18-dist/summernote.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.select2-js').select2();
            $('#summary').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 120
            });
        });
        $(document).ready(function () {
            $('#description').summernote({
                placeholder: "Write detail description.....",
                tabsize: 2,
                height: 150
            });
        });
        $('.input-images').imageUploader();
    </script>


@endpush
