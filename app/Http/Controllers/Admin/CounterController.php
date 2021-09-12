<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\Trainee;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Group;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusCancel()
    {
        $sum = Finance::join('trainees', 'trainees.id', '=', 'finances.trainee_id')->groupBy('trainees.id','firstname','lastname')
        ->get(['trainees.firstname', 'trainees.lastname',DB::raw('SUM(paid_money) AS sum_paid'), DB::raw('SUM(owed_money) AS sum_owed')]);

        $data = Trainee::all();

        $data_finance = Finance::join('trainees', 'trainees.id', '=', 'finances.trainee_id')
        ->get(['trainees.firstname', 'trainees.lastname','finances.owed_money','finances.paid_money']);

     return view('admin/report', compact('data','data_finance','sum'));


    }  
        

 
}
