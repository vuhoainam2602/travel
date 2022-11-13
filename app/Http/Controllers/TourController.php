<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class TourController extends Controller
{
    public function index(){
        $tours = DB::table('hwp_tour')
            ->orderBy('hwp_tour.id', 'desc')->get()->toArray();
        return view('tour.list_tour',compact('tours'));
    }

    public function tour_detail($slug){
        $t = DB::table('hwp_tour')
            ->where('tour_slug','=',$slug)->first();
        return view('tour.tour_detail',compact('t'));
    }
}
