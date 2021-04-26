<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Base
{

    protected $table = 'products';
    public $fillable = [
        'product_id',
        'category_id',
        'brand_id',
        'name',
        'slug',
        'description',
        'image',
        'best_selling',
        'size',
        'quantity',
        'price',
        'status',
        'discount',
        'code_product',
        'created_at',
        'updated_at',
        'summary'
    ];
    const BEST_SELLING = 1;
    const NOT_BEST_SELLING = 0;
    const OUT_OF_STOCK_WARNING_POINT = 5;

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getImageFullPathAttribute(): string
    {
        if (!$this->image) {
            return '';
        }
        return asset('uploads/images/products') . '/' . $this->image;
    }

    public function getTotalPrice()
    {
        if (!$this->pivot) {
            return 0;
        }
        return $this->pivot->price * $this->pivot->quantity - $this->getTotalDiscount();
    }

    public function getTotalDiscount()
    {
        if (!$this->pivot) {
            return 0;
        }
        return $this->pivot->price * $this->pivot->quantity * $this->pivot->discount / 100;
    }

    public function getPriceAfterDiscountAttribute()
    {
        return $this->price - $this->price * $this->discount / 100;
    }

    public static function countActiveProduct(){
        $data=Product::where('status','1')->count();
        if($data){
            return $data;
        }
        return 0;
    }

}
