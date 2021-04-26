<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_products')
            ->withPivot('quantity', 'price', 'discount');
    }

    public function bill()
    {
        return $this->hasOne(Bill::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subTotal()
    {
        $total = 0;
        $totalDiscount = 0;
        foreach ($this->products as $product) {
            $totalDiscount += $product->pivot->quantity *
                $product->pivot->price * ($product->pivot->discount ?? 0)/100;
            $total += $product->pivot->quantity * $product->pivot->price;
        }
        return $total - $totalDiscount;
    }

    public function totalPaid()
    {
        return $this->subTotal() + ($this->bill->shipping_price ?? 0);
    }

    public function amountAfterFee($fee)
    {
        return number_format($this->subTotal() + $fee);
    }

    public function countProducts()
    {
        return $this->products()->sum('cart_products.quantity');
    }

    public function productName(){
        $totalProduct = $this->products->count() ;
        if($totalProduct==1) return $this->products->first()->name;
        return $this->products->first()->name." và ".(--$totalProduct)." sản phẩm khác";
    }
}
