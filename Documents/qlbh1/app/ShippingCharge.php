<?php

namespace App;

use App\Model\District;
use App\Model\Province;
use App\Model\Ward;
use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    protected $fillable = [
        'province_id',
        'district_id',
        'ward_id',
        'fee',
    ];

    const DEFAULT_FEE = 0;

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
}
