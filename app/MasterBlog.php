<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class MasterBlog extends Model
{
    // Model for master_blog table
    protected $table = 'master_blogs';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public static function addPageView($slug, $auth = false){
        try{
            if($auth == true){
                if(Auth::user()){
                    if(Auth::user()->user_type == "admin"){
                        return 0;
                    }else{
                        $increment = DB::table('master_blogs')->where('slug', $slug)->increment('total_views', 1);
                        return $increment;
                    }
                }else{
                    $increment = DB::table('master_blogs')->where('slug', $slug)->increment('total_views', 1);
                    return $increment;
                }
            }else{
                return DB::table('master_blogs')->where('slug', $slug)->increment('total_views', 1);
            }
        }catch (Exeption $e){
            return 0;
        }

    }
}
