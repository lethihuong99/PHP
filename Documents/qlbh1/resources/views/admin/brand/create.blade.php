@extends('admin.admin-layout')
@section('content')

    <div class="card cart-container shadow mb-4">
        <!-- Page Heading -->
        <div class="card-header mb-4">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Thêm thương hiệu</h1>
            <a href="{{route('admin.brand.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white-50"></i> Danh sách thương hiệu</a>
        </div>

        </div>
        <!-- Content Row -->
        <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12 col-xl-12 col-md-12 mb-4">
                <form action="{{route('admin.brand.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nameBrand">Tên thương hiệu</label>
                        <input class="form-control" value="{{old('nameBrand')}}" type="text" id="nameBrand" name="nameBrand"
                         />
                        @error('nameBrand')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descBrand">Mô tả</label>
                        <textarea class="form-control" value="{{old('descBrand')}}" id="descBrand" name="descBrand" rows="8"></textarea>
                        @error('descBrand')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit"> Lưu</button>
                    <button type="reset" class="btn btn-warning">Quay lại
                    </button>
                </form>
            </div>
        </div>
        </div>
    </div>



@endsection
