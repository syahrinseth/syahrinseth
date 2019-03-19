<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\MasterBlog;
use App\BlogCategories;
use App\masterCategoriesModel;
use App\BlogComment;

class syahrinsethBlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // GET DATA FROM DATABASE
        $MasterBlogs = MasterBlog::where('publish', 1)->orderBy('created_at', 'desc')->paginate(5);
        // SEND DATA TO VIEW
        return view('blog.index', compact('MasterBlogs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $MasterBlog = MasterBlog::where("master_blogs.slug", $slug)->where('publish', '=', 1)->firstOrFail();
        $blogComments = BlogComment::where('masterblogs_id', '=', $MasterBlog->id)->orderBy('created_at', 'DESC')->get();
        $postsRand = MasterBlog::where('publish', '=', 1)->inRandomOrder()->take(3)->get();
        MasterBlog::addPageView($slug, true);
        return view('blog.show', compact('MasterBlog', 'postsRand', 'blogComments'));
    }

    public function createBlogComment(Request $request, $id)
    {
        if(MasterBlog::find($id)){
            // Validate data
            $this->validate(request(),
            [
                'name' => 'required',
                'body' => 'required'
            ]);

            // Insert data to database
            $blogComment = new BlogComment;
            $blogComment->name = $request->name;
            $blogComment->body = $request->body;
            $blogComment->masterblogs_id = $id;
            $blogComment->save();
            $request->session()->flash('alert-success', 'Comment submited.');
            return back();
        }else{
            return abort(500);
        }
    }

}
