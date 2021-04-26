<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Bill;
use App\Model\Cart;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Bill::with('cart')
            ->orderBy('status')
            ->latest()
            ->get();
        return view('admin.order.list', ['orders' => $orders]);
    }

    public function getNewOrders()
    {
        $orders = Bill::with('cart')
            ->where('status', Bill::NEW)
            ->orderBy('updated_at', 'desc')
            ->latest()
            ->get();
        return view('admin.order.new', ['orders' => $orders]);
    }

    public function getDeliveryOrders()
    {
        $orders = Bill::with('cart')
            ->where('status', Bill::DELIVERY)
            ->orderBy('updated_at', 'desc')
            ->latest()
            ->get();
        return view('admin.order.delivery', ['orders' => $orders]);
    }

    public function getDoneOrders()
    {
        $orders = Bill::with('cart')
            ->where('status', Bill::DONE)
            ->orderBy('updated_at', 'desc')
            ->latest()
            ->get();
        return view('admin.order.done', ['orders' => $orders]);
    }

    public function edit(Request $request, Bill $bill)
    {
        return view('admin.order.edit', ['bill' => $bill]);
    }

    public function update(Request $request, Bill $bill)
    {
        $status = request()->status;
        $isInvalidUpdateStatus = $bill->status == Bill::NEW && $status == Bill::DONE;
        if ($isInvalidUpdateStatus) {
            Alert::error('Đơn hàng chưa được vận chuyển!');
            return back();
        }
        $bill->status = $status;
        $bill->update();
        if ($status == Bill::DELIVERY) {
            Bill::sendDeliveryEmail($bill);
            Alert::success('Đơn hàng đang được vận chuyển!!');
            return redirect()->route('admin.order.delivery');
        } elseif ($status == Bill::DONE) {
            Bill::sendDoneEmail($bill);
            Alert::success('Hoàn thành đơn hàng!!');
            return redirect()->route('admin.order.done');
        }
        return redirect()->route('admin.order.new');
    }
}
