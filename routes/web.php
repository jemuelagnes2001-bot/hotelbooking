<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\admin;
use App\Http\Controllers\AuthLogout;
use App\Http\Middleware\user;
use Illuminate\Support\Facades\Auth;

Route::view('/', 'welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        if (Auth::user()->is_admin == 1) {
            return redirect()->route('admindashboard');

        } else {
    return redirect()->route('userdashboard');
        }


    })->name('dashboard');
});


Route::post('/logout', [AuthLogout::class, 'logout'])->name('logouts');

Route::prefix('admin')->middleware(['auth', admin::class])->group(function () {
    Route::get('/Admindashboard', function () {
        return view('admin.index');
    })->name('admindashboard');

 Route::get('/admin.rooms', function () {
        return view('admin.rooms    ');
    })->name('admin.rooms');

     Route::get('/admin.bookings', function () {
        return view('admin.bookings    ');
    })->name('admin.bookings');

      Route::get('/admin.guest', function () {
        return view('admin.guest    ');
    })->name('admin.guest');


});



Route::prefix('user')->middleware(['auth', user::class])->group(function () {
    Route::get('/userdashboard', function () {
        return view('user.index');
    })->name('userdashboard');

        Route::get('/user.rooms', function () {
        return view('user.rooms');
    })->name('user.rooms');

         Route::get('/user.bookings', function () {
        return view('user.bookings');
    })->name('user.bookings');

});


require __DIR__.'/auth.php';
