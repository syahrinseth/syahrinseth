<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Model for contact table
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
