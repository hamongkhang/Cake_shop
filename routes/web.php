<?php

Route::get('/user','PageController@index');
Route::get('/export/{user}','PageController@export')->name('export');



Route::get('home2', 'HomeController@testLang' );
Route::get('/', function () {
    return view('welcome');
});

Route::get('locale/{locale?}',function($locale){
	Session::put('locale',$locale);
	return redirect()->back();
});
 /*loginFacebook*/
Route::get('auth/facebook', 'FacebookAuthController@redirectToProvider')->name('facebook.login') ;
Route::get('auth/facebook/callback', 'FacebookAuthController@handleProviderCallback');
 /*...*/

Route::get('trang-chu','PageController@getIndex')->name('trangchu');
Route::get('cua-hang/{type?}','PageController@getProduct')->name('store');
Route::get('chi-tiet-san-pham/{id?}','PageController@getProductdetail')->name('productdetail');
Route::get('lien-he','ContactController@getContact')->name('contact');
Route::post('lien-he','ContactController@postContact');
Route::get('gioi-thieu','PageController@getAbout')->name('about');
Route::get('gio-hang','PageController@getCart');
Route::get('admin','AdminController@getAdmin')->name('admin');

/*Route quản trị Admin*/
    Route::prefix('admin')->middleware('CheckLoginAdmin')->group(function(){
	Route::get('danhmuc','CategoryController@category')->name('category');
	Route::get('sanpham','ProductController@products')->name('products');
	Route::get('slide','SlideController@slide')->name('slide');
	Route::get('dondathang','OderController@oder')->name('oder');
	/*Quản lý danh mục*/
	Route::group(['prefix'=>'danhmuc'],function(){
		/*thêm danh mục*/
		Route::get('add','CategoryController@getCategory')->name('add.category');
		Route::post('add','CategoryController@postCategory');
		/*sửa danh mục*/
		Route::get('edit/{id?}','CategoryController@getEdit')->name('edit.category');
		Route::post('edit/{id?}','CategoryController@postEdit');
		/*xóa danh mục*/
		Route::get('delete/{id?}','CategoryController@delete')->name('del.category');
	});

	/*Quản lý sản phẩm*/

	Route::group(['prefix'=>'sanpham'],function(){
		Route::get('all','ProductController@product')->name('product');
		
		/*thêm sản phẩm*/
		Route::get('add','ProductController@getproduct')->name('add.product');
		Route::post('add','ProductController@postproduct');
		/*sửa sản phẩm*/

		Route::get('edit/{id?}','ProductController@geteditproduct')->name('edit.product');
		Route::post('edit/{id?}','ProductController@posteditproduct');

		/*xóa sản phẩm*/

		Route::get('delete/{id?}','ProductController@deleteproduct')->name('delete.product');
	});
	/*quản lý đơn hàng*/

	Route::group(['prefix'=>'dondathang'],function(){
		Route::get('all','OderController@oder')->name('oder');
		Route::get('view/{id?}','OderController@getdetail')->name('view.oder');
		Route::post('view/{id?}','OderController@postdetail');
		Route::get('delete/{id?}','OderController@delete')->name('del.oder');

		Route::get('gui-mail-thong-bao','OderController@sendMailOder')->name('admin.email.sendMailOder');

	});


	/*Quản lý tin tức*/
	/*quản lí khách hàng*/
	Route::group(['prefix'=>'khachhang'],function(){		
		Route::get('all','UserController@user')->name('user');
	});

	/*Quản lí admin*/

	Route::group(['prefix'=>'nhanvien'],function(){		
		Route::get('all','AdminUserController@nhanvien')->name('nhanvien');
	});

	/*Quản lý kho*/
	Route::group(['prefix'=>'khohang'],function(){
		Route::get('all','WarehouseController@khohang')->name('khohang');
	});
	
	/*Trang ajax*/

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('soidtu/{iddanhmuc}','AjaxController@getIdtype');
	});

});




	Route::prefix('shopping')->group(function () {
	    Route::get('/add/{id?}','ShoppingcartController@addProduct')->name('addcart');
	    Route::get('/delete/{id?}','ShoppingcartController@deleteProduct')->name('deletecart');
	    Route::get('/danh-sach-gio-hang','ShoppingcartController@getList')->name('listcart');
		Route::get('/add2/{id?}','ShoppingcartController@addProduct2')->name('addcart2');
		Route::get('/danh-sach-yeu-thich','ShoppingcartController@getList2')->name('wishlist');
		Route::get('/delete2/{id?}','ShoppingcartController@deleteProduct2')->name('deletecart2');
	});

	Route::group(['prefix'=>'gio-hang','middleware'=>'CheckLoginUser'],function(){
		Route::get('dat-hang','ShoppingcartController@getCheckout')->name('checkout');
		Route::post('dat-hang','ShoppingcartController@postCheckout')->name('post.checkout');
	});

	/*đăng nhập /đăng ký admin*/
	Route::prefix('authenticate')->group(function(){
		Route::get('login','AdminController@getLogin')->name('auth.login');
		Route::post('login','AdminController@postLogin');
		Route::get('logout','AdminController@LogoutAdmin')->name('logout.admin'); 
	});
	Auth::routes(['verify' => true]);

	Route::group(['namespace'=>'Auth'],function(){
		/*reset mat khau*/
	Route::get('lay-lai-mat-khau','ForgotPasswordController@getFormResetPassword')->name('reset.password');
	Route::post('lay-lai-mat-khau','ForgotPasswordController@sendCodeReset');

	Route::get('password/reset','ForgotPasswordController@resetPassword')->name('get.link.reset.password');
	Route::post('password/reset','ForgotPasswordController@saveResetPassword');
		// Route::get('dang-ky','RegisterController@getRegister')->name('get.register');
		// Route::post('dang-ky','RegisterController@postRegister')->name('post.register');

		// Route::get('dang-nhap','LoginController@getLogin')->name('get.login');
		// Route::post('dang-nhap','LoginController@postLogin')->name('post.login');
		
	});
	Route::get('dang-xuat','PageController@getLogout')->name('logout');
	/*comment*/
	Route::post('comment/{id?}','CommentController@postComment');
	/*...*/
	Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

	Route::get('laravel-send-email', 'EmailController@sendEMail');