<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Category extends Base
{
    public $fillable = [
        'name',
        'slug',
        'description',
        'status'
    ];

    public function products()
    {
        return $this->hasMany(Product::class)
            ->where('status', Product::ACTIVE);
    }

    public function scopeActive(Builder $builder)
    {
        return $builder->where('status', self::ACTIVE);
    }
    public static function countActiveCategory(){
        $data=Category::where('status',self::ACTIVE)->count();
        if($data){
            return $data;
        }
        return 0;
    }
}
