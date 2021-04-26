@extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Sửa danh mục </h5>
    <div class="card-body">
      <form method="post" action="{{route('admin.category.update',$category->id)}}">
        @csrf
        <div class="form-group">

          <label for="title" class="col-form-label">Tên danh mục<span class="text-danger">*</span></label>
          <input id="title" type="text" name="title"   value="{{$category->name}}" placeholder="Enter title"  value="" class="form-control">
          @error('title')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="description" class="col-form-label">Mô tả</label>
          <textarea class="form-control"  type="text" name="description">
            {!! $category->description !!}
          </textarea>
          @error('description')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>

        <div class="form-group">
          <label for="status" class="col-form-label">Tình trạng<span class="text-danger">*</span></label>
          <select name="status" class="form-control">
            <option value="1" {{$category->status == 1 ? 'selected' : ''}}>Hoạt động</option>
            <option value="0" {{$category->status == 0 ? 'selected' : ''}}>Không hoạt động</option>
          </select>

        </div>
        <input type="hidden" name="hddId" value="{{$category->id}}"/>

           <button class="btn btn-success" type="submit">Cập nhật</button>

      </form>
    </div>
</div>

@endsection
