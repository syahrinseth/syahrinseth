<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MasterPortfolio;

class syahrinsethPortfolioController extends Controller
{
    public function index(){
        $portfolios = MasterPortfolio::paginate(5);
        return view('portfolio.index', compact('portfolios'));
    }
}
