<?php

use App\Http\Controllers\admin\admincontroller;
use App\Http\Controllers\kioskcontrollrt;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\loketcontroller;
use Illuminate\Support\Facades\Route;

// ==============================================
//|   untuk login                               |
// ---------------------------------------------

Route::get('', function () {
    return view('login');
})->name('login');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', function () {
    return 'Welcome to dashboard';
})->middleware('auth');
Route::post('/login', [logincontroller::class, 'check'])->name("checking");

// ===================================================


// ==============================================
//|   laman dan fitur admin                    |
// ---------------------------------------------
Route::get('/admin', [admincontroller::class, 'index'])->middleware(['auth', 'verified']);
Route::get('/admin/layanan', [admincontroller::class, 'layanan']);
Route::get('/admin/layanan', [admincontroller::class, 'search_layanan'])->name('search_layanan');
Route::get('/admin/layanan/new', function () {
    return view('admin.layanan.new-layanan');
});
Route::Post('/admin/layanan/add', [admincontroller::class, 'layanan_new'])->name('layanan.create');
Route::delete('/admin/layanan/delete/{id}', [admincontroller::class, 'layanan_destroy'])->name('layanan.destroy');

// -------------account---------------------------
Route::get('/admin/account', [admincontroller::class, 'account'])->middleware('auth', 'verified');
Route::get('/admin/account', [admincontroller::class, 'search_acc'])->name('search_acc');
Route::get('/admin/account/new', function () {
    return view('admin.account.account-new');
})->middleware('auth', 'verified');
Route::post('/admin/account/new/add', [admincontroller::class, 'add_acc'])->name("add.account");
Route::delete('/admin/account/del/{id}', [AdminController::class, 'removeacc'])->name('acc.destroy');

Route::get('/admin/locket', [admincontroller::class, 'lockets']);
Route::get('/admin/locket', [admincontroller::class, 'search_locket'])->name('search_locket');
Route::get('/admin/locket/new', [admincontroller::class, 'locket_add_data']);
Route::post('/admin/locket/news', [admincontroller::class, 'locket_new'])->name('locket.create');
Route::delete('/admin/locket/del/{id}', [admincontroller::class, 'locket_destroy'])->name('locket.destroy');

Route::get('/admin/running_text',[admincontroller::class,'running_text']);
Route::post('/admin/running_text/update',[admincontroller::class,'update_text'])->name('update_text');

Route::get('/admin/video',[admincontroller::class,'videos']);
Route::post('/admin/video/up',[admincontroller::class,'videos_new'])->name('video.new');
// ========================================================


// ==============================================
//|   laman kiosk                              |
// ---------------------------------------------
Route::get('/kiosk', [kioskcontrollrt::class, 'early']);
Route::Post('/kiosk/add', [kioskcontrollrt::class, 'kios'])->name('kiosk-in');
// ==============================================


// ==============================================
//|   laman loket                              |
// ---------------------------------------------
Route::get('/locket', [loketcontroller::class, 'index']);
Route::post('/locket/select', [loketcontroller::class, 'select'])->name('select.lockets');
Route::get('/locket/main', [loketcontroller::class, 'early']);
Route::delete('/locket/logout', [loketcontroller::class, 'logout'])->name('flush.locket.services');
// ==============================================
/// logout
Route::get("/logout", [admincontroller::class, 'logout']);

Route::get('/tes',function(){return view('template.test');});