<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Dateday;
use App\Models\Trainee;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $date = urldecode(request('date'));
        // $date = \Carbon\Carbon::parse($date);

        // $trainers_ids = Dateday::whereDate('date_from', '<=', $date)->whereDate('date_to', '>=', $date)->pluck('trainer_id')->toArray();
        // if(count($trainers_ids) == 0){
        //     return redirect()->back()->withErrors(['لا يوجد مدرب متاح بهذا اليوم!']);
        // }

        if ($request->ajax()) {
            $data = Appointment::join('trainers', 'trainers.id', '=', 'Appointment.trainer_id')->select([
                'trainers.firstname as title ', 'Time_from as strat', 'Time_To as end'
            ])->get();

            return response()->json($data);
        }
        return view('admin.appointments.index', [
            'appointments' => Appointment::all(),
            'trainees' => Trainee::all(),
            'trainers' => Trainer::all(),
            'datedays' => Dateday::all(),
            //  'date' => $date
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = urldecode(request('date'));
        // $date = date("d-m-Y", ($date) );
        $date = \Carbon\Carbon::parse($date);

        $trainers_ids = Dateday::whereDate('date_from', '<=', $date)->whereDate('date_to', '>=', $date)->pluck('trainer_id')->toArray();
        if (count($trainers_ids) == 0) {
            return redirect()->back()->withErrors(['There is no Trainer available today!']);
        }
        $trainers = Trainer::whereIn('id', $trainers_ids)->get();


        return view('admin.appointments.create', [
            'appointment' => new Appointment(),
            'trainees' => Trainee::all(),
            'trainers' => $trainers,
            'datedays' => Dateday::all(),
            'date' => $date
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate(Finance::validateRoles());

        $time_from = request('Time_from');
        $time_to = request('Time_To');
        $trainer_id = request('trainer_id');
        $date = request('date');

        $valid_time = Dateday::whereTime('start_time', '<=', $time_from)->whereTime('end_time', '>=', $time_to)
            ->whereDate('date_from', '<=', $time_from)->whereDate('date_to', '>=', $time_to)
            ->where('trainer_id', $trainer_id)->whereDate('date_from', '<=', $date)
            ->whereDate('date_to', '>=', $date)->get();

        if (count($valid_time) == 0) {
            return redirect()->back()->withErrors(['Trainer unavailable!']);
        }
        $data = $request->all();

        // if ($request->ajax()) {
        //     if ($request->type == 'add') {
        //         $event = Appointment::create([
        //             'Time_from'   =>  $request->start,
        //             'Time_To'     =>  $request->end,  
        //             'trainer_id'  =>  $request->title,
        //         ]);

        //         return response()->json($event);
        //     }
        // }

          $appointment = Appointment::create($data);

        return redirect()->route('admin.appointments.index')
            ->with(
                'success',
                "The appointment for the trainee has been created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
