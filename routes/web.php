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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login','UserController@getLoginAdmin');

Route::post('admin/login','UserController@postLoginAdmin');

Route::get('admin/logout','UserController@logoutAdmin');

Route::group(['prefix' => 'admin', 'middleware' => 'CheckAdminLogin'], function (){
    Route::get('dashboard', 'DashboardController@index');

    Route::group(['prefix'=>'category'], function(){

        Route::get('index','CategoryController@index');

        Route::get('create','CategoryController@getCreate');

        Route::post('create','CategoryController@postCreate');

        Route::get('update/{id}','CategoryController@getUpdate');

        Route::post('update/{id}','CategoryController@postUpdate');

        Route::any('delete/{id}','CategoryController@delete');
    });

    Route::group(['prefix'=>'product'], function(){

        Route::get('index','ProductController@index');

        Route::get('create','ProductController@getCreate');

        Route::post('create','ProductController@postCreate');

        Route::get('detail/{id}','ProductController@detail');

        Route::get('image-detail/{id}','ProductController@imageDetail');

        Route::get('update/{id}','ProductController@getUpdate');

        Route::post('update/{id}','ProductController@postUpdate');

        Route::get('active/{action}/{id}','ProductController@Active');

        Route::any('delete/{id}','ProductController@delete');
    });

    Route::group(['prefix'=>'product-image'], function(){

        Route::get('update/{id}','ProductImageController@getUpdate');

        Route::post('update/{id}','ProductImageController@postUpdate');
    });

    Route::group(['prefix'=>'size'], function(){

        Route::get('index','SizeController@index');

        Route::get('create','SizeController@getCreate');

        Route::post('create','SizeController@postCreate');

        Route::any('delete/{id}','SizeController@delete');
    });

    Route::group(['prefix'=>'supplier'], function(){

        Route::get('index','SupplierController@index');

        Route::get('create','SupplierController@getCreate');

        Route::post('create','SupplierController@postCreate');

        Route::get('update/{id}','SupplierController@getUpdate');

        Route::post('update/{id}','SupplierController@postUpdate');

        Route::any('delete/{id}','SupplierController@delete');
    });

    Route::group(['prefix'=>'order'], function(){

        Route::get('index','OrderController@index');

        Route::get('detail/{id}','OrderController@detail');

        Route::get('handling/{action}/{id}','OrderController@getUpdate');

        Route::any('delete/{id}','OrderController@delete');
    });

    Route::group(['prefix'=>'banner'], function(){

        Route::get('index','BannerController@index');

        Route::get('create','BannerController@getCreate');

        Route::post('create','BannerController@postCreate');

        Route::get('update/{id}','BannerController@getUpdate');

        Route::post('update/{id}','BannerController@postUpdate');

        Route::get('active/{action}/{id}','BannerController@Active');

        Route::any('delete/{id}','BannerController@delete');
    });

    Route::group(['prefix'=>'user'], function(){

        Route::get('index','UserController@index');

        Route::get('create','UserController@getCreate');

        Route::post('create','UserController@postCreate');

        Route::get('detail/{id}','UserController@detail');

        Route::get('update/{id}','UserController@getUpdate');

        Route::post('update/{id}','UserController@postUpdate');

        Route::get('active/{action}/{id}','UserController@Active');

        Route::any('delete/{id}','UserController@delete');
    });

    Route::group(['prefix'=>'contact'], function(){

        Route::get('index','ContactController@index');

        Route::get('detail/{id}','ContactController@detail');

        Route::any('delete/{id}','ContactController@delete');
    });

    Route::group(['prefix'=>'inventory'], function(){

        Route::get('index','InventoryController@index');
    });

    Route::group(['prefix'=>'revenue'], function(){

        Route::get('index','RevenueController@index');
    });

    Route::group(['prefix'=>'blog'], function(){

        Route::get('index','BlogController@index');

        Route::get('create','BlogController@getCreate');

        Route::post('create','BlogController@postCreate');

        Route::get('update/{id}','BlogController@getUpdate');

        Route::post('update/{id}','BlogController@postUpdate');

        Route::get('active/{action}/{id}','BlogController@Active');

        Route::any('delete/{id}','BlogController@delete');
    });
});

Route::get('home','PagesController@index');

Route::get('shop','PagesController@Shop');

Route::get('category/{id}', 'PagesController@Category');

Route::get('product/{id}', 'PagesController@product');

Route::post('product/{id}', 'PagesController@postProduct');

Route::get('login', 'PagesController@getLogin');

Route::post('login', 'PagesController@postLogin');

Route::get('register', 'PagesController@getRegister');

Route::post('register', 'PagesController@postRegister');

Route::get('register/verify/{code}', 'PagesController@verify');

Route::get('logout', 'PagesController@Logout');

Route::get('about-us','PagesController@AboutUs');

Route::get('contact','PagesController@Contact');

Route::post('contact','PagesController@postContact');

Route::get('wishlist/{id}', 'PagesController@WishList');

Route::get('add-cart/{id}', 'PagesController@AddToCart');

Route::get('update-cart', 'PagesController@UpdateCart');

Route::get('remove-cart/{id}', 'PagesController@RemoveCart');

Route::get('cart', 'PagesController@Cart');

Route::get('checkout', 'PagesController@GetPayment');

Route::post('checkout', ['as' => 'checkout', 'uses' => 'PagesController@PostPayment']);

Route::get('complete-order/{id}', 'PagesController@CompleteOrder')->name('complete-order');

Route::get('blog', 'PagesController@blog');

Route::get('single-blog/{id}', 'PagesController@getSingleBlog');

Route::post('single-blog/{id}', 'PagesController@postSingleBlog');

Route::get('shopping-guide', 'PagesController@ShoppingGuide');

Route::get('payment', 'PagesController@Payments');

Route::get('information-security', 'PagesController@InformationSecurity');

Route::get('warranty-policy', 'PagesController@WarrantyPolicy');

Route::get('shipping-policy', 'PagesController@ShippingPolicy');

Route::get('exchange-policy', 'PagesController@ExchangePolicy');

Route::get('my-account', 'PagesController@MyAccount');

Route::post('check-order', 'PagesController@CheckOrder');

Route::post('search', 'PagesController@postSearch');
