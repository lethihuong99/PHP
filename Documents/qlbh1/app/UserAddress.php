<?php

namespace App;

use App\Model\District;
use App\Model\Province;
use App\Model\Ward;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id',
        'province_id',
        'district_id',
        'ward_id',
        'address',
        'phone',
        'is_default',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function ward()
    {
        return $this->belongsTo(Ward::class);
    }

    public function shippingCharge()
    {
        return ShippingCharge::where('province_id', $this->province_id)
            ->where('district_id', $this->district_id)
            ->where('ward_id', $this->ward_id)
            ->first();
    }
}
