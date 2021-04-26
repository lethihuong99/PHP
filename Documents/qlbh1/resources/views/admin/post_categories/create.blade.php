@extends('admin.admin-layout')
@section('content')

<div class="card">
  <h5 class="card-header">Thêm danh mục</h5>
  <div class="card-body">
    <form method="post" action="{{ route('admin.post_category.store')}}">
      @csrf
      <div class="form-group">
        <label for="title" class="col-form-label"> Tên danh mục bài viết <span class="text-danger">*</span></label>
        <input id="title" type="text" name="title"   value="{{ old('title') }}" placeholder="Nhập vào tên danh mục"  value="" class="form-control">
        @error('title')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="description" class="col-form-label">Mô tả</label>
        <textarea class="form-control" type="text" value="{{ old('description') }}" name="description"></textarea>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group">
        <label for="status" class="col-form-label"> Trạng thái <span class="text-danger">*</span></label>
        <select name="status" class="form-control">
            @foreach(\App\Model\PostCategory::STATUS as $key => $status)
                <option value="{{ $key }}"
                        @if(old('status',\App\Model\PostCategory::ACTIVE) == $key) selected @endif>
                    {{ $status }}
                </option>
            @endforeach
        </select>
      </div>
      <div class="form-group mb-3">
        <button type="reset" class="btn btn-warning">Quay lại</button>
         <button class="btn btn-success" type="submit">Cập nhập </button>
      </div>
    </form>
  </div>
</div>


@endsection



