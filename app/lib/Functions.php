<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17-Dec-18
 * Time: 3:20 PM
 */

namespace App\lib;


use App\Blog;
use Illuminate\Support\Facades\DB;

class Functions
{
    public static function countpostbycategory($id)
    {
        return Blog::where('blog_category_id', $id)->count();
    }

    public static function commentcount($postId)
    {
        return DB::table('comments')->where('commentable_id', $postId)->count();
    }
}
