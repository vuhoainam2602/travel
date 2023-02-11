<?php

use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/random-pass/', 'PostController@randomkey')->name('random');
Route::get('/huong-dan-lay-pass/', 'PostController@random_bv')->name('random_bv');

Route::prefix('/admin')->group(function () {
    Route::get('/trang-chu', 'Admin\BaiVietController@danhSachBaiViet')->name('trang_chu');
    Route::get('/', 'Admin\BaiVietController@danhSachBaiViet')->name('trang_chu');
    Route::get('/them-bai-viet', 'Admin\BaiVietController@themBaiViet')->name('themBV');
    Route::post('/them-bai-viet', 'Admin\BaiVietController@luuBaiViet')->name('luuBV');
    Route::get('/sua-bai-viet/{id}', 'Admin\BaiVietController@suaBaiViet')->name('suaBV');
    Route::post('/sua-bai-viet', 'Admin\BaiVietController@updateBaiViet')->name('updateBV');
    Route::get('xoa-bai-viet/{id}', 'Admin\BaiVietController@xoaBaiViet')->name('xoaBV');
    Route::get('/login', 'Admin\UsersController@view_login')->name('view_login');
    Route::post('/action-login', 'Admin\UsersController@action_login')->name('action_login');
    Route::get('/action-logout', 'Admin\UsersController@action_logout')->name('action_logout');
    Route::get('/them-user', 'Admin\UsersController@page_user')->name('page_user');
    Route::post('/insert-user', 'Admin\UsersController@insert_user')->name('insert_user');
    Route::get('/index-user', 'Admin\UsersController@index_user')->name('index_user');
    Route::get('/edit-user/{id}', 'Admin\UsersController@page_edit_user')->name('page_edit_user');
    Route::post('/edit-user', 'Admin\UsersController@edit_user')->name('edit_user');
    Route::get('/delete-user/{id}', 'Admin\UsersController@delete_user')->name('delete_user');
    Route::get('/find-user', 'Admin\UsersController@find_user')->name('find_user');
    Route::get('/index-tour', 'Admin\LichTrinhController@danhSachTour')->name('danhSachTour');
    Route::get('/them-tour', 'Admin\LichTrinhController@themTour')->name('themTour');
    Route::post('/them-tour', 'Admin\LichTrinhController@luuTour')->name('luuTour');
    Route::get('/sua-tour/{id}', 'Admin\LichTrinhController@suaTour')->name('suaTour');
    Route::post('/sua-tour', 'Admin\LichTrinhController@updateTour')->name('updateTour');
    Route::get('xoa-tour/{id}', 'Admin\LichTrinhController@xoaTour')->name('xoaTour');
    Route::get('/find-tour', 'TourController@find_tour')->name('find_tour');
    Route::get('/find-blog', 'BlogController@find_blog')->name('find_blog');
    Route::get('/index-contact', 'ContactController@danhSachLienHe')->name('danhSachLH');
});
Route::prefix('/')->group(function () {
    Route::get('/blog','BlogController@index');
    Route::get('/tour','TourController@index');
    Route::get('/contact','ContactController@index');
    Route::post('/contact','ContactController@contact')->name('contact');
    Route::get('/tour-detail/{slug}','TourController@tour_detail')->name('tour_detail');
    Route::get('/',function (){
        return view('welcome');
    });

});
//Route::get('/rd/xml/a/genrate-sitemap', function () {
//    // genarate site map
//    SitemapGenerator::create('https://rdone.net/')->writeToFile(public_path('sitemap.xml'));
//    echo "<script>window.close();</script>";
//});

