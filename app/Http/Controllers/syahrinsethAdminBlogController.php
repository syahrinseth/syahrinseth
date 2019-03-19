<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\MasterBlog;
use App\BlogCategories;
use App\masterCategoriesModel;

class syahrinsethAdminBlogController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->user_type == 'admin'){
            $MasterBlogs = BlogCategories::leftJoin('master_blogs', 'master_blogs.id', '=', 'blog_categories.masterblogs_id')->orderBy('master_blogs.updated_at', "desc")->paginate(6);
            // $MasterBlogs = MasterBlog::leftJoin('blog_categories', 'blog_categories.masterblogs_id', '=', 'master_blogs.id')->paginate(3);
            return view('adminblog.index', compact('MasterBlogs'));
        }else{
            // $MasterBlogs = MasterBlog::where('user_id', '=', Auth::user()->id)->paginate(3);
            $MasterBlogs = BlogCategories::leftJoin('master_blogs', 'master_blogs.id', '=', 'blog_categories.masterblogs_id')->where('user_id', '=', Auth::user()->id)->orderBy('master_blogs.updated_at', "desc")->paginate(6);
            return view('adminblog.index', compact('MasterBlogs'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $MasterCategories = masterCategoriesModel::all();
        $categories = masterCategoriesModel::all();
        return view('adminblog.create', compact('MasterCategories', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->user_type != 'visitor'){
            $this->validate(request(), [
                'title' => 'required|unique:master_blogs,title',
                'cover_img' => 'mimes:jpeg,bmp,png'
            ]);

            $master_blog = new MasterBlog;
            $master_blog->title = $request->title;
            $master_blog->slug = strtolower(str_replace(" ", "-", $request->title));
            $master_blog->body = $request->body;
            $master_blog->author = Auth::user()->name;
            $master_blog->user_id = Auth::user()->id;
            $master_blog->publish = $request->publish;
            $master_blog->save();
            $masterblog_with_id = MasterBlog::where('slug', $master_blog->slug)->firstOrFail();

            if($request->cover_img){
                // Get filename with the extension
                $filenameWithExt = $request->file('cover_img')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('cover_img')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = time().'-syahrinseth'.'.'.$extension;
                // Upload image
                $request->file('cover_img')->storeAs('/public/blog/'.$masterblog_with_id->id.'/', $fileNameToStore);
                $masterblog_with_id->cover_img = '/public/blog/'.$masterblog_with_id->id.'/'. $fileNameToStore;
                $masterblog_with_id->update();
            }

            // Check if category exists
            // Search master category
            $master_categories = masterCategoriesModel::where('category', strtolower($request->category))->first();

            if($master_categories != null){
                // If category in master category exists
                if($request->category != "select" || $request->category != ""){
                    $blog_categories = new BlogCategories;
                    $blog_categories->mastercategories_id = $master_categories->id;
                    $blog_categories->masterblogs_id = $masterblog_with_id->id;
                    $blog_categories->save();
                }
            }else{
                // no catagory available inside master category
            }

            // if($request->category){
            //     $master_categories = masterCategoriesModel::where('category', strtolower($request->category))->first();
            //     if($master_categories){
            //         $categories = BlogCategories::where('masterblogs_id', $masterblog_with_id->id)->first();
            //         if($categories){
            //             $categories->mastercategories_id = $master_categories->id;
            //             $categories->update();
            //         }else{
            //             $categories = new BlogCategories;
            //             $categories->mastercategories_id = $master_categories->id;
            //             $categories->masterblogs_id = $master_blog->id;
            //             $categories->save();
            //         }
            //     }else{
            //         $categories = new masterCategoriesModel;
            //         $categories->category = strtolower($request->category);
            //         $categories->save();
            //         $categories = masterCategoriesModel::where('category', $request->category)->first();
            //         if($categories){
            //             $categories = new BlogCategories;
            //             $categories->mastercategories_id = $categories->id;
            //             $categories->masterblogs_id = $master_blog->id;
            //             $categories->save();
            //         }else{
            //             $request->session()->flash('alert-success', 'Add Category Failed!');
            //             return baack();
            //         }

            //     }
            // }
            $request->session()->flash('alert-success', 'Success!');
            return redirect()->route('index.adminblog');
        }else{
            return abort(404);
        }
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $MasterBlog = MasterBlog::findOrFail($id);
        $blog_category = masterCategoriesModel::leftJoin('blog_categories', 'master_categories.id', '=', 'blog_categories.mastercategories_id')->where('blog_categories.masterblogs_id', $id)->first();
        $categories = masterCategoriesModel::all();
        return view('adminblog.edit', compact('MasterBlog', 'blog_category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required',
            'cover_img' => 'mimes:jpeg,bmp,png'
        ]);
        if(Auth::user()->user_type != 'visitor'){
            $master_blog = MasterBlog::findOrFail($id);
            $master_blog_id = $master_blog->id;
            if($master_blog->slug == strtolower(str_replace(" ", "-", $request->title))){
                $master_blog->title = $request->title;
                $master_blog->slug = strtolower(str_replace(" ", "-", $request->title));
            }else{
                $this->validate(request(), [
                    'title' => 'required|unique:master_blogs,title',
                ]);
                $master_blog->title = $request->title;
                $master_blog->slug = strtolower(str_replace(" ", "-", $request->title));
            }
            $master_blog->body = $request->body;
            $master_blog->publish = $request->publish;
            $master_blog->author = Auth::user()->name;
            $master_blog->user_id = Auth::user()->id;
            if($request->cover_img){
                Storage::disk('local')->delete($master_blog->cover_img);

                // Get filename with the extension
                $filenameWithExt = $request->file('cover_img')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('cover_img')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = time().'-syahrinseth'.'.'.$extension;
                // Upload image
                $request->file('cover_img')->storeAs('/public/blog/'.$master_blog->id.'/', $fileNameToStore);
                $master_blog->cover_img = '/public/blog/'.$master_blog->id.'/'. $fileNameToStore;

            }
            $master_blog->update();
            // Check if category exists


            // Search master category
            $master_categories = masterCategoriesModel::where('category', strtolower($request->category))->first();

            // user current category
            $categories = BlogCategories::where('masterblogs_id', $master_blog_id)->first();


            if($master_categories != null){
                // If category in master category exists
                if($categories){
                    $categories->mastercategories_id = $master_categories->id;
                    $categories->update();
                }elseif($request->category != "select" || $request->category != ""){
                    $blog_categories = new BlogCategories;
                    $blog_categories->mastercategories_id = $master_categories->id;
                    $blog_categories->masterblogs_id = $master_blog_id;
                    $blog_categories->save();
                }else{
                    $categories->delete();
                }
            }else{
                // If category in master category not exists
                if($categories != null){
                    $categories->delete();
                }
            }
            $request->session()->flash('alert-success', 'Success!');
            return redirect()->route('index.adminblog');
        }else{
            return abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $masterBlog = MasterBlog::findOrFail($id);
        return view('adminblog.delete', compact('masterBlog'));
    }

    public function destroy(Request $request, $id)
    {
        $blog = MasterBlog::findOrFail($id);
        if($blog->cover_img != null){
            Storage::disk('local')->deleteDirectory('/public/blog/'.$id);
        }
        $blog->delete();
        $blogCategories = BlogCategories::where('masterblogs_id', $id)->get();
        if(count($blogCategories) > 0){
            foreach($blogCategories as $category){
                $category->delete();
            }
        }
        $request->session()->flash('alert-danger', 'Deleted!');
        return redirect()->route('index.adminblog');
    }
}
