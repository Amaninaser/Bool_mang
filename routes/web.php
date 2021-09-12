<?php

use App\Http\Controllers\Admin\LocalizationController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Models\Appointment;


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


Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('locale.change');

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
        Route::post('appointments/edit','AppointmentController@edit');

   });
Route::get('/import-trainee',[TraineeController::class,'importForm']);
 Route::get('admin/report',  "Admin\CounterController@statusCancel");


    
Route::post('/import', "Admin\TraineeController@import")->name('trainee.import');

Route::get('/export', "Admin\TraineeController@exportIntoExcel")->name('trainee.export');

Route::get('appointments/delete',function(){
    $event = Appointment::where('id',$_GET['id'])->delete();
    return response()->json($event);
});

