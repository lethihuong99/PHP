<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class StatisticController extends Controller
{
    public function sale()
    {
        $selectedDate = request()->date;
        if ($selectedDate) {
            $selectedDate = Carbon::createFromFormat('Y-m-d', $selectedDate);
        } else {
            $selectedDate = today();
        }

        $carts = Cart::with('products.category')
            ->whereHas('bill', function ($query) use ($selectedDate) {
                $query->whereDate('created_at', $selectedDate);
            })->get();
        $statistics = [];
        foreach ($carts as $cart) {
            foreach ($cart->products as $product) {
                if (isset($statistics[$product->name])) {
                    $statistics[$product->name] += $product->pivot->quantity;
                } else {
                    $statistics[$product->name] = $product->pivot->quantity;
                }
            }
        }
        $label = array_keys($statistics);
        $datasetsData = array_values($statistics);
        return view(
            'admin.statistics.sale',
            [
                'selectedDate' => $selectedDate,
                'chartData' => [
                    'label' => $label,
                    'datasetsData' => $datasetsData
                ]
            ]
        );
    }

    public function reportRevenue()
    {
        $fromDate = request()->from_date;
        if ($fromDate) {
            $fromDate = Carbon::createFromFormat('d/m/Y', $fromDate);
        } else {
            $fromDate = today();
        }
        $toDate = request()->to_date;
        if ($toDate) {
            $toDate = Carbon::createFromFormat('d/m/Y', $toDate);
        } else {
            $toDate = today()->addDays(10);
        }
        if ($fromDate->greaterThan($toDate)) {
            Alert::error('Ngày bắt đầu phải trước ngày kết thúc!');
            return back();
        }
        $report = DB::table('bills')
            ->groupBy('bills.created_at')
            ->whereBetween('bills.created_at', [$fromDate, $toDate])
            ->select(
                DB::raw('DATE_FORMAT(bills.created_at, "%d/%m/%Y") as created_at'),
                DB::raw('sum(bills.sub_total+IFNULL(bills.shipping_price, 0)) as total')
            )->pluck('total', 'created_at')
            ->toArray();
       
        $period = new \DatePeriod(
            $fromDate,
            new \DateInterval('P1D'),
            $toDate
        );
        
        $labels = [];
        $revenues = [];
        foreach ($period as $key => $value) {
            $value = $value->format('d/m/Y');
            $labels[] = $value;
            $revenues["$value"] = 0;
        }
        $revenues = array_merge($revenues, $report);
       
        return view(
            'admin.statistics.revenue',
            [
                'labels' => $labels,
                'revenues' => array_values($revenues)
            ]
        );
    }

    public function warningProduct()
    {
        $products = Product::where('quantity', '<=', Product::OUT_OF_STOCK_WARNING_POINT)
            ->pluck('quantity', 'name')
            ->toArray();
        $label = array_keys($products);
        $datasetsData = array_values($products);
        return view(
            'admin.statistics.warning-product',
            [
                'chartData' => [
                    'label' => $label,
                    'datasetsData' => $datasetsData
                ]
            ]
        );
    }
}
