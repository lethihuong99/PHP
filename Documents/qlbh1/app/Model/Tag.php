<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Base
{
    protected $table = 'tags';
    protected $fillable = ['title','slug','description','status','created_at','updated_at'];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
