<?php

use App\Http\Controllers\GuruController as ControllersGuruController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController as ControllersSiswaController;
use App\Http\Controllers\Superadmin\DeviceController;
use App\Http\Controllers\Superadmin\GuruController;
use App\Http\Controllers\Superadmin\KelaController;
use App\Http\Controllers\Superadmin\KelasCategoryController;
use App\Http\Controllers\Superadmin\SettingwebsiteController;
use App\Http\Controllers\Superadmin\SiswaController;
use App\Http\Controllers\Superadmin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'role:Superadmin')->group(function () {
    Route::prefix('superadmin')->name('superadmin.')->group(function () {
        Route::view('/dashboard', 'superadmin.home.index');
        Route::view('/', 'superadmin.home.index');

        // Guru
        Route::resource('gurus', GuruController::class);
        // Kelas
        Route::resource('kelas', KelaController::class);
        // Jurusan
        Route::resource('kelas-categories', KelasCategoryController::class);
        // Siswa
        Route::resource('siswas', SiswaController::class);
        // WA Gateway Fonnte
        Route::resource('devices', DeviceController::class);
        Route::post('send-message', [DeviceController::class, 'sendMessage'])->name('send.message');
        Route::post('devices/status', [DeviceController::class, 'checkDeviceStatus']);
        Route::post('devices/activate', [DeviceController::class, 'activateDevice'])->name('devices.activate');
        Route::post('devices/disconnect', [DeviceController::class, 'disconnect'])->name('devices.disconnect');

        // Management Users 
        Route::resource('users', UserController::class);

        // settings
        Route::get('/settings', [SettingwebsiteController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingwebsiteController::class, 'update'])->name('settings.update');
        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    // Route::get('/', function () {
    //     return view('superadmin.home.index')->name('superadmin.index');
    // });
});


/**
 * Route Guru
 */

Route::middleware('auth', 'role:Guru')->group(function () {
    Route::prefix('guru')->name('guru.')->group(function () {
        Route::view('dashboard', 'guru.index');
        Route::view('/dashboard', 'guru.index');

        Route::get('siswas', [ControllersGuruController::class, 'siswa'])->name('data.index');
        Route::get('siswas/{siswa}/edit', [ControllersGuruController::class, 'editSiswa'])->name('data.edit');
        Route::put('siswas/{siswa}', [ControllersGuruController::class, 'updateSiswa'])->name('data.update');
    });
    // Route::get('/', function () {
    //     return view('superadmin.home.index')->name('superadmin.index');
    // });
});

/**
 * Route Siswa
 */
Route::middleware('auth', 'role:Siswa')->group(function () {
    Route::prefix('siswa')->name('siswa.')->group(function () {
        Route::get('/dashboard', [ControllersSiswaController::class, 'index'])->name('dashboard');
        Route::get('/', [ControllersSiswaController::class, 'index'])->name('dashboard');
        Route::get('print', [ControllersSiswaController::class, 'print'])->name('print');
    });
    // Route::get('/', function () {
    //     return view('superadmin.home.index')->name('superadmin.index');
    // });
});



require __DIR__ . '/auth.php';
