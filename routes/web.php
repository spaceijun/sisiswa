<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Superadmin\DeviceController;
use App\Http\Controllers\Superadmin\SettingwebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('superadmin')->name('superadmin.')->group(function () {
        // WA Gateway Fonnte
        Route::resource('devices', DeviceController::class);
        Route::post('send-message', [DeviceController::class, 'sendMessage'])->name('send.message');
        Route::post('devices/status', [DeviceController::class, 'checkDeviceStatus']);
        Route::post('devices/activate', [DeviceController::class, 'activateDevice'])->name('devices.activate');
        Route::post('devices/disconnect', [DeviceController::class, 'disconnect'])->name('devices.disconnect');

        // settings
        Route::get('/settings', [SettingwebsiteController::class, 'index'])->name('settings.index');
        Route::put('/settings', [SettingwebsiteController::class, 'update'])->name('settings.update');
        // Profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::view('superadmin/dashboard', 'superadmin.home.index');
    // Route::get('/', function () {
    //     return view('superadmin.home.index')->name('superadmin.index');
    // });
});

require __DIR__ . '/auth.php';
