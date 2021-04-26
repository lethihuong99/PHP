<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShippingChargeRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateShippingChargeRequest;
use App\ShippingCharge;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ShippingChargeController extends Controller
{
    public function index()
    {
        return view('admin.shipping.list', ['shippingCharges' => ShippingCharge::all()]);
    }

    public function create()
    {
        return view('admin.shipping.create');
    }

    public function store(StoreShippingChargeRequest $request)
    {
        ShippingCharge::create(request()->all());
        Alert::success('Thành công!!');
        return redirect()->route('admin.shipping_charge.index');
    }

    public function edit(Request $request, ShippingCharge $shippingCharge)
    {
        $shippingCharge->load('province', 'district', 'ward');
        return view('admin.shipping.edit', ['shippingCharge' => $shippingCharge]);
    }

    public function update(UpdateShippingChargeRequest $request, ShippingCharge $shippingCharge)
    {
        $shippingCharge->update(request()->all());
        Alert::success('Thành công!!');
        return redirect()->route('admin.shipping_charge.index');
    }

    public function destroy(Request $request, ShippingCharge $shippingCharge)
    {
        $shippingCharge->delete();
        Alert::success('Thành công!!');
        return redirect()->route('admin.shipping_charge.index');
    }
}
