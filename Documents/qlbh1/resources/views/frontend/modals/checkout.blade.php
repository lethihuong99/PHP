<div class="modal fade checkout-modal" id="checkoutModal" tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('fr.cart.overview_bill') }}"
                  id="checkoutForm"
                  method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin thanh toán</h5>
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="status"
                               class="col-form-label">
                            Tỉnh/Thành phố <span
                                class="text-danger">*</span></label>
                        <select name="province_id"
                                required
                                class="form-control province-select2-js">
                        </select>
                        @error('province_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-form-label">Quận/Huyện
                            <span
                                class="text-danger">*</span></label>
                        <select name="district_id"
                                required
                                class="form-control district-select2-js">
                        </select>
                        @error('district_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-form-label">Phường/Xã
                            <span
                                class="text-danger">*</span></label>
                        <select name="ward_id"
                                required
                                class="form-control ward-select2-js">
                        </select>
                        @error('ward_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group d-inline">
                        <label for="summary" class="col-form-label">Địa
                            chỉ</label>
                        <textarea required name="address" id="" cols="15"
                                  rows="5">{{ $userAddress->address }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-form-label">Phí giao
                            hàng</label>
                        <input type="text" disabled id="fee"
                               class="form-control"
                               value="{{ number_format(optional($shippingCharge)->fee) }} vnđ"
                               name="fee">
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-form-label">Số điện thoại nhận hàng</label>
                        <input type="tel" required id="phone"
                               value="{{ $userAddress->phone }}"
                               class="form-control"
                               name="phone">
                    </div>

                    <div class="form-group">
                        <label for="status" class="col-form-label">
                            <strong>
                                Chọn hình thức thanh toán
                            </strong>
                        </label>
                        <div class="d-flex align-items-center">
                            <input type="radio"
                                   required
                                   checked
                                   value="{{ \App\Model\PaymentType::DIRECT }}"
                                   name="payment_type">
                            <i class="fa fa-money fa-2x mx-2"
                               aria-hidden="true"></i>
                            <span
                                class="ml-2">Thanh toán tiền mặt khi nhận hàng</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Đóng
                    </button>
                    <button type="submit" class="btn btn-primary btnCheckout">
                        Thanh Toán
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
