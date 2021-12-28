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
Route::get('/','IndexController@index')->name('MainPage');
Route::get('/about-us','IndexController@about')->name('AboutUs');
Route::get('/tentang-kami','IndexController@about')->name('TentangKami');
Route::get('/produk/{type}','IndexController@produkType')->name('ProdukType');
Route::post('/registrasi/{type}','IndexController@ProductRegister')->name('ProdukRegister');
Route::get('/produk','IndexController@produk')->name('ProdukView');
Route::get('/contact-us','IndexController@contactUs')->name('ContactUs');
Route::post('/contact-us','IndexController@SendContactUs')->name('SendContactUs');
Route::get('/faq','IndexController@Faq')->name('Faq');
Route::get('/test','IndexController@test')->name('test');

Route::group(['prefix'=>'nesapi','as'=>'InternalAPI.','excluded_middleware'=>['web']],function(){
    Route::namespace('InternalAPI')->group(function(){
        Route::get('/','HomeController@index')->name('home');
        Route::get('/checkValidate','HomeController@checkValidate')->name('.CheckValidate')->middleware('WebConfigCheck');

        Route::group(['prefix' => 'banner','namespace'=>'banner','as'=>'banner.','middleware'=> ['WebConfigCheck']], function(){
            Route::post('/listBanner','BannerController@index')->name('Home');
        });
    });
});
Route::group(['prefix' => 'nesadminsite'], function () {
    Auth::routes();
    Route::middleware('auth')->namespace('Admin')->group(function(){
        Route::get('website/','HomeController@autoRedirect')->name('AutoRedirect');
        Route::get('/', 'HomeController@index')->name('home');

        Route::group(['prefix' => 'banner','as'=>'banner.','middleware'=>['CheckWebsite']], function(){
            Route::get('/{data}','BannerController@index')->name('home');
            Route::post('/{data}/detail','BannerController@show')->name('detail');
            Route::post('/{data}/update','BannerController@edit')->name('edit');
            Route::post('/{data}/add','BannerController@store')->name('add');
            Route::post('/{data}/delete','BannerController@destroy')->name('delete');
            Route::post('/{data}/active','BannerController@active')->name('active');
        });
        Route::group(['prefix'=>'produk','as'=>'produk.','middleware'=>['CheckWebsite']],function(){
            Route::get('/{data}','ProdukController@index')->name('home');
            Route::post('/{data}/detail','ProdukController@show')->name('detail');
            Route::post('/{data}/update','ProdukController@edit')->name('edit');
            Route::post('/{data}/add','ProdukController@store')->name('add');
            Route::post('/{data}/delete','ProdukController@destroy')->name('delete');
            Route::post('/{data}/active','ProdukController@active')->name('active');
        });
        // Route::get('website/produk', 'ProdukController@index')->name('Produk');
        // Route::get('website/produk/detail/{id}', 'ProdukController@show')->name('ProdukDetail');
        // Route::post('website/produk/edit', 'ProdukController@edit')->name('ProdukEdit');
        // Route::post('website/produk/add', 'ProdukController@store')->name('ProdukAdd');
        // Route::post('website/produk/add/subproduk', 'ProdukController@subProdukAdd')->name('subProdukAdd');
        // Route::post('website/produk/delete', 'ProdukController@destroy')->name('ProdukDelete');
        // Route::post('website/produk/active', 'ProdukController@active')->name('ProdukActive');
        // Route::post('website/produk/delete/subproduk','ProdukController@subProdukDelete')->name('subProdukDelete');
        // Route::post('website/produk/delete/foto','ProdukController@DeleteImg')->name('ImgDelete');

        // Route::get('website/contactus', 'ContactUsController@index')->name('ContactUsAdmin');

        // Route::get('website/faq', 'FaqController@index')->name('FaqAdmin');
        // Route::post('website/faq/add/{type}','FaqController@Add')->name('FaqAdmin.add');
        // Route::post('website/faq/delete','FaqController@FaqDelete')->name('FaqAdmin.delete');
        // Route::get('website/faq/detail/{type}/{id}','FaqController@FaqDetail')->name('FaqAdmin.detail');
        // Route::post('website/faq/edit/{type}','FaqController@FaqEdit')->name('FaqAdmin.edit');
        // Route::post('website/faq/active/{type}','FaqController@FaqActive')->name('FaqAdmin.active');

        // Route::post('website/subfaq/delete','FaqController@SubFaqDelete')->name('SubFaqAdmin.delete');


        // Route::get('user/profile','UserController@userProfile')->name('userProfile');
        // Route::post('user/profile/update','UserController@userProfileUpdate')->name('userProfileUpdate');

        Route::group(['prefix' => 'configsub','as'=>'ConfigWebsite.'], function(){
            Route::get('/','WebsiteController@index')->name('Home');
            Route::post('/detail','WebsiteController@show')->name('Detail');
            Route::post('/update','WebsiteController@edit')->name('Update');
            Route::post('/add','WebsiteController@store')->name('Add');
            Route::post('/delete','WebsiteController@destroy')->name('Delete');
            Route::post('/refreshtoken','WebsiteController@refreshToken')->name('refreshToken');
        });
        // Route::get('/configsub','WebsiteController@index')->name('ConfigWebsite');
        // Route::get('/configsub','WebsiteController@index')->name('ConfigWebsite');
        // Route::middleware('FilterRole')->group(function(){
        //     Route::get('user', 'UserController@index')->name('User');
        //     Route::post('user/add', 'UserController@store')->name('AddUser');
        //     Route::post('user/detail', 'UserController@show')->name('DetailUser');
        //     Route::post('user/active', 'UserController@Active')->name('ActiveDeactiveUser');
        //     Route::post('user/edit', 'UserController@edit')->name('EditUser');
        // });
    });

});
