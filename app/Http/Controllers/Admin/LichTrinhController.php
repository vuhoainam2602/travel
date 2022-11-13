<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class LichTrinhController extends Controller
{
    public function danhSachTour(Request $request)
    {
        $ses = $request->session()->get('tk_user');
        if (isset($ses)) {
            $index = 1;
            $ds_bai_viet = DB::table('hwp_tour')
                ->orderBy('hwp_tour.id', 'desc')
                ->paginate(15);

            Session::put('tasks_url', $request->fullUrl());
            return view("admin.lichtrinh.danh_sach_tour", compact('ds_bai_viet', 'index'));
        } else {
            return redirect('/admin/login');

        }

    }

    public function themTour()
    {
        return view('admin.lichtrinh.them_tour');
    }

    public function luuTour(Request $request)
    {
//        try {
        if ($request->has('image_upload')) {
            $file_image = $request->file('image_upload');
            $ext = $request->file('image_upload')->extension();
            $name_image = now()->toDateString() . '-' . time() . '-' . 'post_img.' . $ext;
            $img = (new \Intervention\Image\ImageManager)->make($file_image->path())->fit(600)->encode('jpg');
            $path = public_path('images/tour/').$name_image;

            $img->save($path);

            //$file_image->move(public_path('images'), $name_image);
        }
        $post_name = $request->post_name . '-' . rand(10, 100);
        DB::table('hwp_tour')->insert([
            'tour_title' => $request->tieu_de,
            'tour_content' => $request->noi_dung,
            'tour_desc'=> $request->mo_ta,
            'tour_slug' => $post_name,
            'tour_date' => $request->khoi_hanh,
            'tour_cost' => $request->gia,
            'tour_time' => $request->thoi_gian,
            'tour_vehicle'=> $request->phuong_tien,
            'tour_image' => URL::to('') . '/images/tour/' . $name_image
        ]);



        return redirect()->route('danhSachTour');
//        } catch (\Exception $e) {
//            return abort(404);
//        }
    }

    public function suaTour(Request $request)
    {
//        try {
        $posts = DB::table('hwp_tour')
            ->where("hwp_tour.id", '=', $request->id)
            ->get()->toArray();

        $item = $posts[0];

        return view('admin.lichtrinh.sua_tour', compact('item'));
//        } catch (\Exception $e) {
//            return abort(404);
//        }
    }

    public function updateTour(Request $request)
    {
        try {
            $ses = $request->session()->get('tk_user');

            if (isset($ses) && ($request->session()->get('role')[0] == 'admin' || $request->session()->get('role')[0] == 'user')) {


                DB::table('hwp_tour')->where('id', '=', $request->id)
                    ->update([
                    'tour_title' => $request->tieu_de,
                    'tour_content' => $request->noi_dung,
                    'tour_desc'=> $request->mo_ta,
                    'tour_date' => $request->khoi_hanh,
                    'tour_cost' => $request->gia,
                    'tour_time' => $request->thoi_gian,
                    'tour_vehicle'=> $request->phuong_tien,
                ]);

                if ($request->image_upload != null) {
                    $file_image = $request->file('image_upload');
                    $ext = $request->file('image_upload')->extension();
                    $name_image = now()->toDateString() . '-' . time() . '-' . 'edit_post_img.' . $ext;
                    $img = (new \Intervention\Image\ImageManager)->make($file_image->path())->fit(600)->encode('jpg');
                    $path = public_path('images/tour/') . $name_image;

                    $img->save($path);
                    DB::table('hwp_tour')->where('id', '=', $request->id)
                        ->update([
                        'tour_image' => URL::to('') . '/images/tour/' . $name_image
                    ]);


                }




                if (session("tasks_url")){
                    return redirect(session("tasks_url"));
                }
                return redirect()->route('danhSachTour');
            } else {
                return redirect('/admin/login');

            }
        } catch (\Exception $e) {
            return redirect(session("tasks_url"));
        }
    }

    public function xoaTour($id, Request $request)
    {

        $ses = $request->session()->get('tk_user');

        if (isset($ses) && $request->session()->get('role')[0] == 'admin') {
            DB::table('hwp_tour')->where('id', '=', $id)->delete();

        }
        return redirect()->back();
    }


}
