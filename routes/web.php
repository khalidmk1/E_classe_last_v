<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserEnseignementController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FolowController;
use App\Http\Controllers\MessagesController;



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
    Route::put('accepte/enseignement/{id}', [RegisteredUserEnseignementController::class, 'accepte_demande'])->name('enseignement.accepte');
    Route::post('store/enseignement', [RegisteredUserEnseignementController::class, 'store'])->name('enseignement.store');
    Route::get('table/enseignement', [TableController::class, 'index'])->name('table.index');
    Route::get('table/profile/{id}', [ProfileController::class, 'show'])->name('profiles.show');
    Route::put('table/enseignement/{id}', [TableController::class, 'update'])->name('table.update');
    Route::get('table/demande', [TableController::class, 'demande_table'])->name('table.demande');
    Route::get('table/student', [TableController::class, 'student_table'])->name('table.student');/* this a profile for the student */

});


Route::middleware('student' , 'auth')->group(function () {
    Route::get('calender', [CalenderController::class, 'index'])->name('calender');
    Route::get('event/all_event', [EventController::class , 'index'])->name('events.index');
    Route::get('event/seach' , [EventController::class , 'sort'])->name('event.sort');
    Route::post('folow/event/{id}' , [FolowController::class , 'store'])->name('store.folow');
    Route::post('update/event/{id}' , [FolowController::class , 'upadte_paticipate'])->name('update.event');
    Route::get('favoris/event' , [FolowController::class , 'favoris'])->name('favoris.event');
    Route::post('unfolow/event/{id}' , [FolowController::class , 'unfolow'])->name('unfolow.event');
});


Route::middleware('prof' , 'auth')->group(function () {
    Route::get('event/all_events', [EventController::class , 'index'])->name('event.index');
   Route::get('event/create', [EventController::class , 'create'])->name('event.create');
   Route::get('event/edit/{id}', [EventController::class , 'edit'])->name('event.edit');
   Route::put('event/update', [EventController::class , 'update'])->name('event.update');
   Route::post('/event/store', [EventController::class , 'store'])->name('event.store');
   Route::get('event/show/{id}', [EventController::class , 'show'])->name('event.show');
   
});



Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');
/* Route::get('/profile', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('profile'); */
Route::get('/chat', function () {
    return view('chate');
})->name("chat");

Route::middleware('auth')->group(function () {
    Route::get('events/show/{id}', [EventController::class , 'show'])->name('events.show');
    Route::get('calender', [CalenderController::class, 'index'])->name('calender');
   Route::post('full-calender/action', [CalenderController::class, 'action']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
   /*  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); */
   Route::get('/chat/{id}' , [MessagesController::class , 'startConversation'])->name('chat.create');
});














require __DIR__.'/auth.php';
