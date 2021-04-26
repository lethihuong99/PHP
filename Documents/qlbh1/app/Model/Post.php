<?php

namespace App\Model;
use App\Model\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Base
{
    protected $table = 'posts';
    protected $fillable = ['title', 'slug', 'description', 'quote', 'image', 'status', 'post_category_id','summary'];
    const MAX_WORD = 90;
    const MAX_WORD1 = 150;
    const MAX_WORD2 = 220;
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function postCategory()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function getTagLabelsAttribute()
    {
        return implode($this->tags->map(function ($tag) 
        {
            $route = route('admin.tag.edit', $tag->id);
            return "<a class='btn btn-sm btn-outline-info m-2' href='$route'>$tag->title</a>";
        })->toArray());
    }

    public function getPortalTagLabelsAttribute()
    {
        return implode($this->tags->map(function ($tag) {
            return "<a class='text-center text-white'
                    style='width: 50px; background: cadetblue; padding: 5px; margin: 3px; border-radius: 10%'
                    href='#'>$tag->title</a>";
        })->toArray());
    }

    public function getBriefQuoteAttribute()
    {
        if (str_word_count($this->quote) < self::MAX_WORD) {
            return $this->quote;
        }
        return substr($this->quote, 0, self::MAX_WORD) . '...';
    }
    public function getBriefSummaryAttribute()
    {
        if (str_word_count($this->summary) < self::MAX_WORD1) {
            return $this->summary;
        }
        return substr($this->summary, 0, self::MAX_WORD2) . '...';
    }
    public static function countActivePost(){
        $data=Post::where('status','1')->count();
        if($data){
            return $data;
        }
        return 0;
    }

   /*  public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    } */
}
