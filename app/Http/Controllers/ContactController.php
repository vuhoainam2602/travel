<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function index(){
        return view('contact.contact');
    }
    public function danhSachLienHe(){
        $index = 1;
        $ds_bai_viet = DB::table('hwp_contact')->orderBy('hwp_contact.id', 'desc')->get()->toArray();
        return view('admin.lienhe.danh_sach_lien_he',compact('ds_bai_viet','index'));
    }

    public function contact(Request $request){
        DB::table('hwp_contact')->insert([
            'contact_name' => $request->name,
            'contact_email'=> $request->email,
            'contact_content' =>$request->text_content,
        ]);
        $success = 'Sent success. Thanks for filling out our form!!!';
        return view('contact.contact', compact('success'));
    }


}
