<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TourController extends Controller
{
    public function index()
    {
        $tours = DB::table('hwp_tour')
            ->orderBy('hwp_tour.id', 'desc')->get()->toArray();
        return view('tour.list_tour', compact('tours'));
    }

    public function tour_detail($slug)
    {
        $t = DB::table('hwp_tour')
            ->where('tour_slug', '=', $slug)->first();
        return view('tour.tour_detail', compact('t'));
    }

    public function find_tour(Request $request)
    {


        $search_text = $request->s;
        $tours = DB::table('hwp_tour')
            ->where('hwp_tour.tour_title', 'like', '%' . $search_text . '%')
            ->orderBy('hwp_tour.id', 'desc')->get()->toArray();
        $mess = "Kết quả tìm kiếm: ". $search_text;
        return view('tour.list_tour', compact('tours','mess'));
    }


}
