<?php

use App\Http\Controllers\admin\Accountcontroller;
use App\Http\Controllers\admin\Admin_Account_Controller;
use App\Http\Controllers\admin\Admin_Lockets_Controller;
use App\Http\Controllers\admin\LocketsController;
use App\Http\Controllers\admin\Admincontroller;
use App\Http\Controllers\kioskcontrollrt;
use App\Http\Controllers\loginController;
use App\Http\Controllers\loketcontroller;
use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\Admin_RunningText_Controller;
use App\Http\Controllers\admin\Admin_Services_Controller;
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
Route::get('/admin', [Admincontroller::class, 'index'])->middleware(['auth', 'verified']);

// ==============================================
//|   admin services                            |
// ---------------------------------------------
Route::get('/admin/services', [Admin_Services_Controller::class, 'services']);
Route::get('/admin/services/search', [Admin_Services_Controller::class, 'search_services'])->name('search_services');
Route::get('/admin/services/new', function () {
    return view('admin.services.new-services');
});
Route::Post('/admin/services/add', [Servicescontroller::class, 'services_new'])->name('services.create');
Route::delete('/admin/services/delete/{id}', [ServicesController::class, 'services_destroy'])->name('services.destroy');


// ==============================================
//|   admin acces / account                    |
// ---------------------------------------------
// Tampilkan daftar akun (bisa dengan pencarian)
// -------------account---------------------------


// Tampilkan daftar akun (bisa dengan pencarian)
Route::get('/admin/account', [Admin_Account_Controller::class, 'account'])->middleware(['auth', 'verified'])->name('account.list');
// Tampilkan form tambah akun
Route::get('/admin/account/new', function () {
    return view('admin.account.account-new');
})->middleware('auth', 'verified')->name('account.new');
// Simpan akun baru
Route::post('/admin/account/new/add', [Admin_Account_Controller::class, 'add_acc'])->middleware('auth', 'verified')->name("add.account");
// Hapus akun
Route::delete('/admin/account/del/{id}', [Admin_Account_Controller::class, 'remove_acc'])->middleware('auth', 'verified')->name('acc.destroy');
Route::get('/admin/account/search', [Admin_Account_Controller::class, 'search_acc'])
    ->middleware(['auth', 'verified'])
    ->name('search_acc');

// ==============================================
//|   admin locket                              |
// ---------------------------------------------
Route::get('/admin/locket', [Admin_Lockets_Controller::class, 'lockets']);
Route::get('/admin/locket', [Admin_lockets_controller::class, 'search_locket'])->name('search_locket');
Route::get('/admin/locket/new', [Admin_Lockets_Controller::class, 'locket_add_data']);
Route::post('/admin/locket/news', [Admin_Lockets_Controller::class, 'locket_new'])->name('locket.create');
Route::delete('/admin/locket/del/{id}', [Admin_Lockets_Controller::class, 'locket_destroy'])->name('locket.destroy');

// ==============================================
//|  admin running text page                    |
// ---------------------------------------------
Route::get('/admin/running_text', [Admin_RunningText_Controller::class, 'running_text']);
Route::post('/admin/running_text/update', [Admin_RunningText_Controller::class, 'update_text'])->name('update_text');

// ==============================================
//|   admin video                               |
// ---------------------------------------------
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

Route::get('/template-main', function () {
    return view('template.main');
});
Route::get('/template-form', function () {
    return view('template.form.forms');
});
