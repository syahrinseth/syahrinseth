<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterPortfolio extends Model
{
    // Model for master_portfolio table
    protected $table = 'master_portfolio';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
