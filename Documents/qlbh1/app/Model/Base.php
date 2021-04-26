<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Base extends Model
{
    const ACTIVE = 1;
    const DISABLE = 0;

    const STATUS = [
        self::ACTIVE => 'Hoạt động',
        self::DISABLE => 'Không hoạt động'
    ];

    public function getStatusLabelAttribute()
    {
        if ($this->status == self::ACTIVE) {
            return "<span class='badge badge-success'>Hoạt động</span>";
        }
        return "<span class='badge badge-warning'>Không hoạt động</span>";
    }
}
