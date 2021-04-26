@extends('admin.admin-layout')
@section('content')

<div class="card">
    <h5 class="card-header">Thêm tag</h5>
    <div class="card-body">
      <form method="post" action="{{route('admin.tag.store')}}">
        @csrf
        <div class="form-group">
          <label for="title" class="col-form-label"> Tên tag<span class="text-danger">*</span></label>
          <input id="title" type="text" name="title" placeholder="Nhập tên tag"  value="{{ old('title') }}" class="form-control">
        @error('title')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description"
                      value="{{ old('description') }}"
                      name="description" rows="8"></textarea>
        </div>
        @error('description')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="form-group">
          <label for="status" class="col-form-label">
              Tình trạng<span class="text-danger">*</span>
          </label>
          <select name="status" class="form-control">
              @foreach(\App\Model\Tag::STATUS as $key => $status)
                  <option value="{{ $key }}"
                          @if(old('status',App\Model\Tag::ACTIVE) == $key) selected @endif>
                      {{ $status }}
                  </option>
              @endforeach
              
          </select>
          
        </div>
        <div class="form-group mb-3">
          <button type="reset" class="btn btn-warning">Quay lại</button>
           <button class="btn btn-success" type="submit">Cập nhật</button>
        </div>
      </form>
    </div>
</div>

@endsection

