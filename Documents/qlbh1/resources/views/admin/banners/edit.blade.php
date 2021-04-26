@extends('admin.admin-layout')
@section('content')

    <div class="card">
        <h5 class="card-header">Sửa Banner</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(!empty($errLogo))
            <div class="alert alert-danger">
                <p>{{$errLogo}}</p>
            </div>
        @endif
        <div class="card-body">
            <form method="post"
                  action="{{route('admin.banner.update', $banner->id)}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="col-form-label">Tên Banner (<span
                            class="text-danger">*</span>)</label>
                    <input id="title" type="text" name="title"
                           placeholder="Enter title" value="{{old("title", $banner->title)}}"
                           class="form-control">
                </div>
                <div class="form-group">
                    <label for="photoBanner">Ảnh Banner</label>
                    <input type="file" id="photoBanner" name="photoBanner"
                           class="form-control"/>
                    <img
                        style="width: 200px"
                        src="{{asset('uploads/images/banners')}}/{{$banner->photo}}"
                        class="img-fluid img-thumbnail">     
                </div>
                @error('photoBanner')
                <span class="text-danger">{{ $message }}</span>
                 @enderror
                <div class="form-group">
                    <label for="description" class="col-form-label">Mô tả</label>
                    <textarea class="form-control" type="text" value="" name="description">{{ old('description', $banner->description) }}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label">Hoạt động(<span class="text-danger">*</span>)</label>
                    <select name="status" class="form-control">
                        @foreach(\App\Model\Banner::STATUS as $key => $status)
                            <option value="{{ $key }}"
                                    @if(old('status', $banner->status) == $key) selected @endif>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Quay lại</button>
                    <button class="btn btn-success" type="submit">Lưu
                    </button>
                </div>
            </form>


        </div>
    </div>

@endsection
