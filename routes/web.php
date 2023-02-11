<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SimController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\SimManager;
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

Route::get('dang-nhap', function(){
    return view('auth.login');
})->name('login');
Route::get('dang-ky', function(){
    return view('auth.register');
});

Route::get('quen-mat-khau',function(){
    return view('auth.forgot-password');
});
// Route::get('quen-mat-khau/{token}',function($token){
//     return view('auth.forgot-password',['token'=>$token]);
// });
Route::get('quen-mat-khau/{token}',[AuthController::class,'resetPassword']);

Route::get('dang-xuat',[UserController::class,'logout']);

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [HomeController::class,'index']);
    Route::get('yeu-cau-da-gui',[HomeController::class,'userRequest']);
    Route::get('danh-sach-sim',[SimController::class,'index']);
    Route::get('sim-da-huy',[SimController::class,'cancelSim']);
    Route::group(['middleware' => ['can:is-admin']], function() {
        Route::get('danh-sach-yeu-cau',[HomeController::class,'allRequest']);
        Route::get('lich-su-thay-doi/{sim}',[SimController::class,'history']);
        Route::get('lich-su-thay-doi',[SimController::class,'histories']);
        Route::get('sim-da-xoa',[SimController::class,'deletedSim']);
        Route::get('nha-mang',[SimController::class,'network']);
        Route::get('danh-sach-dai-ly',[UserController::class,'dealer']);
        Route::get('danh-sach-khach-hang',[UserController::class,'customer']);
        Route::get('danh-sach-quan-tri-vien',[UserController::class,'admin']);
        Route::get('dai-ly/{user}',[UserController::class,'partner']);
        Route::get('doanh-thu',[HomeController::class,'revenue']);

    });
});


