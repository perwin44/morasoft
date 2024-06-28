<?php

use App\Http\Controllers\PosController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Mail\Test1Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    //return view('welcome');
    Storage::disk('alaa')->put('test.txt', 'welcome');
    return "ok";
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

// Route::get('posts',[App\Http\Controllers\PostController::class,'index2'])->middleware('check_user');

// Route::middleware(['check_user','auth'])->group(function () {
//     Route::get('posts',[App\Http\Controllers\PostController::class,'index2'])->middleware('check_user');
// });


Route::get('/send', function () {
    //$user='samir';
    Mail::to('pnonjida@gmail.com')->send(new TestMail());

    return response('sending');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('posts', [PostController::class,'create'])->name('post.create');
Route::post('store', [PostController::class,'hani'])->name('post.store');
Route::get('show/{id}', [PostController::class,'show'])->name('post.show');

Route::get('Notification/markAsRead', [PostController::class,'markAsRead'])->name('Notification.Read');


Route::get('test', [App\Http\Controllers\TestController::class, 'index']);

Route::get('test1', [App\Http\Controllers\TestController::class, 'index1']);

Route::get('users', [App\Http\Controllers\TestController::class, 'index2']);

Route::get('sendMail', [App\Http\Controllers\TestController::class, 'sendMail']);

Route::get('show', [App\Http\Controllers\TestController::class, 'showForm']);
Route::get('show/image', [App\Http\Controllers\TestController::class, 'showImage']);
Route::post('store', [App\Http\Controllers\TestController::class, 'store'])->name('photo.save');



