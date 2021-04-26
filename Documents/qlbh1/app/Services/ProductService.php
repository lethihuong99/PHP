<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;

class ProductService{
    public function isExistingProduct($product): bool
    {
        if ($product->quantity <= 0) {
            return false;
        }
        return true;
    }
}
