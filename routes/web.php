<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
 //       Route::resource('users', UserController::class);
        // Trasa pro zobrazení stránky uzivatele.blade.php
        //    Route::get('/uzivatele', function () {
        //        return view('admin.uzivatele');
        //    })->name('uzivatele');
        
//        Route::get('/uzivatele', function () {
            // Pokud uživatel není přihlášen, přesměruj na login
//            if (!Auth::check()) {
//                return redirect()->route('login');
 //           }
        
            // Pokud je uživatel přihlášen, ale nemá roli 'admin', přesměruj na dashboard
//            if (Auth::user()->role !== 'admin') {
//                return redirect()->route('dashboard'); // Předpokládáme, že dashboard je definovaný
//            }
        
            // Pokud je uživatel admin, zobrazí se stránka uzivatele.blade.php
//            return view('admin.uzivatele');
//            })->name('uzivatele');
        
//        });

        Route::prefix('admin')->name('admin.')->group(function () {
            // Kontrola role přímo v rámci trasy
            Route::get('/uzivatele', [UserController::class, 'index'])->name('uzivatele');
    
            // Trasa pro správu uživatelů
            Route::resource('users', UserController::class);

            // Editace uživatele
            Route::get('/edit_user', [UserController::class, 'edit'])->name('edit_user');
            Route::patch('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
        });
    
        
});

 



require __DIR__.'/auth.php';
