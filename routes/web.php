<?php

use App\models\City;
use App\models\SellType;
use App\models\ShopType;
use App\models\Specialization;
use http\Client\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() ,
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function(){ //...


 Route::get('/product/details',function(){
     return view('site.productDetails');
 })->name('product.details');
Route::post('search/subcategory/products','Site\ProductController@SearchProducts')->name('subcategory-search-products');

Route::get('/wishlist','Site\HomeController@wishlist')->name('wishlist');
Route::get('/wishlist/{action}/{product_id}','Site\HomeController@Add_Remove_wishlist')->name('wishlist.action');
Route::get('/search/products/{key}','Site\HomeController@search_products')->name('search.action');


Route::get('/subscription',function(){
    return view('site.subscription');
})->name('subscription');

Route::get('/login',function(){
    return view('site.login');
})->name('login');




Route::get('/register/info',function(){
    return view('site.registerInfo');
})->name('register.info');

Route::get('/register/subscription',function(){
    return view('site.registerSubscription');
})->name('register.subscription');

Route::get('/register/address',function(){
    return view('site.registerAddress');
})->name('register.address');

Route::get('/register/social',function(){
    return view('site.registerSocial');
})->name('register.social');




Route::get('/spareParts/getSections', 'Admin\sparePartsController@getSections');
Route::get('/generators/getSections', 'Admin\ProductController@getSections');

Route::get('/getSections', 'Admin\ProductController@getSections');
Route::get('/getSectionstest', 'Admin\ProductController@getSectionstest');
Route::get('/getDistricts', 'Admin\ProductController@getDistricts');



/////////// site /////////////
Route::get('/category/{name}','Site\HomeController@category')->name('subcategory');
Route::get('/shops/{type}','Site\HomeController@ProfileWithCat')->name('type.ProfileWithCat');
Route::get('/sub/category/{type_category}','Site\HomeController@subCategory')->name('type.subcategory');
Route::get('/sub/category/search/{type_category}','Site\HomeController@subCategorySearch')->name('type.subcategory.view_search');

Route::get('/product/details/{product}','Site\HomeController@product')->name('product.details');
Route::post('/product/search','Site\HomeController@searchProduct')->name('product.search');
Route::get('/product/edit/{id}','Site\HomeController@productEdit')->name('product.edit');

Route::post('/product/store','Site\HomeController@productUpdate')->name('product.details.update');

Route::get('/product/delete/image/{index}','Site\HomeController@productEdit')->name('product.image.delete');
Route::get('addVendorMarks/{vendor}','Site\HomeController@viewVendorMakes')->name('vendor.add.marks');
Route::get('handleVendorMark/{process}/{mark_id}','Site\HomeController@handleVendorMark')->name('vendor.handle.mark');


Route::get('all/shops','Site\HomeController@get_all_shops')->name('get_all_shops');
Auth::routes();

Route::get('view/login',function(){
    $cities = City::get();
    return view('auth.login',compact('cities'));
})->name('login');

Route::get('yeaThatBad',function(){
    return view('site.draft');
});

Route::get('/register/user/{type}','Auth\RegisterController@showRegisterForm')->name('register');
Route::post('/register/user/{type}','Auth\RegisterController@RegisterFormSubmit')->name('submit.register');


Route::post('view/login','Auth\LoginController@UserLogin')->name('auth.login');
Route::get('logout','Auth\LoginController@logout')->name('logout');

Route::get('/','Site\HomeController@index')->name('home');

Route::resource('site-products', 'Site\ProductController');
Route::get('site-products/create/{category}/{rent}', 'Site\ProductController@create')->name('site-products.create');
Route::post('getDistricts','Site\ProductController@getDistricts')->name('getDistricts');
Route::post('getProductSections','Site\ProductController@getProductSections')->name('getProductSections');
Route::get('profile/{type}/{id}','Site\ProfileController@viewProfile')->name('profile-index');

Route::post('contact','Site\HomeController@contact')->name('site.contact');
Route::get('edit/profile/{type}',function($type){
    $cities  =  City::get();
    $shopTypes  = ShopType::get();
    $category = SellType::where('category_id',3)->get();
    $specialization = Specialization::get();

    return view('site.editProfile',compact('type','cities','shopTypes','category','specialization'));
})->name('edit.profile');
Route::post('edit/profile/{type}','Site\HomeController@editProfile')->name('edit.profile.now');

Route::get('about',function(){
    return view('site.about');
})->name('about');
Route::get('contact',function(){
    return view('site.contact');
})->name('contact');
    Route::get('countries','Extract\ExtractCitiesController@countries');
});

Route::get('/change/country/{country}', function($country){
    session()->put('country',$country);
    return redirect()->back();
})->name('country.change.dropdown.post');


Route::get('/delete/country', function(){
    session()->forget('country');
    return redirect()->back();
})->name('country.change.dropdown.destroy');



Route::post('/change/make/{id}', function($id){
    session()->put('make_id',$id);
    return redirect()->back();
})->name('currency.change.dropdown.post');


Route::get('/change/product/sellType/{proId}/{sellTypeId}','Site\ProductController@changeProductSellType')->name('change.sellType.product');

Route::get('view123/d7k',function(){
    return rand(0,1);
});

Route::get('view123Slider/d7k',function(){
    return view('site.slider');
});


