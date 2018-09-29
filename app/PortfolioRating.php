<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortfolioRating extends Model
{
    // Model for portfolio_rating table
    protected $table = 'portfolio_rating';
    protected $primaryKey = 'id';
    protected $guarded = [];
}
