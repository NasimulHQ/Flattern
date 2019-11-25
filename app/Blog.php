<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Blog extends Model
{
    use Commentable;
    protected $fillable = ['blog_category_id', 'user_id', 'title', 'excerpt', 'description','image', 'slug' ];

    public function tags ()
    {
        return $this->belongsToMany(Tag::class, 'blogs_tags', 'blog_id','tag_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }
}
