<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserEnseignementController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FolowController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\TodoController;



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


Route::get('event/search' , [EventController::class , 'sort'])->name('event.sort');
Route::get('event/detail/{id}', [EventController::class , 'detail_student'])->name('event.detail');
Route::get('event/all' , [EventController::class , 'all_event'])->name('event.all');
Route::get('favoris/event' , [FolowController::class , 'favoris'])->name('favoris.event');
Route::post('folow/event/{id}' , [FolowController::class , 'store'])->name('store.folow');
Route::get('profile/search' , [ProfileController::class , 'view_profile'])->name('profile.search');
Route::get('profile/all' , [ProfileController::class , 'all_profile'])->name('profile.all');
/* Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show'); */
Route::get('profile/show/{id}', [ProfileController::class, 'show_student'])->name('profile.show_student');
Route::get('users/profile' , [ProfileController::class, 'show_pro'])->name('profile.show_prof');



Route::get('/', [ProfileController::class, 'show_pro'])->name('profile.show_prof');




Route::get('/favoris_list', function () {
    return view('student.favoris_list');
})->name('event.favoris');


/* Route::get('/table', function () {
    return view('admin.tables.ensiengement_table');
}); */

Route::get('favoris/event' , [FolowController::class , 'favoris'])->name('favoris.event');

Route::get('demande/enseignement', [RegisteredUserEnseignementController::class, 'demande'])->name('enseignement.demande');
Route::post('send_demand/enseignement', [RegisteredUserEnseignementController::class, 'send_demand'])->name('enseignement.send_demand');

Route::middleware(['admine' , 'auth'])->group(function () {
    Route::get('register/enseignement', [RegisteredUserEnseignementController::class, 'create'])->name('enseignement.create');
    Route::put('accepte/enseignement/{id}', [RegisteredUserEnseignementController::class, 'accepte_demande'])->name('enseignement.accepte');
    Route::post('store/enseignement', [RegisteredUserEnseignementController::class, 'store'])->name('enseignement.store');
    Route::get('table/enseignement', [TableController::class, 'index'])->name('table.index');
    Route::get('table/profile/{id}', [ProfileController::class, 'show'])->name('profiles.show');
    Route::put('table/enseignement/{id}', [TableController::class, 'update'])->name('table.update');
    Route::put('table/enseignement-unblock/{id}', [TableController::class, 'unblock'])->name('table.unblock');
    Route::get('table/demande', [TableController::class, 'demande_table'])->name('table.demande');
    Route::get('table/student', [TableController::class, 'student_table'])->name('table.student');/* this a profile for the student */

});


Route::middleware('student' , 'auth')->group(function () {
    Route::get('calender', [CalenderController::class, 'index'])->name('calender');
    Route::get('event/all_event', [EventController::class , 'index'])->name('events.index');
    /* Route::get('event/seach' , [EventController::class , 'sort'])->name('event.sort'); */
    Route::post('folow/event/{id}' , [FolowController::class , 'store'])->name('store.folow');
    Route::post('update/event/{id}' , [FolowController::class , 'upadte_paticipate'])->name('update.event');
    Route::get('favoris/event' , [FolowController::class , 'favoris'])->name('favoris.event');
    Route::post('unfolow/event/{id}' , [FolowController::class , 'unfolow'])->name('unfolow.event');
    Route::get('participate/{id}', [FolowController::class, 'check_participate'])->name('check.participate');
    Route::get('unparticipte/{id}', [FolowController::class, 'check_unparticipte'])->name('check.unparticipte');
    
    
    Route::get('accepte/{id}', [FolowController::class, 'check_accepted'])->name('check.accepte');
    
    

});
/* Route::get('event/subject', [EventController::class, 'send_subject'])->name('event.subject'); */


Route::middleware(['prof' , 'auth'])->group(function () {
    Route::get('event/all_events', [EventController::class , 'index'])->name('event.index');
   Route::get('event/create', [EventController::class , 'create'])->name('event.create');
   Route::get('event/edit/{id}', [EventController::class , 'edit'])->name('event.edit');
   Route::put('event/update/{id}', [EventController::class , 'update'])->name('event.update');
   Route::post('/event/store', [EventController::class , 'store'])->name('event.store');
   Route::get('accepte', [FolowController::class, 'all_inccepte_folow'])->name('folow.accepte');
   Route::put('accepte/folow/{id}', [FolowController::class, 'accepte_folow'])->name('accepte.folow');
   Route::get('innccepte/message', [FolowController::class, 'meesage_inccepted'])->name('inccepted.message');
   /* Route::get('folow/inccepted', [FolowController::class, 'view_inccepte'])->name('folowing.inccepted'); */
   Route::get('todo', [TodoController::class, 'create'])->name('todo.user');
   Route::post('todos/store', [TodoController::class, 'store'])->name('todos.store');
   Route::get('todos/list', [TodoController::class, 'get_list'])->name('todos.list');
   Route::delete('todos/delete/{id}', [TodoController::class, 'Drop_list'])->name('todos.delete');
   
});



Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');
/* Route::get('/profile', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('profile'); */
Route::get('/chat', function () {
    return view('chate');
})->middleware(['auth', 'verified'])->name("chat");
Route::get('/chat/etudiant', function () {
    return view('chate_etudiant');
})->middleware(['auth', 'verified'])->name("chat.etudiant");

Route::middleware('auth')->group(function () {
    Route::get('profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('events/show/{id}', [EventController::class , 'show'])->name('events.show');
    Route::get('calender', [CalenderController::class, 'index'])->name('calender');
   Route::post('full-calender/action', [CalenderController::class, 'action']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('count/{id}', [FolowController::class, 'count'])->name('paticipate.count');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
   /*  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); */
   Route::get('/chat/{id}' , [MessagesController::class , 'startConversation'])->name('chat.create');
});

Route::get('/meeting', function () {
    return view('welcome_meeting');
});

Route::post("/createMeeting", [MeetingController::class, 'createMeeting'])->name("createMeeting");

Route::post("/validateMeeting", [MeetingController::class, 'validateMeeting'])->name("validateMeeting");

Route::get("/meeting/{meetingId}", function($meetingId) {

    $METERED_DOMAIN = env('METERED_DOMAIN');
    return view('meeting', [
        'METERED_DOMAIN' => $METERED_DOMAIN,
        'MEETING_ID' => $meetingId
    ]);
});










require __DIR__.'/auth.php';
