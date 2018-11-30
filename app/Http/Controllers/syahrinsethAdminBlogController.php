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
            $MasterBlogs = MasterBlog::paginate(3);
            return view('adminblog.index', compact('MasterBlogs'));
        }else{
            $MasterBlogs = MasterBlog::where('user_id', '=', Auth::user()->id)->paginate(3);
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
        return view('adminblog.create', compact('MasterCategories'));
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
            ]);

            $master_blog = new MasterBlog;
            $master_blog->title = $request->title;
            $master_blog->slug = strtolower(str_replace(" ", "-", $request->title));
            $master_blog->body = $request->body;
            $master_blog->author = Auth::user()->name;
            $master_blog->user_id = Auth::user()->id;
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
                $path = $request->file('cover_img')->storeAs('/public/blog/'.$masterblog_with_id->id.'/', $fileNameToStore);
                $masterblog_with_id->cover_img = $fileNameToStore;
                $masterblog_with_id->update();
            }

            // Check if category exists
            if($request->category){
                $master_categories = masterCategoriesModel::where('category', strtolower($request->category))->first();
                if($master_categories){
                    $categories = BlogCategories::where('masterblogs_id', $masterblog_with_id->id)->first();
                    if($categories){
                        $categories->mastercategories_id = $master_categories->id;
                        $categories->update();
                    }else{
                        $categories = new BlogCategories;
                        $categories->mastercategories_id = $master_categories->id;
                        $categories->masterblogs_id = $master_blog->id;
                        $categories->save();
                    }
                }else{
                    $categories = new masterCategoriesModel;
                    $categories->category = strtolower($request->category);
                    $categories->save();
                    $categories = masterCategoriesModel::where('category', $request->category)->first();
                    if($categories){
                        $categories = new BlogCategories;
                        $categories->mastercategories_id = $categories->id;
                        $categories->masterblogs_id = $master_blog->id;
                        $categories->save();
                    }else{
                        $request->session()->flash('alert-success', 'Add Category Failed!');
                        return baack();
                    }

                }
            }
            $request->session()->flash('alert-success', 'Success!');
            return redirect()->route('index.adminblog');
        }else{
            return abort(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $MasterBlog = MasterBlog::where("slug", $slug)->firstOrFail();
        $postsRand = MasterBlog::inRandomOrder()->take(3)->get();
        MasterBlog::addPageView($slug, true);
        return view('blog.show', compact('MasterBlog', 'postsRand'));
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
        $category = masterCategoriesModel::leftJoin('blog_categories', 'master_categories.id', '=', 'blog_categories.mastercategories_id')->where('blog_categories.masterblogs_id', $id)->first();
        $MasterCategories = masterCategoriesModel::all();
        return view('adminblog.edit', compact('MasterBlog', 'category', 'MasterCategories'));
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
        if(Auth::user()->user_type != 'visitor'){
            $master_blog = MasterBlog::findOrFail($id);
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
            $master_blog->author = Auth::user()->name;
            $master_blog->user_id = Auth::user()->id;
            if($request->cover_img){
                Storage::disk('public')->delete('/blog'.'/'.$master_blog->id.'/'.$master_blog->cover_img);
                // Get filename with the extension
                $filenameWithExt = $request->file('cover_img')->getClientOriginalName();
                // Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $request->file('cover_img')->getClientOriginalExtension();
                // Filename to store
                $fileNameToStore = time().'-syahrinseth'.'.'.$extension;
                // Upload image
                $path = $request->file('cover_img')->storeAs('/public/blog/'.$master_blog->id.'/', $fileNameToStore);

                $master_blog->cover_img = $fileNameToStore;
            }
            $master_blog->update();
            // Check if category exists


            // Check if category exists
            if($request->category){
                $master_categories = masterCategoriesModel::where('category', strtolower($request->category))->first();
                if($master_categories){
                    $categories = BlogCategories::where('masterblogs_id', $master_blog->id)->first();
                    if($categories){
                        $categories->mastercategories_id = $master_categories->id;
                        $categories->update();
                    }else{
                        $categories = new BlogCategories;
                        $categories->mastercategories_id = $master_categories->id;
                        $categories->masterblogs_id = $master_blog->id;
                        $categories->save();
                    }
                }else{
                    $categories = new masterCategoriesModel;
                    $categories->category = strtolower($request->category);
                    $categories->save();
                    $categories = masterCategoriesModel::where('category', $request->category)->first();
                    if($categories){
                        $categories = new BlogCategories;
                        $categories->mastercategories_id = $categories->id;
                        $categories->masterblogs_id = $master_blog->id;
                        $categories->save();
                    }else{
                        $request->session()->flash('alert-success', 'Add Category Failed!');
                        return baack();
                    }

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
        MasterBlog::findOrFail($id)->delete();
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
