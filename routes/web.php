<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\DistrictController;
use App\Http\Controllers\backend\SubDistrictController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\WebsiteController;
use App\Http\Controllers\backend\GalleryController;
use App\Http\Controllers\backend\AdsController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\frontend\ExtraController;

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
    return view('main.home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


//admin route

Route::get('/user/logout',[AdminController::class, 'adminlogout'])->name('user.logout');


//admin category route

Route::get('/category/all',[CategoryController::class, 'allCategory'])->name('all.categories');


Route::get('/category/add',[CategoryController::class, 'addCategory'])->name('add.categories');


Route::post('/category/store',[CategoryController::class, 'storeCategory'])->name('store.categories');


Route::get('/category/edit/{id}',[CategoryController::class, 'editCategory'])->name('edit.categories');

Route::post('/category/update/{id}',[CategoryController::class, 'updateCategory'])->name('update.categories');
Route::get('/category/delete/{id}',[CategoryController::class, 'deleteCategory'])->name('delete.categories');

//admin subcategory route


Route::get('/subcategory/all',[SubCategoryController::class, 'allSubCategory'])->name('all.subcategories');


Route::get('/subcategory/add',[SubCategoryController::class, 'addSubCategory'])->name('add.subcategories');


Route::post('/subcategory/store',[SubCategoryController::class, 'storeSubCategory'])->name('store.subcategories');


Route::get('/subcategory/edit/{id}',[SubCategoryController::class, 'editSubCategory'])->name('edit.subcategories');

Route::post('/subcategory/update/{id}',[SubCategoryController::class, 'updateSubCategory'])->name('update.subcategories');

Route::get('/subcategory/delete/{id}',[SubCategoryController::class, 'deleteSubCategory'])->name('delete.subcategories');


//admin district route


Route::get('/districts/all',[DistrictController::class, 'allDistrict'])->name('all.districts');


Route::get('/districts/add',[DistrictController::class, 'addDistrict'])->name('add.districts');


Route::post('/districts/store',[DistrictController::class, 'storeDistrict'])->name('store.districts');


Route::get('/districts/edit/{id}',[DistrictController::class, 'editDistrict'])->name('edit.districts');
Route::post('/districts/update/{id}',[DistrictController::class, 'updateDistrict'])->name('update.districts');

Route::get('/districts/delete/{id}',[DistrictController::class, 'deleteDistrict'])->name('delete.districts');



//admin subDistrict route


Route::get('/subdistricts/all',[SubDistrictController::class, 'allSubDistrict'])->name('all.subdistricts');


Route::get('/subdistricts/add',[SubDistrictController::class, 'addSubDistrict'])->name('add.subdistricts');


Route::post('/subdistricts/store',[SubDistrictController::class, 'storeSubDistrict'])->name('store.subdistricts');


Route::get('/subdistricts/edit/{id}',[SubDistrictController::class, 'editSubDistrict'])->name('edit.subdistricts');

Route::post('/subdistricts/update/{id}',[SubDistrictController::class, 'updateSubDistrict'])->name('update.subdistricts');
Route::get('/subdistricts/delete/{id}',[SubDistrictController::class, 'deleteSubDistrict'])->name('delete.subdistricts');

//admin Posts route


Route::get('/posts/all',[PostController::class, 'allPost'])->name('all.posts');


Route::get('/posts/add',[PostController::class, 'addPost'])->name('add.posts');


Route::post('/posts/store',[PostController::class, 'storePost'])->name('store.posts');


Route::get('/posts/edit/{id}',[PostController::class, 'editPost'])->name('edit.posts');

Route::post('/posts/update/{id}',[PostController::class, 'updatePost'])->name('update.posts');
Route::get('/posts/delete/{id}',[PostController::class, 'deletePost'])->name('delete.posts');

//jason Data for category and district

Route::get('/get/subcategory/{category_id}',[PostController::class, 'getSubcategory']);

Route::get('/get/subdistrict/{district_id}',[PostController::class, 'getSubDistrict']);

//admin Setting route

Route::get('/get/social',[SettingController::class, 'getSocials'])->name('all.socials');

Route::post('/update/social/{id}',[SettingController::class, 'updateSocials'])->name('update.socials');
Route::get('/get/seos',[SettingController::class, 'getSeos'])->name('all.seos');
Route::post('/update/seos/{id}',[SettingController::class, 'updateSeos'])->name('update.seos');

Route::get('/get/livetvs',[SettingController::class, 'getLivetvs'])->name('all.livetvs');
Route::post('/update/livetvs/{id}',[SettingController::class, 'updateLivetvs'])->name('update.livetvs');

Route::get('/get/notices',[SettingController::class, 'getNotices'])->name('all.notices');
Route::post('/update/notices/{id}',[SettingController::class, 'updateNotices'])->name('update.notices');



//admin Gallery route

Route::get('/photos/all',[GalleryController::class, 'getAllPhotos'])->name('all.photos');
Route::get('/photos/add',[GalleryController::class, 'getAddPhotos'])->name('add.photos');

Route::post('/photos/store',[GalleryController::class, 'getStorePhotos'])->name('store.photo');

Route::get('/videos/add',[GalleryController::class, 'getAddVideos'])->name('add.videos');
Route::get('/videos/all',[GalleryController::class, 'getAllVideos'])->name('all.videos');
Route::post('/videos/store',[GalleryController::class, 'getStoreVideos'])->name('store.videos');

//admin website route
Route::get('/website/all',[WebsiteController::class, 'getAllWebsites'])->name('all.websites');
Route::get('/website/add',[WebsiteController::class, 'getAddWebsites'])->name('add.websites');
Route::get('/website/update',[WebsiteController::class, 'getEditWebsites'])->name('edit.websites');
Route::get('/website/delete',[WebsiteController::class, 'getDeteWebsites'])->name('delete.websites');

Route::post('/website/store',[WebsiteController::class, 'StoreWebsites'])->name('store.website');


//main frintend  lang controller
Route::get('/get/hindi',[ExtraController::class, 'hindiLang'])->name('lang.hindi');

Route::get('/get/english',[ExtraController::class, 'englishLang'])->name('lang.english');

//single post page


Route::get('view/post/{id}',[ExtraController::class, 'singlePost']);


//postcategory and subcategory pages


Route::get('category/post/{id}/{category_en}',[ExtraController::class, 'catpost']);

Route::get('subcategory/post/{id}/{subcategory_en}',[ExtraController::class, 'subcatpost']);


//search district in homepage
Route::get('/get/subdistrict/frontend/{district_id}',[ExtraController::class, 'subdistrictfront']);

Route::get('/search/district',[ExtraController::class, 'searchdistrict'])->name('searchbydistrict');

//Ads controller
Route::get('/ads/all',[AdsController::class, 'getAllAds'])->name('all.ads');
Route::get('/ads/add',[AdsController::class, 'getAddAds'])->name('add.ads');

Route::post('/ads/store',[AdsController::class, 'getStoreAds'])->name('store.ad');


//writer controller

Route::get('/add/writer',[RoleController::class, 'addwriter'])->name('addwriter');

Route::get('/all/writer',[RoleController::class, 'allwriter'])->name('allwriter');

Route::post('/store/writter',[RoleController::class, 'storewriter'])->name('store.writer');

Route::get('/edit/writer/{id}',[RoleController::class, 'editwriter'])->name('edit.users');
Route::post('/update/writter/{id}',[RoleController::class, 'updatewriter'])->name('update.writer');
Route::get('/delete/writer',[RoleController::class, 'deletewriter'])->name('delete.users');
