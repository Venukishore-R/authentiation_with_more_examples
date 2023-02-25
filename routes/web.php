<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Firebase\FirebaseController;
use App\Http\Controllers\Video\VideoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){
    
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.user.login')->name('login');
          Route::view('/register','dashboard.user.register')->name('register');
          Route::post('/create',[UserController::class,'create'])->name('create');
          Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
          Route::view('/home','dashboard.user.home')->name('home');
          Route::post('/logout',[UserController::class,'logout'])->name('logout');
          Route::get('/add-new',[UserController::class,'add'])->name('add');
    });

});

Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');

    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});

Route::get('/image', function() {
    $name = Auth::guard('web')->user()->name;
    $img = Image::make('Certificate/certi.png')->resize(900, 900)->text($name, 430, 380, function($font) {
        $font->file('fonts/NexaSlabDemo-Bold.otf');
        $font->size(90);
        $font->color('#000000');
        $font->align('center');
        $font->valign('top');
    })->save(Auth::guard('web')->user()->name.'.png');
   
    return $img->response('jpg');


});

Route::get('/mail',[UserController::class,'mail']);

Route::get('/print',[UserController::class,'print2']);



Route::get('/coursePage',[VideoController::class,'courseShow'])->name('courseShow');
Route::get('/video/{id}',[VideoController::class,'videoShow'])->name('videoShow');
Route::post('/like/{id}',[VideoController::class,'like'])->name('like');
Route::post('/dislike/{id}',[VideoController::class,'dislike'])->name('dislike');


Route::get('/dot',[VideoController::class,'dot']);