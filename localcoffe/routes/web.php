<?php

use App\Http\Controllers\LockScreen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TanamanController;
use App\Http\Controllers\JadwalPanenController;
use App\Http\Controllers\JadwalPascapanenController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BuyerProductController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\Auth\ForgotPasswordController;



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
    return view('homepage');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------- home dashboard ------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ----------------------------- lock screen --------------------------------//
Route::get('lock_screen', [App\Http\Controllers\LockScreen::class, 'lockScreen'])->middleware('auth')->name('lock_screen');
Route::post('unlock', [App\Http\Controllers\LockScreen::class, 'unlock'])->name('unlock');

// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');

// ----------------------------- forget password ----------------------------//
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// ----------------------------- user profile ------------------------------//
Route::get('profile_user', [App\Http\Controllers\UserManagementController::class, 'profile'])->name('profile_user');
Route::post('profile_user/store', [App\Http\Controllers\UserManagementController::class, 'profileStore'])->name('profile_user/store');

// ----------------------------- user userManagement -----------------------//
Route::get('userManagement', [App\Http\Controllers\UserManagementController::class, 'index'])->middleware('auth')->name('userManagement');
Route::get('user/add/new', [App\Http\Controllers\UserManagementController::class, 'addNewUser'])->middleware('auth')->name('user/add/new');
Route::post('user/add/save', [App\Http\Controllers\UserManagementController::class, 'addNewUserSave'])->name('user/add/save');
Route::get('view/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewDetail'])->middleware('auth');
Route::post('update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('update');
Route::get('delete_user/{id}', [App\Http\Controllers\UserManagementController::class, 'delete'])->middleware('auth');
Route::get('activity/log', [App\Http\Controllers\UserManagementController::class, 'activityLog'])->middleware('auth')->name('activity/log');
Route::get('activity/login/logout', [App\Http\Controllers\UserManagementController::class, 'activityLogInLogOut'])->middleware('auth')->name('activity/login/logout');

Route::get('change/password', [App\Http\Controllers\UserManagementController::class, 'changePasswordView'])->middleware('auth')->name('change/password');
Route::post('change/password/db', [App\Http\Controllers\UserManagementController::class, 'changePasswordDB'])->name('change/password/db');

// ----------------------------- form staff ------------------------------//
Route::get('form/staff/new', [App\Http\Controllers\FormController::class, 'index'])->middleware('auth')->name('form/staff/new');
Route::post('form/save', [App\Http\Controllers\FormController::class, 'saveRecord'])->name('form/save');
Route::get('form/view/detail', [App\Http\Controllers\FormController::class, 'viewRecord'])->middleware('auth')->name('form/view/detail');
Route::get('form/view/detail/{id}', [App\Http\Controllers\FormController::class, 'viewDetail'])->middleware('auth');
Route::post('form/view/update', [App\Http\Controllers\FormController::class, 'viewUpdate'])->name('form/view/update');
Route::get('delete/{id}', [App\Http\Controllers\FormController::class, 'viewDelete'])->middleware('auth');


// ----------------------------- form karyawan ------------------------------//
Route::get('/karyawan', [App\Http\Controllers\KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/create', [App\Http\Controllers\KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan', [App\Http\Controllers\KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{id}', [App\Http\Controllers\KaryawanController::class, 'show'])->name('karyawan.show');
Route::get('/karyawan/{id}/edit', [App\Http\Controllers\KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{id}', [App\Http\Controllers\KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{id}', [App\Http\Controllers\KaryawanController::class, 'destroy'])->name('karyawan.destroy');



// ----------------------------- product ------------------------------//
Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.index');
Route::get('/products/beli/{id}', [App\Http\Controllers\ProductController::class, 'beli'])->name('products.beli');
Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('products.create');
Route::post('/products', [App\Http\Controllers\ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('products.show');
Route::get('/products/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/buyer/products', [App\Http\Controllers\BuyerProductController::class,'index'])->name('buyer.products.index');






// ----------------------------- jadwalpanen ------------------------------//

// Route::get('panen', [App\Http\Controllers\PanenController::class, 'index'])->middleware('auth')->name('panen');
// Route::get('panen/create', [App\Http\Controllers\PanenController::class, 'create'])->middleware('auth')->name('panen/create');
// Route::post('panen', [App\Http\Controllers\PanenController::class, 'store'])->middleware('auth')->name('panen/store');
// Route::get('panen/{panen}/edit', [App\Http\Controllers\PanenController::class, 'edit'])->name('panen/edit');
// Route::put('panen/{panen}', [App\Http\Controllers\PanenController::class, 'update'])->name('panen/update');
// Route::delete('panen/{panen}', [App\Http\Controllers\PanenController::class, 'destroy'])->name('panen/destroy');



// ----------------------------- jadwal ------------------------------//
Route::get('/tanaman', [App\Http\Controllers\TanamanController::class, 'index'])->middleware('auth')->name('tanaman.index');
Route::get('/tanaman/create', [App\Http\Controllers\TanamanController::class, 'create'])->middleware('auth')->name('tanaman.create');
Route::post('/tanaman', [App\Http\Controllers\TanamanController::class, 'store'])->middleware('auth')->name('tanaman.store');
Route::get('/tanaman/{id}/edit', [App\Http\Controllers\TanamanController::class, 'edit'])->name('tanaman.edit');
Route::put('/tanaman/{id}', [App\Http\Controllers\TanamanController::class, 'update'])->name('tanaman.update');
Route::delete('/tanaman/{id}', [App\Http\Controllers\TanamanController::class, 'destroy'])->name('tanaman.destroy');

Route::get('/jadwal_panen', [App\Http\Controllers\JadwalPanenController::class, 'index'])->middleware('auth')->name('jadwal_panen.index');
Route::get('/jadwal_panen/create', [App\Http\Controllers\JadwalPanenController::class, 'create'])->middleware('auth')->name('jadwal_panen.create');
Route::post('/jadwal_panen', [App\Http\Controllers\JadwalPanenController::class, 'store'])->middleware('auth')->name('jadwal_panen.store');
Route::get('/jadwal_panen/{id}/edit', [App\Http\Controllers\JadwalPanenController::class, 'edit'])->name('jadwal_panen.edit');
Route::put('/jadwal_panen/{id}', [App\Http\Controllers\JadwalPanenController::class, 'update'])->name('jadwal_panen.update');
Route::delete('/jadwal_panen/{id}', [App\Http\Controllers\JadwalPanenController::class, 'destroy'])->name('jadwal_panen.destroy');

Route::get('/jadwal_pascapanen', [App\Http\Controllers\JadwalPascapanenController::class, 'index'])->middleware('auth')->name('jadwal_pascapanen.index');
Route::get('/jadwal_pascapanen/create', [App\Http\Controllers\JadwalPascapanenController::class, 'create'])->middleware('auth')->name('jadwal_pascapanen.create');
Route::post('/jadwal_pascapanen', [App\Http\Controllers\JadwalPascapanenController::class, 'store'])->middleware('auth')->name('jadwal_pascapanen.store');
Route::get('/jadwal_pascapanen/{id}/edit', [App\Http\Controllers\JadwalPascapanenController::class, 'edit'])->name('jadwal_pascapanen.edit');
Route::put('/jadwal_pascapanen/{id}', [App\Http\Controllers\JadwalPascapanenController::class, 'update'])->name('jadwal_pascapanen.update');
Route::delete('/jadwal_pascapanen/{id}', [App\Http\Controllers\JadwalPascapanenController::class, 'destroy'])->name('jadwal_pascapanen.destroy');

// ----------------------------- cart ------------------------------//


Route::get('/cart', [App\Http\Controllers\CartController::class,'index'])->name('cart.index');
Route::post('/cart/{product_id}',  [App\Http\Controllers\CartController::class,'add'])->name('cart.add');
Route::delete('/cart/{product_id}', [App\Http\Controllers\CartController::class,'remove'])->name('cart.remove');

Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::get('/payment/{order}', 'PaymentController@index')->name('payment.index');
Route::post('/payment/{order}', 'PaymentController@store')->name('payment.store');
