@extends('admin.admin-layout')
@section('content')

    <div class="card">
        <h5 class="card-header">Thêm phí ship</h5>
        <div class="card-body">
            <form method="post" action="{{ route('admin.shipping_charge.store') }}">
                @csrf
                <div class="form-group">
                    <label for="status"
                           class="col-form-label">
                        Tỉnh/Thành phố <span class="text-danger">*</span></label>
                    <select name="province_id" class="form-control province-select2-js">
                    </select>
                    @error('province_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Quận/Huyện <span
                            class="text-danger">*</span></label>
                    <select name="district_id" class="form-control district-select2-js">
                    </select>
                    @error('district_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status" class="col-form-label">Phường/Xã <span
                            class="text-danger">*</span></label>
                    <select name="ward_id" class="form-control ward-select2-js">
                    </select>
                    @error('ward_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="summary" class="col-form-label">Giá</label>
                    <input id="fee" type="number" name="fee"
                           placeholder="Enter fee" value="{{old('fee')}}"
                           class="form-control">
                </div>

                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Quay lại
                    </button>
                    <button class="btn btn-success" type="submit">Thêm
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('javascripts')
    <script src="{{asset('js/shipping_charge.js')}}"></script>
@endpush

