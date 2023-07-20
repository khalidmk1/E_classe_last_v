<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserEnseignementController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FolowController;



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

/* Route::get('/table', function () {
    return view('admin.tables.ensiengement_table');
}); */

Route::get('demande/enseignement', [RegisteredUserEnseignementController::class, 'demande'])->name('enseignement.demande');
Route::post('send_demand/enseignement', [RegisteredUserEnseignementController::class, 'send_demand'])->name('enseignement.send_demand');

Route::middleware('admin' , 'auth')->group(function () {
    Route::get('register/enseignement', [RegisteredUserEnseignementController::class, 'create'])->name('enseignement.create');
    Route::post('store/enseignement', [RegisteredUserEnseignementController::class, 'store'])->name('enseignement.store');
    Route::get('table/enseignement', [TableController::class, 'index'])->name('table.index');
    Route::get('table/enseignement/{id}', [TableController::class, 'show'])->name('table.show');
    Route::put('table/enseignement/{id}', [TableController::class, 'update'])->name('table.update');
    Route::get('table/demande', [TableController::class, 'demande_table'])->name('table.demande');
    Route::get('table/student', [TableController::class, 'student_table'])->name('table.student');

});


Route::middleware('student' , 'auth')->group(function () {
    Route::get('calender', [CalenderController::class, 'index'])->name('calender');
    Route::get('event/all_event', [EventController::class , 'index'])->name('events.index');
    Route::get('events/show/{id}', [EventController::class , 'show'])->name('events.show');
    Route::get('event/seach' , [EventController::class , 'sort'])->name('event.sort');
    Route::post('folow/event/{id}' , [FolowController::class , 'store'])->name('event.folow');
    Route::post('update/event/{id}' , [FolowController::class , 'upadte_paticipate'])->name('update.event');
    Route::get('favoris/event' , [FolowController::class , 'favoris'])->name('favoris.event');
    Route::post('unfolow/event/{id}' , [FolowController::class , 'unfolow'])->name('unfolow.event');
});


Route::middleware('prof' , 'auth')->group(function () {
    Route::get('profile/enseignement/{id}', [TableController::class, 'show'])->name('profile.show');
    Route::get('event/all_events', [EventController::class , 'index'])->name('event.index');
   Route::get('event/create', [EventController::class , 'create'])->name('event.create');
   Route::post('/event/store', [EventController::class , 'store'])->name('event.store');
   Route::get('event/show/{id}', [EventController::class , 'show'])->name('event.show');
   Route::get('calender', [CalenderController::class, 'index'])->name('calender');
   Route::post('full-calender/action', [CalenderController::class, 'action']);
});


Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/profile', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('profile');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});














require __DIR__.'/auth.php';
