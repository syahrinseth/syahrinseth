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
        $categories = masterCategoriesModel::all();
        $category = null;
        // SEND DATA TO VIEW
        return view('blog.index', compact('MasterBlogs', 'categories', 'category'));
    }

    public function indexCategory($id)
    {
        // GET DATA FROM DATABASE
        $category = masterCategoriesModel::find($id);
        $MasterBlogs = BlogCategories::rightJoin('master_blogs', 'blog_categories.masterblogs_id', '=', 'master_blogs.id')->where('blog_categories.mastercategories_id', $id)->where('master_blogs.publish', 1)->orderBy('master_blogs.created_at', 'desc')->paginate(5);
        $categories = masterCategoriesModel::all();
        // SEND DATA TO VIEW
        return view('blog.index', compact('MasterBlogs', 'categories', 'category'));
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

    public function deleteBlogComment(Request $request, $id){
        $comment = BlogComment::findOrFail($id);
        $comment->delete();
        $request->session()->flash('alert-danger', 'Comment Deleted!');
        return back();
    }

}
