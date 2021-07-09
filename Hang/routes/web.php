<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {
    return 'Chào mừng các bạn đến với PNV';
});
Route::get('/Xinchao', 'App\Http\Controllers\XinChao@xinchao');
Route::group(['prefix'=>'MyGroup'],function (){
    Route::get('u1',function(){
        echo "Xin chao 1";
    });
    Route::get('u2',function(){
        echo "Xin chao 2";
    });
});
Route::get('/Test', 'App\Http\Controllers\Vidu@test');
Route::get('tinhtong', function(){
    return view('sum');
});
Route::post('/tinhtong', 'App\Http\Controllers\SumController@tinhtong');
Route::get('/areaofshape', 'App\Http\Controllers\AreaofshapeController@computeArea');
Route::post('/areaofshape', 'App\Http\Controllers\AreaofshapeController@computeArea');
Route::get('/signup', 'App\Http\Controllers\signupController@index');
Route::post('/signup', 'App\Http\Controllers\signupController@displayInfor');
Route::get('show', 'App\Http\Controllers\showProductController@show');
Route::post('show', 'App\Http\Controllers\showProductController@displayInfor');
Route::get('image', 'App\Http\Controllers\ImageUpdateController@imageUpload');
Route::post('image', 'App\Http\Controllers\ImageUpdateController@imageUploadPost');

Route::get('index', 'App\Http\Controllers\PageController@getIndex');
Route::get('loaisp/{type}', 'App\Http\Controllers\PageController@getLoai');
Route::get('chitietSp/{id}', 'App\Http\Controllers\PageController@getChitietSp');
Route::get('lienhe', 'App\Http\Controllers\PageController@getLienhe');
Route::get('about', 'App\Http\Controllers\PageController@getAbout');

//Giỏ hàng
Route::get('themsanpham/{id}', 'App\Http\Controllers\PageController@getAddtoCart');
Route::get('xoagiohang/{id}', 'App\Http\Controllers\PageController@getDelItemCart');
Route::get('dathang', 'App\Http\Controllers\PageController@thanhtoan');
Route::post('dathang', 'App\Http\Controllers\PageController@postCheckout');

// CRUD laravel
Route::get('indexadmin', 'App\Http\Controllers\PageController@getIndexAdmin');// gọi trang giao diện admin
Route::get('getadminadd', 'App\Http\Controllers\PageController@getAdminAdd');
Route::post('adminadd', 'App\Http\Controllers\PageController@postAdminAdd');
Route::get('getadminedit/{id}', 'App\Http\Controllers\PageController@getAdminEdit');
Route::post('adminedit', 'App\Http\Controllers\PageController@postAdminEdit');
Route::post('admindelete/{id}', 'App\Http\Controllers\PageController@postAdminDelete');
//export file
Route::get('bill', 'App\Http\Controllers\PageController@bill');
Route::get('downloadPdf', 'App\Http\Controllers\PageController@downloadPdf');
//paypal
Route::get('payment', 'App\Http\Controllers\PageController@payment');
Route::get('cancel', 'App\Http\Controllers\PageController@cancel');
Route::get('payment/{success}', 'App\Http\Controllers\PageController@success');

// Đăng ký thành viên
Route::get('register', 'App\Http\Controllers\RegisterController@getRegister');
Route::post('register', 'App\Http\Controllers\RegisterController@postRegister');
Route::get('comment', 'App\Http\Controllers\PageController@comment');
 
// Đăng nhập và xử lý đăng nhập
Route::get('login', [ 'as' => 'login', 'uses' => 'App\Http\Controllers\LoginController@getLogin']);
Route::post('login', [ 'as' => 'login', 'uses' => 'App\Http\Controllers\LoginController@postLogin']);
 
// Đăng xuất
//Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LogoutController@getLogout']);










