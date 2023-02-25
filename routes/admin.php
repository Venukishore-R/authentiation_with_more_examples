<?php

use Illuminate\Support\Facades\Route;

Route::view('/buttons','dashboard.admin.pages.ui.buttons')->name('button');
Route::view('/dropdowns','dashboard.admin.pages.ui.dropdowns')->name('dropdown');
Route::view('/typographys','dashboard.admin.pages.ui.typography')->name('typography');

Route::view('/basi_elements','dashboard.admin.pages.forms.basic_elements')->name('basic_elements');

Route::view('/chartjs','dashboard.admin.pages.charts.chartjs')->name('chartjs');

Route::view('/basic-table','dashboard.admin.pages.tables.basic-table')->name('basic-table');

Route::view('/icons','dashboard.admin.pages.icons.mdi')->name('mdi');

Route::view('/login','dashboard.admin.pages.samples.login')->name('login');
Route::view('/register','dashboard.admin.pages.samples.register')->name('register');
Route::view('/error_404','dashboard.admin.pages.samples.error-404')->name('error_404');
Route::view('error_500','dashboard.admin.pages.samples.error-500')->name('error_500');

Route::view('/docs','dashboard.admin.pages.documentation.documentation')->name('documentation');

Route::view('/admin_home','dashboard.admin.home')->name('admin_home');