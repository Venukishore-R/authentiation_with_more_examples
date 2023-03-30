<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Firebase\FirebaseController;
use App\Http\Controllers\Video\VideoController;
use App\Http\Controllers\Print\PrintController;

// Route::view('/buttons','dashboard.admin.pages.ui.buttons')->name('button');
// print functionalities . . .
Route::get('/admin-user-print',[PrintController::class,'index'])->name('user');
Route::get('/admin-print',[PrintController::class,'print'])->name('print');


Route::prefix('admin')->name('admin.')->group(function(){

    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');

    });
    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    });

});

Route::view('/export','dashboard.admin.pages.Export.export')->name('export');
Route::view('/import','dashboard.admin.pages.ImportExport.import_export')->name('import_');
Route::view('/basic-table','dashboard.admin.pages.tables.basic-table')->name('basic-table');


Route::view('/docs','dashboard.admin.pages.documentation.documentation')->name('documentation');
Route::view('/admin_home','dashboard.admin.home')->name('admin_home');


