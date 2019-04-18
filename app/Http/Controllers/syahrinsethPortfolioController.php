<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MasterPortfolio;

class syahrinsethPortfolioController extends Controller
{
    public function index(){
        $portfolios = MasterPortfolio::all();
        $portfolio_tabs = MasterPortfolio::distinct()->get(['project_type']);
        return view('portfolio.index', compact('portfolios', 'portfolio_tabs'));
    }

    public function ajaxShow($id){
        $portfolio = MasterPortfolio::find($id);
        return response()->json($portfolio);
    }
}
