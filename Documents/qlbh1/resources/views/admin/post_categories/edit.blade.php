@extends('admin.admin-layout')
@section('content')

    <div class="card">
        <h5 class="card-header">Sửa danh mục </h5>
        <div class="card-body">
            <form method="post"
                  action="{{route('admin.post_category.edit',['postCategory' => $postCategory->id])}}">
                @csrf
                <div class="form-group">
                    <label for="title" class="col-form-label">Title <span
                            class="text-danger">*</span></label>
                    <input id="title" type="text" name="title"
                           value="{{old('title', $postCategory->title)}}"
                           placeholder="Enter title" value=""
                           class="form-control">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="col-form-label">Mo
                        ta</label>
                    <textarea class="form-control"
                              type="text" value=""
                              name="description">{!! old('description', $postCategory->description) !!}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status" class="col-form-label">Status <span
                            class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        @foreach(\App\Model\PostCategory::STATUS as $key => $status)
                            <option value="{{ $key }}"
                                    @if(old('status', $postCategory->status) == $key) selected @endif>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="hddIDCategory"
                       value="{{$postCategory->id}}"/>
                <button class="btn btn-success" type="submit">Cập nhập</button>
            </form>
        </div>
    </div>

@endsection

