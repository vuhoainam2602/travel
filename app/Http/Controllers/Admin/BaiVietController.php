<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
//use MongoDB\Driver\Session;
//use Intervention\Image\Image;
//use Intervention\Image\ImageManager;
use mysql_xdevapi\Exception;


class BaiVietController
{

    public function index()
    {
        return view('admin.layout_admin.layout_admin');
    }

    public function themBaiViet()
    {

        try {
            $users = DB::table('hwp_user')->select("ID", "user_login")->get()->toArray();
            return view('admin.baiviet.them_bai_viet', compact("users", ));
        } catch (\Exception $e) {
            return abort(404);
        }
    }

    public function luuBaiViet(Request $request)
    {
//        try {
            if ($request->has('image_upload')) {
                $file_image = $request->file('image_upload');
                $ext = $request->file('image_upload')->extension();
                $name_image = now()->toDateString() . '-' . time() . '-' . 'post_img.' . $ext;
                $img = (new \Intervention\Image\ImageManager)->make($file_image->path())->fit(300)->encode('jpg');
                $path = public_path('images/').$name_image;

                $img->save($path);

                //$file_image->move(public_path('images'), $name_image);
            }
            $post_name = $request->post_name . '-' . rand(10, 100);
            DB::table('hwp_blog')->insert([
                'blog_title' => $request->tieu_de,
                'blog_content' => $request->mo_ta,
                'blog_author' => $request->tac_gia,
                'blog_slug' => $post_name,
                'blog_date' => date('y-m-d h:i:s'),
                'blog_image' => URL::to('') . '/images/' . $name_image
            ]);



            return redirect()->route('trang_chu');
//        } catch (\Exception $e) {
//            return abort(404);
//        }
    }

    public function suaBaiViet(Request $request)
    {
//        try {
            $posts = DB::table('hwp_blog')
                ->where("hwp_blog.id", '=', $request->id)
                ->get()->toArray();

            $item = $posts[0];

            $users = DB::table('hwp_user')->select("id", "display_name")->get()->toArray();

            return view('admin.baiviet.sua_bai_viet', compact('item', 'users'));
//        } catch (\Exception $e) {
//            return abort(404);
//        }
    }

    public function updateBaiViet(Request $request)
    {
       try {
        $ses = $request->session()->get('tk_user');

            if (isset($ses) && ($request->session()->get('role')[0] == 'admin' || $request->session()->get('role')[0] == 'user')) {


                DB::table('hwp_blog')->where('id', '=', $request->id)
                    ->update([
                        'blog_title' => $request->tieu_de,
                        'blog_content' => $request->mo_ta,
                        'blog_author' => $request->tac_gia,
                        'blog_slug' => $request->post_name,
                        'blog_date' => date('y-m-d h:i:s'),
                ]);

                if ($request->image_upload != null) {
                    $file_image = $request->file('image_upload');
                    $ext = $request->file('image_upload')->extension();
                    $name_image = now()->toDateString() . '-' . time() . '-' . 'edit_post_img.' . $ext;
                    $img = (new \Intervention\Image\ImageManager)->make($file_image->path())->fit(300)->encode('jpg');
                    $path = public_path('images/') . $name_image;

                    $img->save($path);
                    DB::table('hwp_blog')->where('id', '=', $request->id)
                        ->update([

                            'blog_image' => URL::to('') . '/images/' . $name_image
                        ]);
                }




                if (session("tasks_url")){
                    return redirect(session("tasks_url"));
                }
                return redirect()->route('trang_chu');
            } else {
                return redirect('/admin/login');

        }
        } catch (\Exception $e) {
           return redirect(session("tasks_url"));
        }
    }

    public function danhSachBaiViet(Request $request)
    {
//        try {
            $ses = $request->session()->get('tk_user');
            if (isset($ses)) {
                $index = 1;
                $ds_bai_viet = DB::table('hwp_blog')
                    ->select('hwp_blog.id','hwp_blog.blog_date','hwp_blog.blog_title','hwp_blog.blog_content','hwp_blog.blog_author','hwp_blog.blog_image','hwp_user.display_name','hwp_user.role')
                    ->join('hwp_user','hwp_user.id','=','hwp_blog.blog_author')
                    ->orderBy('hwp_blog.id', 'desc')
                    ->paginate(15);

                Session::put('tasks_url',$request->fullUrl());
                return view("admin.baiviet.danh_sach_bai_viet", compact('ds_bai_viet', 'index'));
            } else {
                return redirect('/admin/login');

            }

//        } catch (\Exception $e) {
//            return abort(404);
//        }
    }

    public function xoaBaiViet($id, Request $request)
    {

        $ses = $request->session()->get('tk_user');

        if (isset($ses) && $request->session()->get('role')[0] == 'admin') {
            DB::table('hwp_blog')->where('ID', '=', $id)->delete();

        }
        return redirect()->back();
    }

    public function timBaiViet(Request $request)
    {
        try {
            $ses = $request->session()->get('tk_user');
            if (isset($ses)) {
                $index = 1;
                if (isset($_GET['s']) && strlen($_GET['s']) >= 1) {
                    $search_text = $_GET['s'];
                    $ds_bai_viet = DB::table('hwp_blog')
                        ->select('hwp_blog.id','hwp_blog.blog_date','hwp_blog.blog_title','hwp_blog.blog_content','hwp_blog.blog_author','hwp_blog.blog_image','hwp_user.display_name','hwp_user.role')
                        ->join('hwp_user','hwp_user.id','=','hwp_blog.blog_author')
                        ->where('hwp_blog.blog_title', 'like', '%' . $search_text . '%')
                        ->orderBy('hwp_blog.id', 'desc')->paginate(15);
                    Session::put('tasks_url',$request->fullUrl());
                    return view("admin.baiviet.danh_sach_bai_viet", compact('search_text','ds_bai_viet', 'index'));
                }
            } else {
                return redirect('/admin/login');

            }

        } catch (\Exception $e) {
            return abort(404);
        }
    }


}
