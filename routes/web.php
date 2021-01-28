<?php

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

Route::get('/','fontend\PageController@index')->name('index');

Route::prefix('admin')->group(function () { 
	//admin login
 Route::get('/loginform', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/login-submit', 'Auth\Admin\LoginController@login')->name('admin.login.submit'); 
Route::post('/admin-logout', 'Auth\Admin\LoginController@logout')->name('admin.logout'); 
Route::get('/', 'backend\Pagecontroller@index')->name('admin.index'); 
Route::get('/showlogin', 'Auth\Admin\LoginController@showLoginForm')->name('admin.login');
	//for forgot password
//email send
Route::get('/password/reset', 'Auth\Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/resetUpdate', 'Auth\Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
//reset password
Route::get('/password/reset/{token}', 'Auth\Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('/password/reset/post', 'Auth\Admin\ResetPasswordController@reset')->name('admin.password.reset.post');
 });

//for Order
Route::prefix('admin-order')->group(function (){ 
Route::get('/', 'backend\OrderController@index')->name('order.index'); 
Route::get('/show/{id}', 'backend\OrderController@show')->name('order.show'); 
Route::post('/update/{id}', 'fontend\CartController@update')->name('carts.update'); 
Route::post('/indexdelete/{id}', 'backend\OrderController@destroy')->name('admin.order.delete');  
Route::post('/completeOrder/{id}', 'backend\OrderController@CompleteOrder')->name('admin.order.complete');  
Route::post('/paidOrder/{id}', 'backend\OrderController@PaidOrder')->name('admin.order.paid');  
Route::post('/delete/{id}', 'fontend\CartController@destroy')->name('carts.delete');  
});
//end order


//for banner
Route::prefix('admin-banner')->group(function (){ 
Route::get('/index', 'backend\Bannercontroller@index')->name('banner.index'); 
Route::get('/show/{id}', 'backend\Bannercontroller@show')->name('banner.show'); 
Route::post('/update/{id}', 'backend\Bannercontroller@update')->name('banner.update'); 
Route::post('/action/{id}', 'backend\Bannercontroller@edit')->name('banner.action'); 
});
//end banner
//for product
Route::prefix('admin-product')->group(function (){ 
Route::get('/create', 'backend\ProductController@create')->name('product.create'); 
Route::post('/store', 'backend\ProductController@store')->name('product.store'); 
Route::get('/show/{id}', 'backend\Bannercontroller@show')->name('banner.show'); 
Route::post('/update/{id}', 'backend\Bannercontroller@update')->name('banner.update'); 
Route::post('/action/{id}', 'backend\Bannercontroller@edit')->name('banner.action'); 
});
//end product

//for Brand
Route::prefix('admin-brand')->group(function (){ 
Route::get('/create', 'backend\BrandController@create')->name('brand.create'); 
Route::post('/store', 'backend\BrandController@store')->name('brand.store');

Route::get('/show/{id}', 'backend\Bannercontroller@show')->name('banner.show'); 
Route::post('/update/{id}', 'backend\Bannercontroller@update')->name('banner.update'); 
Route::post('/action/{id}', 'backend\Bannercontroller@edit')->name('banner.action'); 
});
//end Brand

//for category
Route::prefix('admin-category')->group(function (){ 
Route::get('/create', 'backend\CategoryController@create')->name('category.create'); 
Route::post('/store', 'backend\CategoryController@store')->name('category.store'); 
Route::get('/show/{id}', 'backend\Bannercontroller@show')->name('banner.show'); 
Route::post('/update/{id}', 'backend\Bannercontroller@update')->name('banner.update'); 
Route::post('/action/{id}', 'backend\Bannercontroller@edit')->name('banner.action'); 
});
//end category
//for User
Route::prefix('user')->group(function (){ 
Route::get('/verify/{token}', 'fontend\VerificationController@verify')->name('user.verification'); 
Route::get('/dashboard', 'fontend\UsersController@index')->name('user.dashboard'); 
Route::get('/profile', 'fontend\UsersController@profile')->name('user.profile'); 
Route::get('/edit_picture_password', 'fontend\UsersController@edit_picture_password')->name('user.picture_password'); 

});
//end User
//for division
Route::prefix('division')->group(function (){ 
Route::get('/create', 'backend\DivisionsController@create')->name('division.create'); 
Route::post('/store', 'backend\DivisionsController@store')->name('division.store');  
});
//end division
//for Districs
Route::prefix('districs')->group(function (){ 
Route::get('/create', 'backend\DistricsController@create')->name('districs.create'); 
Route::post('/store', 'backend\DistricsController@store')->name('districs.store');  
});
//end Districs


//fontend
Route::prefix('product')->group(function (){ 
Route::get('/', 'fontend\ProductController@index')->name('product');   
Route::get('/show/{slug}', 'fontend\ProductController@show')->name('products.show');   
Route::get('/search', 'fontend\PageController@search')->name('search');   
});
//category
Route::prefix('category')->group(function (){ 
Route::get('/', 'fontend\ProductController@index')->name('category.index');   
Route::get('/show/{id}', 'fontend\CategoryController@show')->name('category.show');  
});
// for cart route

Route::prefix('cart')->group(function (){ 
Route::get('/', 'fontend\CartController@show')->name('carts');
//Route::post('/store', 'fontend\CartController@store')->name('carts.store');  
Route::post('/cartupdate/{cartsid}','fontend\CartController@update')->name('carts.update'); 
Route::post('/delete/{id}', 'fontend\CartController@destroy')->name('carts.delete'); 
});
//end cart
//for checkout
Route::prefix('checkout')->group(function (){ 
Route::get('/', 'fontend\CheckoutController@index')->name('checkouts'); 
Route::post('/store', 'fontend\CheckoutController@store')->name('checkout.store'); 
Route::post('/update/{cartid}', 'fontend\CartController@update')->name('carts.update'); 
Route::post('/delete/{id}', 'fontend\CartController@destroy')->name('carts.delete'); 
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/getdistrics/{id}', function ($id) {
    return json_encode(App\Distric::where('divistion_id',$id)->get());
});
