<?php

use Illuminate\Support\Facades\Route;


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

Route::namespace('Admin')
    ->prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::resource('trainees', 'TraineeController');
        Route::resource('trainers', 'TrainerController');
        Route::resource('datedays', 'DatedayController');
        Route::resource('finances', 'FinanceController');
        Route::resource('appointments', 'AppointmentController');
        Route::resource('attendance', 'AttendanceRecordsController');

    });
Route::get('/import-trainee',[TraineeController::class,'importForm']);
    
Route::post('/import', "Admin\TraineeController@import")->name('trainee.import');

Route::get('/export', "Admin\TraineeController@exportIntoExcel")->name('trainee.export');
