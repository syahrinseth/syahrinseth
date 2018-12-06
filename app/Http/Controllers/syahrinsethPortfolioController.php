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
        $portfolio = MasterPortfolio::leftjoin('portfolio_details', 'master_portfolios.id', '=', 'portfolio_details.masterportfolios_id')->where('master_portfolios.id', $id)->get();
        return response()->json($portfolio);
    }
}
