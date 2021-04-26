@extends('frontend.frontend-layout')
@section('title', 'ban hang')
@section('content')
    <!-- Shop Login -->
    <section class="shop login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form">
                        <h2>Đăng kí</h2>
                        <p>Vui lòng đăng kí tài khoản để thanh toán nhanh hơn</p>
                        <!-- Form -->
                        <form class="form"
                              method="post"
                              action="{{ route('fr.auth.register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Tên
                                            <span>*</span>
                                        </label>
                                        <input type="text" name="name"
                                               placeholder=""
                                               required="required"
                                               value="{{old('name')}}">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label> Email <span>*</span></label>
                                        <input type="text" name="email"
                                               placeholder=""
                                               value="{{old('email')}}"
                                               required="required">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>
                                            Mật khẩu
                                            <span>*</span>
                                        </label>
                                        <input type="password" name="password"
                                               placeholder=""
                                               value="{{old('password')}}"
                                               required="required">
                                        @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Xác nhận mật khẩu
                                            <span>*</span>
                                        </label>
                                        <input type="password"
                                               name="password_confirmation"
                                               placeholder=""
                                               required="required">
                                        @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="tel" name="phone"
                                               placeholder=""
                                               value="{{old('phone')}}"
                                               required="required">
                                        @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="status"
                                               class="col-form-label">
                                            Tỉnh/Thành phố <span
                                                class="text-danger">*</span></label>
                                        <select name="province_id"
                                                required
                                                value="{{old('province_id')}}"
                                                class="form-control province-select2-js">
                                        </select>
                                        @error('province_id')
                                        <span
                                            class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="status"
                                               class="col-form-label">Quận/Huyện
                                            <span
                                                class="text-danger">*</span></label>
                                        <select name="district_id"
                                                required
                                                value="{{old('district_id')}}"
                                                class="form-control district-select2-js">
                                        </select>
                                        @error('district_id')
                                        <span
                                            class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="status"
                                               class="col-form-label">Phường/Xã
                                            <span
                                                class="text-danger">*</span></label>
                                        <select name="ward_id"
                                                required
                                                value="{{old('ward_id')}}"
                                                class="form-control ward-select2-js">
                                        </select>
                                        @error('ward_id')
                                        <span
                                            class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="status"
                                               class="col-form-label">
                                            Địa chỉ giao hàng
                                            <span
                                                class="text-danger">*</span></label>
                                        <textarea name="address" id="" cols="10"
                                                  rows="4"></textarea>
                                        @error('address')
                                        <span
                                            class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group login-btn">
                                        <button class="btn" type="submit">
                                            ĐĂNG KÍ
                                        </button>
                                        <a href="{{ route('fr.auth.login') }}"
                                           class="btn">ĐĂNG NHẬP</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Login -->
@endsection
