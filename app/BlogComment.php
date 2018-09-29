<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    // Model for blog_comment table
    protected $table = 'blog_comment';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
