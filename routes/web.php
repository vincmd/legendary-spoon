<?php

use App\Http\Controllers\admin\Accountcontroller;
use App\Http\Controllers\admin\Admin_Account_Controller;
use App\Http\Controllers\admin\Admin_Lockets_Controller;
use App\Http\Controllers\admin\LocketsController;
use App\Http\Controllers\admin\Admincontroller;
use App\Http\Controllers\Kioskcontroller;
use App\Http\Controllers\loginController;
use App\Http\Controllers\loketcontroller;
use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\admin\Admin_RunningText_Controller;
use App\Http\Controllers\admin\Admin_Services_Controller;
use App\Http\Controllers\admin\Admin_Video_Controller;
use App\Http\Controllers\admin\Servicescontroller as AdminServicescontroller;
use App\Http\Controllers\RunningText_Controller;
use App\Http\Controllers\SignageController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

Route::get('/video/{filename}', function ($filename) {
    // Corrected path to include 'public'
    $path = storage_path('app/public/sementara/' . $filename);

         if (!file_exists($path)) {
        abort(404);
    }

    $headers = [
        'Content-Type' => 'video/mp4',
        'Content-Disposition' => 'inline; filename="' . $filename . '"',
    ];

    return Response::file($path, $headers);
});

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
Route::Post('/admin/services/add', [Admin_Services_Controller::class, 'services_new'])->name('services.create')->middleware(['auth', 'verified']);
Route::delete('/admin/services/delete/{id}', [Admin_Services_Controller::class, 'services_destroy'])->name('services.destroy');
Route::Post('/upload-temp-logo', [Admin_Services_controller::class, 'temp_logo']);


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
Route::delete('/admin/account/del/{id}', [Admin_Account_Controller::class, 'remove_acc'])->middleware('auth', 'verified')->name('account.destroy');
Route::get('/admin/account/search', [Admin_Account_Controller::class, 'search_acc'])
    ->middleware(['auth', 'verified'])
    ->name('search_acc');

// ==============================================
//|   admin locket                              |
// ---------------------------------------------
Route::get('/admin/locket', [Admin_Lockets_Controller::class, 'lockets'])->middleware('auth', 'verified');
Route::get('/admin/locket', [Admin_lockets_controller::class, 'search_locket'])->name('search_locket')->middleware('auth', 'verified');
Route::get('/admin/locket/new', [Admin_Lockets_Controller::class, 'locket_add_data'])->middleware('auth', 'verified');
Route::post('/admin/locket/store', [Admin_Lockets_Controller::class, 'locket_new'])->name('locket.store')->middleware('auth', 'verified');
Route::delete('/admin/locket/del/{id}', [Admin_Lockets_Controller::class, 'locket_destroy'])->name('locket.destroy');

// ==============================================
//|  admin running text page                    |
// ---------------------------------------------
Route::get('/admin/running_text', [Admin_RunningText_Controller::class, 'running_text'])->middleware('auth', 'verified');
Route::post('/admin/running_text/update', [Admin_RunningText_Controller::class, 'update_text'])->name('update_text')->middleware('auth', 'verified');
;

/// running text page
Route::get('running_text', [RunningText_Controller::class, 'index']);
// ==============================================
//|   admin video                               |
// ---------------------------------------------p
Route::get('/admin/video', [Admin_Video_Controller::class, 'video'])->name('video')->middleware('auth', 'verified');
Route::post('/admin/video/up', [Admin_Video_Controller::class, 'video_new'])->name('video_new')->middleware('auth', 'verified');
// ========================================================


// ==============================================
//|   laman kiosk                              |
// ---------------------------------------------
Route::get('/kiosk', [KioskController::class, 'early']);
Route::Post('/kiosk/add', [KioskController::class, 'kios'])->name('kiosk-in');
// ==============================================


// ==============================================
//|   laman loket                              |
// ---------------------------------------------
Route::get('/locket', [loketcontroller::class, 'index'])->middleware('auth', 'verified');
;
Route::post('/locket/select', [loketcontroller::class, 'select'])->name('select.lockets')->middleware('auth', 'verified');
;
Route::get('/locket/main', [loketcontroller::class, 'early'])->middleware('auth', 'verified');
;
Route::delete('/locket/logout', [loketcontroller::class, 'logout'])->name('flush.locket.services');
// ==============================================
/// logout
Route::get("/logout", [logincontroller::class, 'logout']);


// ==============================================
//|   laman signage                            |
// ---------------------------------------------
Route::get('/signage',[SignageController::class,'index']);


// ==============================================
//|   template                                  |
// ---------------------------------------------
Route::get('/template-main', function () {
    return view('template.main');
});
Route::get('/template-form', function () {
    return view('template.form.forms');
});

Route::get('/template-modal', function () {
    return view('template.modal.main-modal');
});



