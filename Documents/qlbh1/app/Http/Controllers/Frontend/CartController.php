<?php

namespace App\Http\Controllers\Frontend;

use App\Model\Bill;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\District;
use App\Model\Product;
use App\Model\Province;
use App\Model\User;
use App\Model\Ward;
use App\Services\ProductService;
use App\ShippingCharge;
use App\Traits\InventoryTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)
            ->whereDoesntHave('bill')->latest()->first();

          
        $userAddress = Auth::user()->address()->where('is_default', true)->first();
        $userAddress->load('province', 'district', 'ward');
        $shippingCharge = $userAddress->shippingCharge();
        return view(
            'frontend.cart.index',
            [
                'cart' => $cart ?? new Cart(),
                'userAddress' => $userAddress,
                'shippingCharge' => $shippingCharge
            ]
        );
    }

    public function addProduct()
    {
        $productId = request()->product_id;
        $product = Product::findOrFail($productId);
        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)
            ->whereDoesntHave('bill')->latest()->first();
        DB::beginTransaction();
        try {
            if (!$cart) {
                $cart = new Cart([
                    'user_id' => $userId,
                ]);
                $cart->save();
            }
            $updatedProduct = $cart->products()->where('products.id', $productId)->first();
            $quantity = request()->quantity ?? 1;
            if ($product->quantity < $quantity) {
                Alert::error('Sản phẩm không đủ!');
                return back();
            }
            if (!$updatedProduct) {
                $cart->products()->attach($productId, [
                    'quantity' => $quantity,
                    'price' => $product->price,
                    'discount' => $product->discount,
                ]);
                
            } else {
                $cart->products()->updateExistingPivot($productId, [
                    'quantity' => $updatedProduct->pivot->quantity + $quantity,
                    'discount' => $product->discount
                ]);
            }
            $product->quantity -= $quantity;
            $product->save();
            DB::commit();
        } catch (Exception $exception) {
            Alert::error($exception->getMessage());
            DB::rollBack();
        }
        Alert::success('Thành công!!');
        return back();
    }

    public function increaseProduct()
    {
        $productId = request()->product_id;
        $product = Product::findOrFail($productId);
        if (!$this->productService->isExistingProduct($product)) {
            Alert::error('Sản phẩm đã hết!');
            return back();
        }
        $cartId = request()->cart_id;
        $cart = Cart::findOrFail($cartId);
        DB::beginTransaction();
        try {
            $updatedProduct = $cart->products()->where('products.id', $productId)->first();
            $cart->products()->updateExistingPivot($productId, [
                'quantity' => $updatedProduct->pivot->quantity + 1,
            ]);
            $product->quantity -= 1;
            $product->save();
            DB::commit();
        } catch (Exception $exception) {
            Alert::error($exception->getMessage());
            DB::rollBack();
        }
        return redirect()->route('fr.cart');
    }

    public function decreaseProduct()
    {
        $productId = request()->product_id;
        $product = Product::findOrFail($productId);
        $cartId = request()->cart_id;
        $cart = Cart::findOrFail($cartId);
        DB::beginTransaction();
        try {
            $updatedProduct = $cart->products()->where('products.id', $productId)->first();
            if ($updatedProduct->pivot->quantity <= 1) {
                $cart->products()->detach($productId);
            } else {
                $cart->products()->updateExistingPivot($productId, [
                    'quantity' => $updatedProduct->pivot->quantity - 1,
                ]);
            }

            $product->quantity += 1;
            $product->save();
            DB::commit();
        } catch (Exception $exception) {
            Alert::error($exception->getMessage());
            DB::rollBack();
        }
        return redirect()->route('fr.cart');
    }

    public function deleteProduct()
    {
        $productId = request()->product_id;
        $cartId = request()->cart_id;
        $cart = Cart::findOrFail($cartId);
        DB::beginTransaction();
        try {
            $updatedProduct = $cart->products()->where('products.id', $productId)->first();
            $cart->products()->detach($productId);
            Product::where('id', $productId)->update(['quantity' => $updatedProduct->pivot->quantity]);
            DB::commit();
        } catch (Exception $exception) {
            Alert::error($exception->getMessage());
            DB::rollBack();
        }
        return redirect()->route('fr.cart');
    }

    public function checkout()
    {
        $cartId = request()->cart_id;
        $isNotExistingProduct = !Cart::findOrFail($cartId)->products()->count();
        if ($isNotExistingProduct) {
            return back();
        }
        $bill = new Bill([
            'cart_id' => $cartId,
            'status' => Bill::NEW,
            'sub_total' => Cart::findOrFail($cartId)->subTotal(),
            'shipping_address' => request()->address,
            'shipping_price' => request()->fee,
            'phone' => request()->phone
        ]);
        $bill->save();
        Alert::success('Cảm ơn bạn đã mua hàng !!');
        return redirect()->route('fr.home');
    }

    public function overviewBill()
    {
        $cart = Cart::findOrFail(request()->cart_id);
        $shippingCharge = ShippingCharge::where('province_id', request()->province_id)
            ->where('district_id', request()->district_id)
            ->where('ward_id', request()->ward_id)
            ->first();
        $province = Province::findOrFail(request()->province_id);
        $district = District::findOrFail(request()->district_id);
        $ward = Ward::findOrFail(request()->ward_id);
        return view(
            'frontend.cart.bill',
            [
                'cart' => $cart,
                'shippingCharge' => $shippingCharge ?? new ShippingCharge(),
                'fulldAdress' => $province->name . ' '
                    . $district->name . ' '
                    . $ward->name . ' ' . request()->address,
                'payment_type' => request()->payment_type,
                'phone' => request()->phone,
            ]
        );
    }
}
