<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Finance;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusCancel()
    {
        $count = Appointment::where('appointments.status','=','Cancel')->count();
        $count_Reserve = Appointment::where('appointments.status','=','Reserve')->count();
        $count_Complete = Appointment::where('appointments.status','=','Complete')->count();

        $count_presence = Appointment::where('appointments.audience','=','presence')->count();
        $sum = Finance::sum('owed_money');

        $data = Appointment::join('trainees', 'trainees.id', '=', 'appointments.trainee_id')
        ->where('appointments.status', '=', 'Cancel')
        ->orwhere('appointments.audience', '=', 'presence')
        ->get(['trainees.firstname', 'trainees.lastname']);

        $data_staus = Appointment::join('trainees', 'trainees.id', '=', 'appointments.trainee_id')
        ->where('appointments.status', '=', 'Reserve')
        ->orwhere('appointments.status', '=', 'Complete')
        ->get(['trainees.firstname', 'trainees.lastname']);

        $data_finance = Finance::join('trainees', 'trainees.id', '=', 'finances.trainee_id')
        ->get(['trainees.firstname', 'trainees.lastname','finances.owed_money','finances.paid_money']);

     return view('admin/report', compact('data','count','data_staus','count_presence','sum','data_finance','count_Reserve','count_Complete'));


    }  
        

 
}
