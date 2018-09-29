<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterBlog extends Model
{
    // Model for master_blog table
    protected $table = 'master_blog';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
