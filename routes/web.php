<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\headController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\PengajuanController;
use App\Models\Pengajuan;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/pengajuancuti', function () { return view('surat_cuti'); });
Route::get('/printcuti', function () { return view('print.print_cuti'); });

Route::middleware(['auth'])->group(function () {

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', [adminController::class, 'index'])->name('admin.dashboard');

        Route::get('/editinbox', function () {
            return view('admin/adm_editinbox');
        });

        Route::get('/daftarpengajuan', function () {
            return view('admin/adm_daftar_pengajuan');
        });

        Route::get('/statuspengajuan', function () {
            return view('admin/adm_status_pengajuan');
        });

        Route::get('/admininbox', [ArsipController::class, 'inbox']) -> name ('arsip.inbox');
        Route::get('/tambahinbox', [ArsipController::class, 'tambahinbox']) ->name('arsip.tambahinbox');
        Route::post('/tambahinbox', [ArsipController::class, 'storeinbox']) ->name ('arsip.storeinbox');
        Route::get('/admininbox/{id}', [ArsipController::class, 'detailinbox']) -> name ('arsip.detailinbox');
        Route::get('/editinbox/{id}', [ArsipController::class, 'editinbox']) -> name ('arsip.editinbox');
        Route::put('/updateinbox/{id}', [ArsipController::class, 'updateinbox']) -> name ('arsip.updateinbox');
        Route::delete('/hapusinbox/{arsipmasuk}', [ArsipController::class, 'destroyinbox'])->name('arsip.destroyinbox');

        Route::get('/adminoutbox', [ArsipController::class, 'outbox']) -> name ('arsip.outbox');
        Route::get('/tambahoutbox', [ArsipController::class, 'tambahoutbox']) ->name('arsip.tambahoutbox');
        Route::post('/tambahoutbox', [ArsipController::class, 'storeoutbox']) ->name ('arsip.storeoutbox');
        Route::get('/adminoutbox/{id}', [ArsipController::class, 'detailoutbox']) -> name ('arsip.detailoutbox');
        Route::get('/editoutbox/{id}', [ArsipController::class, 'editoutbox']) -> name ('arsip.editoutbox');
        Route::put('/updateoutbox/{id}', [ArsipController::class, 'updateoutbox']) -> name ('arsip.updateoutbox');
        Route::delete('/hapusoutbox/{arsipkeluar}', [ArsipController::class, 'destroyoutbox'])->name('arsip.destroyoutbox');

        Route::get('/agenda', [ArsipController::class, 'agenda'])->name('agenda');

        Route::get('/kelolauser', [UserController::class, 'index']) -> name('user.index');
        Route::get('/tambahuser', [UserController::class, 'create'])->name('user.create');
        Route::post('/tambahuser', [UserController::class, 'store'])->name('user.store');
        Route::delete('/hapususer/{user}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/updateuser/{id}', [UserController::class, 'update'])->name('user.update');


        Route::get('/adminprofil', [adminController::class, 'Profile'])->name('admin.profile');
        Route::post('/profile/update', [adminController::class, 'updateProfile'])->name('profile.update');
        Route::post('/adminpassword', [adminController::class, 'updatePassword'])->name('admin.updatePassword');
        Route::get('/adminprofile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::put('/admin/editprofile', [AdminController::class, 'updateProfile'])->name('admin.profileupdate');

    });


    Route::middleware(['role:head'])->group(function () {
        Route::get('/head', [headController::class, 'index'])->name('headoffice.dashboard');

        Route::get('/headinbox', [ArsipController::class, 'headinbox']) -> name ('head.inbox');
        Route::get('/headinbox/{id}', [ArsipController::class, 'headdetailinbox']) -> name ('head.detailinbox');
        Route::get('/headoutbox', [ArsipController::class, 'headoutbox']) -> name ('head.outbox');
        Route::get('/headoutbox/{id}', [ArsipController::class, 'headdetailoutbox']) -> name ('head.detailoutbox');

        Route::get('/headagenda', [ArsipController::class, 'headagenda'])->name('head.agenda');


        Route::get('/headdaftarpengajuan', [PengajuanController::class, 'head']) -> name ('head.pengajuan');
        Route::get('/headdaftarpengajuan/{id}', [PengajuanController::class, 'detail']) -> name ('head.pengajuandetail');
        Route::put('/pengajuan/{id}', [PengajuanController::class, 'update'])->name('pengajuan.update');

        Route::get('/headprofil', function () {
            return view('head/head_profil');
        });

        Route::get('/headprofil', [headController::class, 'Profile'])->name('head.profile');
        Route::post('/profile/update', [headController::class, 'updateProfile'])->name('profile.update');
        Route::post('/headpassword', [headController::class, 'updatePassword'])->name('head.updatePassword');
        Route::get('/headprofile', [HeadController::class, 'profile'])->name('head.profile');
        Route::put('/head/editprofile', [HeadController::class, 'updateProfile'])->name('head.profileupdate');

    });


    Route::middleware(['role:staff'])->group(function () {
        Route::get('/staff', [staffController::class, 'index'])->name('staff.dashboard');


        Route::get('/staffagenda', [ArsipController::class, 'staffagenda']) -> name ('staff.agenda');

        Route::get('/stafpengajuan', [PengajuanController::class, 'index']) -> name ('staff.pengajuan');
        Route::get('/stafcreate', [PengajuanController::class, 'create']) -> name ('staff.create');
        Route::post('/stafpengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');
        Route::get('/cetak-surat/{id}', [PengajuanController::class, 'cetak'])->name('cetak');

        Route::get('/staffprofile', [staffController::class, 'profile'])->name('staff.profile');
        Route::put('/staff/update', [staffController::class, 'updateProfile'])->name('staff.updateProfile');
        Route::post('/staffpassword', [staffController::class, 'updatePassword'])->name('staff.updatePassword');
    });


});



