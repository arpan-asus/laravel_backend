<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'getHome'])->name('getHome');
Route::get('/cart/{product}', [SiteController::class, 'getAddCart'])->name('getAddCart');
Route::get('/addoption', [UserController::class, 'addoption']);


Route::get('/login', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
});


Route::get('/category', [UserController::class, 'getAddCategory'])->name('getAddCategory');//added page
Route::post('/addcategory', [UserController::class, 'PostAddCategory'])->name('PostAddCategory');//to database
Route::get('/manage/category', [UserController::class, 'getManageCategory'])->name('getManageCategory');
Route::get('/manage/category/delete/{category}', [UserController::class, 'getDeleteCategory'])->name('getDeleteCategory');
Route::get('/manage/category/edit{category}', [UserController::class, 'getEditCategory'])->name('getEditCategory');
Route::post('/category/edit/{categorys}', [UserController::class, 'postEditCategory'])->name('postEditCategory');

Route::get('/product', [ProductController::class, 'getAddProduct'])->name('getAddProduct');
Route::post('/addproduct', [ProductController::class, 'PostAddProduct'])->name('PostAddProduct');
Route::get('/manage/product', [ProductController::class, 'getManageProduct'])->name('getManageProduct');
Route::get('/product/delete/{product}', [ProductController::class, 'getDeleteProduct'])->name('getDeleteProduct');
Route::get('/product/edit{product}', [ProductController::class, 'getEditProduct'])->name('getEditProduct');
Route::post('/product/edit/{products}', [ProductController::class, 'postEditProduct'])->name('postEditProduct');

Route::get('/gallery', [GalleryController::class, 'getAddGallery'])->name('getAddGallery');
Route::post('/gallery/add', [GalleryController::class, 'getPostGallery'])->name('getPostGallery');
Route::get('/gallery/table', [GalleryController::class, 'getManageGallery'])->name('getManageGallery');
Route::get('/gallery/delete/{gallery}', [GalleryController::class, 'getDeleteGallery'])->name('getDeleteGallery');
Route::get('/edit/{gallery}', [GalleryController::class, 'getEditProduct'])->name('getEditProduct');
Route::post('/gallery/edit/{gallery}', [GalleryController::class, 'postEditGallery'])->name('postEditGallery');


