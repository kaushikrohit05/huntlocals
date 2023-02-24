<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Catlocseocontroller;
use App\Http\Controllers\PostController;

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

Route::get('/',[MainController::class,'index']);
//Route::get('/escorts',[CategoriesController::class,'category_escorts']);
//Route::get('/male-escorts',[CategoriesController::class,'category_male_escorts']);
//Route::get('/massage',[CategoriesController::class,'category_massage']);

 

Route::post('/search',[MainController::class,'search_ads']);


//Route::get('/ad/{id}',[MainController::class,'ad_detail']);

///////////////PAGES////////////
 Route::get('/page/terms-and-conditions',[PageController::class,'terms']);
 Route::get('/page/privacy-policy',[PageController::class,'privacy']);
 Route::get('/page/contact-us',[PageController::class,'contactus']);

Route::get('/page',[PageController::class,'notfound']);
Route::get('/404',[PageController::class,'notfound']);


Route::get('/login',[MainController::class,'login'])->name('login');
Route::post('/loginaction',[MainController::class,'login_action'])->name('loginaction');
Route::get('/signup',[MainController::class,'signup'])->name('signup');
Route::post('/registeraction',[MainController::class,'register_action']);
Route::get('/logout',[MainController::class,'logout'])->name('logout'); 

Route::get('/user/postadd',[MainController::class,'postadd']); 
Route::get('/user/adgallery/{id}',[MainController::class,'adgallery']);
Route::post('/user/savegallery/{id}',[MainController::class,'savegallery']);
Route::get('/user/postsuccess/',[MainController::class,'postsuccess']);
Route::get('/user/editad/{id}',[MainController::class,'editadd']);
Route::post('/user/updatead/{id}',[MainController::class,'update_user_ad']);
Route::get('/user/editgallery/{id}',[MainController::class,'editgallery']);
Route::get('/user/deleteadimage/{aid}/{id}',[MainController::class,'deleteadimage']);
Route::get('/user/deletead/{id}',[MainController::class,'delete_ad']);


Route::post('/user/savead',[MainController::class,'save_ad']);
Route::post('/user/saveadwithuser',[MainController::class,'new_user_new_ad']);

Route::group(['middleware'=>['UserCheck']], function(){

    Route::get('/myaccount',[MainController::class,'myaccount']);
    Route::get('/user/profile',[MainController::class,'profile']);
    Route::get('/user/ads',[MainController::class,'user_ads']);
    Route::get('/user/delete_account',[MainController::class,'delete_account']);


    
}); 

//////////////ADMIN ROUTES //////////////////////////////////////
Route::post('/admin/registeraction',[AdminController::class,'register_action'])->name('admin.registeraction');     
Route::post('/admin/loginaction',[AdminController::class,'login_action'])->name('admin.loginaction');
Route::get('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');

Route::group(['middleware'=>['AdminCheck']], function(){

    Route::get('/admin/register',[AdminController::class,'register'])->name('admin.register');
    Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
    

    Route::get('/admin',[AdminController::class,'index'])->name('dashboard');
    Route::get('/admin/pages',[AdminController::class,'pages'])->name('pages');

    Route::get('/admin/users',[UsersController::class,'index'])->name('users');
    Route::get('/admin/adduser',[UsersController::class,'add_user'])->name('adduser');
    Route::post('/admin/saveuser',[UsersController::class,'save_user'])->name('saveuser');
    Route::get('/admin/edituser/{id}',[UsersController::class,'edit_user'])->name('edituser');
    Route::post('/admin/updateuser/{id}',[UsersController::class,'update_user']);
    Route::get('/admin/deleteuser/{id}',[UsersController::class,'delete_user'])->name('deleteuser');

    
    Route::get('/admin/ads',[AdsController::class,'index'])->name('ads');
    Route::get('/admin/addad',[AdsController::class,'add_ad'])->name('addad');
    Route::post('/admin/savead',[AdsController::class,'save_ad']);
    Route::get('/admin/editad/{id}',[AdsController::class,'edit_ad'])->name('editad');
    Route::post('/admin/updatead/{id}',[AdsController::class,'update_ad']);
    Route::get('/admin/editgallery/{id}',[AdsController::class,'adgallery']);
    Route::get('/admin/deletead/{id}',[AdsController::class,'delete_ad'])->name('deletead');

    Route::get('/admin/categories',[CategoriesController::class,'index'])->name('categories');
    Route::get('/admin/addcategory',[CategoriesController::class,'add_category'])->name('addcategory');
    Route::post('/admin/savecategory',[CategoriesController::class,'save_category'])->name('savecategory');
    Route::get('/admin/editcategory/{id}',[CategoriesController::class,'edit_category'])->name('editcategory');
    Route::post('/admin/updatecategory/{id}',[CategoriesController::class,'update_category']);
    Route::get('/admin/deletecategory/{id}',[CategoriesController::class,'delete_category'])->name('deletecategory');  
    
    //// AJAX REQUEST ////
    Route::get('/admin/sortcategory/{id}/{value}',[CategoriesController::class,'sort_category']);
    Route::get('/admin/sortlocation/{id}/{value}',[LocationController::class,'sortlocation']);
    Route::get('/admin/featured_location/{id}/{value}',[LocationController::class,'featured_location']);
    //// END AJAX REQUEST ////

    Route::get('/admin/locations',[LocationController::class,'index'])->name('locations');
    Route::get('/admin/addlocation',[LocationController::class,'add_location'])->name('addlocation');
    Route::post('/admin/savelocation',[LocationController::class,'save_location'])->name('savelocation');
    Route::get('/admin/editlocation/{id}',[LocationController::class,'edit_location'])->name('editlocation');
    Route::post('/admin/updatelocation/{id}',[LocationController::class,'update_location']);
    Route::get('/admin/deletelocation/{id}',[LocationController::class,'delete_location'])->name('deletelocation');

    Route::get('/admin/pages',[PageController::class,'index'])->name('pages');
    Route::get('/admin/addpage',[PageController::class,'add_page'])->name('addpage');
    Route::post('/admin/savepage',[PageController::class,'save_page'])->name('savepage');
    Route::get('/admin/editpage/{id}',[PageController::class,'edit_page'])->name('editpage');
    Route::post('/admin/updatepage/{id}',[PageController::class,'update_page']);
    Route::get('/admin/deletepage/{id}',[PageController::class,'delete_page'])->name('deletepage');

    
    Route::get('/blog/{id}',[PostController::class,'blogdetail']);
    Route::get('/admin/posts',[PostController::class,'index'])->name('blogs');
    Route::get('/admin/addpost',[PostController::class,'add_post']);
    Route::post('/admin/savepost',[PostController::class,'save_post']);
    Route::get('/admin/editpost/{id}',[PostController::class,'edit_post']);
    Route::post('/admin/updatepost/{id}',[PostController::class,'update_post']);
    Route::get('/admin/deletepost/{id}',[PostController::class,'delete_post']);



    Route::get('/admin/language',[LanguageController::class,'index'])->name('language');
    Route::post('/admin/savelang',[LanguageController::class,'savelanguage']);
    Route::get('/admin/updatelang/{id}/{value}',[LanguageController::class,'updatelang']);

    Route::get('/admin/catlocseo',[Catlocseocontroller::class,'index'])->name('seodata');
    Route::get('/admin/addcatlocseo',[Catlocseocontroller::class,'add_catlocseo']);
    Route::post('/admin/savecatlocseo',[Catlocseocontroller::class,'save_catlocseo']);
    Route::get('/admin/editcatlocseo/{id}',[Catlocseocontroller::class,'edit_catlocseo']);
	Route::post('/admin/updatecatlocseo/{id}',[Catlocseocontroller::class,'update_catlocseo']);
    Route::get('/admin/updatecatlocseotitle/{id}/{val}',[Catlocseocontroller::class,'update_catlocseo_title']);
    Route::get('/admin/updatecatlocseodesc/{id}/{val}',[Catlocseocontroller::class,'update_catlocseo_desc']);
	Route::get('/admin/updatecatlocseolongdesc/{id}/{val}',[Catlocseocontroller::class,'update_catlocseo_long_desc']);
    Route::get('/admin/deletecatlocseo/{id}',[Catlocseocontroller::class,'delete_catlocseo']);

 
});

////// AJAX //////////
Route::get('/admin/getlocations/{id}',[LocationController::class,'getlocations']);
Route::get('/thankyou',[MainController::class,'registrationthankyou']);
Route::get('/verifyaccount/{id}',[MainController::class,'verifyaccount']);


Route::get('send-mail',[MainController::class,'sendmail']);
Route::get('/blog',[PostController::class,'bloglist']);
Route::get('/blog/{post}',[PostController::class,'blogDetail']);

Route::get('/{category}',[MainController::class,'category'])->name('adsbycategory');
Route::get('/{category}/{location}',[MainController::class,'category_location']);
Route::get('/{category}/{location}/{ad}',[MainController::class,'ad_detail_new']);
 
  
