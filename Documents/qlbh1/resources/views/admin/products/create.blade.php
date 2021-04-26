@extends('admin.admin-layout')
@section('content')
    <div class="card">
        <h5 class="card-header">Thêm sản phẩm</h5>
        <div class="card-body">
            <form method="post" action="{{ route('admin.product.store')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="product_id" class="col-form-label">Mã sản phẩm
                        <span class="text-danger">*</span></label>
                    <input id="product_id" type="text"
                           name="product_id"
                           placeholder="Nhập mã sản phẩm"
                           value="{{ old('product_id') }}"
                           class="form-control">
                    @error('product_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name"
                           class="col-form-label">
                        Tên sản phẩm <span class="text-danger">*</span>
                    </label>
                    <input id="name"
                           type="text"
                           name="name"
                           placeholder="Nhập tên sản phẩm"
                           value="{{ old('name') }}"
                           class="form-control">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description"
                           class="col-form-label">Mô tả</label>
                    <textarea class="form-control"
                              id="description"
                              name="description">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="summary"
                           class="col-form-label">Mô tả vắn tắt</label>
                    <textarea class="form-control"
                              id="summary"
                              name="summary">{{ old('summary')}}</textarea>
                    @error('summary')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Tên danh mục <span
                            class="text-danger">*</span></label>
                    <select name="category_id" id="category_id"
                            class="form-control">
                        <option value="">--Lựa chọn danh mục--</option>
                        @foreach($categories as $key => $item)
                            <option value="{{$item->id}}"
                                    @if(old('category_id') == $item->id) selected @endif>
                                {{$item->name}}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price" class="col-form-label">
                        Giá sản phẩm <span class="text-danger">*</span>
                    </label>
                    <input id="price"
                           type="number" name="price"
                           placeholder="Nhập giá sản phẩm"
                           value="{{ old('price') }}"
                           class="form-control">
                    @error('price')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="discount" class="col-form-label">Giảm
                        giá(%)</label>
                    <input id="discount"
                           type="number"
                           name="discount"
                           min="0" max="100"
                           placeholder="Nhập % giảm giá"
                           value="{{ old('discount') }}"
                           class="form-control">
                    @error('discount')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="brand_id">Tên Thương hiệu <span
                            class="text-danger">*</span></label>
                    <select name="brand_id" class="form-control">
                        <option value="">--Lựa chọn thương hiệu--</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}"
                                    @if(old('brand_id') == $brand->id) selected @endif>
                                {{$brand->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng <span
                            class="text-danger">*</span></label>
                    <input id="quantity" type="number"
                           name="quantity"
                           min="0"
                           placeholder="Nhập số lượng sản phẩm"
                           value="{{ old('quantity') }}"
                           class="form-control">
                    @error('quantity')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="row border p-2">
                    <div class="col">
                        <div class="input-field">
                            <label for="image">Ảnh sản phẩm<span
                                    class="text-danger">*</span></label>
                            <div class="input-images"
                                 type="file"
                                 name="image"
                                 id="image"></div>
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="status" class="col-form-label">Tình trạng <span
                            class="text-danger">*</span></label>
                    <select name="status" class="form-control">
                        <option value="1">Hoạt động</option>
                        <option value="0">Không hoạt động</option>
                    </select>

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
        $('.input-images').imageUploader({
            maxFiles: 1
        });
    </script>


@endpush
