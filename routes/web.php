<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserEnseignementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landing_page.content_page');
});

Route::get('/home', function () {
    return view('home');
});





Route::get('/register_prof', function () {
    return view('auth.register_enseignement');
});


Route::middleware('admin')->group(function () {
    Route::get('register/enseignement', [RegisteredUserEnseignementController::class, 'create'])->name('enseignement.create');
    
});




Route::get('register', [RegisteredUserController::class, 'create'])->name('register.store');

Route::middleware('student')->group(function () {
    Route::get('/student', function () {
        return view('etudiant.etudaint');
    });
    
});

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
