<?php

namespace App\Model;

use App\Model\Cart;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CartProduct extends Pivot
{
    protected $table = 'cart_products';
}
