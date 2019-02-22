<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    // Model for blog_comment table
    protected $table = 'blog_comments';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public static function whenCreated($created_at){
        $time = \Carbon\Carbon::createFromTimeStamp(strtotime($created_at))->diffForHumans();
        if($time != null){
            return $time;
        }else{
            return 0;
        }
    }
}
