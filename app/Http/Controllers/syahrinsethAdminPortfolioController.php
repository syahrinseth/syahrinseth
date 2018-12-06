<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

use App\MasterPortfolio;


class syahrinsethAdminPortfolioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $master_portfolios = MasterPortfolio::paginate(5);
        return view('adminportfolio.index', compact('master_portfolios'));
    }

    public function show($id){
        $master_portfolio = MasterPortfolio::findOrFail($id);
        return view('adminportfolio.show', compact('master_portfolio'));
    }

    public function create(){
        return view('adminportfolio.create');
    }

    public function store(Request $request){
        $this->validate(request(), [
            'project_name' => 'required',
            'project_desc' => 'required',
            'project_type' => 'required',
            'cover_image' => 'required|mimes:jpeg,png,jpg,gif|max:10000'
        ]);
        $master_portfolio = new MasterPortfolio;
        $master_portfolio->project_name = $request->project_name;
        $master_portfolio->project_desc = $request->project_desc;
        $master_portfolio->client = $request->client;
        $master_portfolio->project_type = strtolower(str_replace(' ', '_', $request->project_type));
        if($request->cover_image){

            // Handle File Upload
            // Get filename with the extension
            $filenameWithExt = $request->cover_image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->cover_image->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $request->project_name.'_'.rand(1, 1000000) .'.'.$extension;
            // Upload image
            $path = $request->cover_image->storeAs('public/portfolio/', $fileNameToStore);

            $master_portfolio->cover_image = $fileNameToStore;

        }
        $master_portfolio->user_id = Auth::user()->id;
        $master_portfolio->save();
        $request->session()->flash('alert-success', 'Success!');
        return redirect()->route('index.adminportfolio');
    }

    public function edit($id){
        $portfolio = MasterPortfolio::findOrFail($id);
        $portfolio_details = \DB::table('portfolio_details')->where('masterportfolios_id', $id)->get();
        return view('adminportfolio.edit', compact('portfolio', 'portfolio_details'));
    }

    public function update(Request $request, $id){
        $this->validate(request(), [
            'project_name' => 'required',
            'project_desc' => 'required',
            'cover_image' => 'mimes:jpeg,png,jpg,gif'
        ]);
        $master_portfolio = MasterPortfolio::findOrFail($id);
        $master_portfolio->project_name = $request->project_name;
        $master_portfolio->project_desc = $request->project_desc;
        $master_portfolio->client = $request->client;
        $master_portfolio->project_type = strtolower(str_replace(' ', '_', $request->project_type));
        if($request->cover_image){

            // Handle File Upload
            Storage::delete('public/portfolio/'.$master_portfolio->cover_image);
            // Get filename with the extension
            $filenameWithExt = $request->cover_image->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->cover_image->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $request->project_name.'_'.rand(1, 1000000) .'.'.$extension;
            // Upload image
            $path = $request->cover_image->storeAs('public/portfolio/', $fileNameToStore);

            $master_portfolio->cover_image = $fileNameToStore;

        }
        $master_portfolio->user_id = Auth::user()->id;
        $master_portfolio->save();
        $request->session()->flash('alert-success', 'Success!');
        return redirect()->route('index.adminportfolio');
    }

    public function delete($id){
        $master_portfolio = MasterPortfolio::findOrFail($id);
        return view('adminportfolio.delete', compact('master_portfolio'));
    }

    public function destroy($id){
        $master_portfolio = MasterPortfolio::findOrFail($id);
        Storage::delete('public/portfolio/'.$master_portfolio->cover_image);
        $master_portfolio->delete();
        return redirect()->route('index.adminportfolio');
    }
}
