<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;


class BlogController extends Controller
{
    public function index(){
        $blogs = DB::table('hwp_blog')
            ->select('hwp_blog.id','hwp_blog.blog_date','hwp_blog.blog_title','hwp_blog.blog_content','hwp_blog.blog_author','hwp_blog.blog_image'
                ,'hwp_user.display_name','hwp_user.role','hwp_user.user_image')
            ->join('hwp_user','hwp_user.id','=','hwp_blog.blog_author')
            ->orderBy('hwp_blog.id', 'desc')->get()->toArray();
        return view('blog.blog',compact('blogs'));
    }

    public function find_blog(Request $request)
    {


        $search_text = $request->s;
        $blogs = DB::table('hwp_blog')
            ->select('hwp_blog.id','hwp_blog.blog_date','hwp_blog.blog_title','hwp_blog.blog_content','hwp_blog.blog_author','hwp_blog.blog_image'
                ,'hwp_user.display_name','hwp_user.role','hwp_user.user_image')
            ->join('hwp_user','hwp_user.id','=','hwp_blog.blog_author')
            ->where('hwp_blog.blog_content', 'like', '%' . $search_text . '%')
            ->OrWhere('hwp_blog.blog_content', 'like', '%' . ucfirst($search_text) . '%')
            ->orderBy('hwp_blog.id', 'desc')->get()->toArray();
        $mess = "Kết quả tìm kiếm: ". $search_text;
        return view('blog.blog',compact('blogs','mess'));

    }
}
