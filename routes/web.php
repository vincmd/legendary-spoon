<?php

use App\Http\Controllers\admin\Accountcontroller;
use App\Http\Controllers\admin\LocketsController;
use App\Http\Controllers\admin\RunningTextController;
use App\Http\Controllers\admin\Admincontroller;
use App\Http\Controllers\kioskcontrollrt;
use App\Http\Controllers\loginController;
use App\Http\Controllers\loketcontroller;
use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\Servicescontroller as AdminServicescontroller;
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
Route::get('/admin/services', [ServicesController::class, 'services']);
Route::get('/admin/services/search', [ServicesController::class, 'search_services'])->name('search_services');
Route::get('/admin/services/new', function () {
    return view('admin.services.new-services');
});
Route::Post('/admin/services/add', [Servicescontroller::class, 'services_new'])->name('services.create');
Route::delete('/admin/services/delete/{id}', [ServicesController::class, 'services_destroy'])->name('services.destroy');


// -------------account---------------------------


// Tampilkan daftar akun (bisa dengan pencarian)
// -------------account---------------------------
Route::get('/admin/account', [AccountController::class, 'account'])->middleware(['auth', 'verified'])->name('account.list');
Route::get('/admin/account/new', function () {
    return view('admin.account.account-new');
})->middleware('auth', 'verified')->name('account.new');
Route::post('/admin/account/new/add', [AccountController::class, 'add_acc'])->middleware('auth', 'verified')->name("add.account");
Route::delete('/admin/account/del/{id}', [AccountController::class, 'removeacc'])->middleware('auth', 'verified')->name('acc.destroy');
Route::get('/admin/account/search', [AccountController::class, 'account'])
    ->middleware(['auth', 'verified'])
    ->name('search_acc');

Route::get('/admin/locket', [LocketsController::class, 'lockets']);
Route::get('/admin/locket', [LocketsController::class, 'search_locket'])->name('search_locket');
Route::get('/admin/locket/new', [LocketsController::class, 'locket_add_data']);
Route::post('/admin/locket/news', [LocketsController::class, 'locket_new'])->name('locket.create');
Route::delete('/admin/locket/del/{id}', [LocketsController::class, 'locket_destroy'])->name('locket.destroy');

Route::get('/admin/running_text', [RunningTextController::class, 'running_text']);
Route::post('/admin/running_text/update', [RunningTextController::class, 'update_text'])->name('update_text');

Route::get('/admin/video', [admincontroller::class, 'videos']);
Route::post('/admin/video/up', [admincontroller::class, 'videos_new'])->name('video.new');
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
Route::get("/logout", [logincontroller::class, 'logout']);

Route::get('/tes', function () {
    return view('template.main');
});
