<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Base
{
    protected $fillable=['title','slug','description','photo','status'];
    protected $table = 'banners';
}
