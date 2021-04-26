@extends('frontend.frontend-layout')
@section('title', 'PCCC')

@section('content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="index1.html">Trang chủ<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="blog-single.html">Đăng kí</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
<!-- Shop Login -->
		<section class="shop login section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3 col-12">
						<div class="login-form">
							<h2>ĐĂNG NHẬP</h2>
							<p>Vui lòng đăng nhập để mua hàng và thanh toán nhanh hơn</p>
							<!-- Form -->
							<form class="form" method="post"
                                  action="{{ route('fr.auth.login') }}">
                                @csrf
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<label>Email<span>*</span></label>
											<input type="email"
                                                   class="@error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{old('email')}}"
                                                   placeholder=""
                                                   required="required">
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<label>Mật khẩu<span>*</span></label>
											<input type="password"
                                                   name="password"
                                                   class="@error('password') is-invalid @enderror"
                                                   placeholder=""
                                                   value="{{old('password')}}"
                                                   required="required">
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
										</div>
									</div>
									<div class="col-12">
										<div class="form-group login-btn">
											<button class="btn" type="submit">ĐĂNG NHẬP</button>
											<a href="{{ route('fr.auth.register') }}" class="btn">ĐĂNG KÍ</a>
										</div>
										<div class="checkbox d-flex align-items-center">
                                            <input name="remember" id="2"
                                                   class="mr-2"
                                                   type="checkbox"> Lưu mật khẩu
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
