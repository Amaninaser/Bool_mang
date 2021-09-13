<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Dateday;
use App\Models\Trainee;
use App\Models\Trainer;
use Facade\FlareClient\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Redirect, Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response as FacadesResponse;
use NunoMaduro\Collision\Adapters\Phpunit\Printer;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->expectsJson()) {
            $data = Appointment::join('trainers', 'trainers.id', '=', 'appointments.trainer_id')
                ->join('trainees', 'trainees.id', '=', 'appointments.trainee_id')->select([
                    'appointments.id',
                    DB::raw("CONCAT(trainers.firstname,' ',trainers.lastname, '/' ,trainees.firstname,' ',trainees.lastname) as title "),
                    DB::raw('Time_from as start'),
                    DB::raw('Time_To as end'),
                    'appointments.color', 'Subtype', 'status', 'appointments.text_color'

                ])->get()->toArray();
            foreach ($data as $key => $value) {
                if ($data[$key]['Subtype'] == 'training') {
                    $data[$key]['color'] = "#00b3b3";
                }
                if ($data[$key]['Subtype'] == 'education') {
                    $data[$key]['color'] = "LightGray";
                }
                if ($data[$key]['Subtype'] == 'private_lesson') {
                    $data[$key]['color'] = "yellow";
                }
              
            }
        foreach ($data as $key => $value) {

            if ($data[$key]['status'] == 'Reserve') {
                $data[$key]['textColor'] = "#ffaa00";
            }
            if ($data[$key]['status'] == 'Complete') {
                $data[$key]['textColor'] = "blue";
            }
            if ($data[$key]['status'] == 'Cancel') {
                $data[$key]['textColor'] = "purple";
            }
        }
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
        $request->validate(Appointment::validateRoles());

        $time_from = request('Time_from');
        $time_to = request('Time_To');
        $trainer_id = request('trainer_id');
        $date = request('date');

        $valid_time = Dateday::whereTime('start_time', '<=', $time_from)
            ->whereTime('end_time', '>=', $time_to)
            ->whereDate('date_from', '<=', $time_from)->whereDate('date_to', '>=', $time_to)
            ->where('trainer_id', $trainer_id)->whereDate('date_from', '<=', $date)
            ->whereDate('date_to', '>=', $date)->get();

        $avaliable = Appointment::whereTime('Time_from', '=', $time_from)
            ->whereTime('Time_To', '=', $time_to)->get();

        if (count($avaliable) !== 0) {
            return redirect()->back()->withErrors(['Trainer Has Appointment in this Hours!']);
        }

        if (count($valid_time) == 0) {
            return redirect()->back()->withErrors(['Trainer unavailable!']);
        }
        $data = $request->all();

        $appointment = Appointment::create($data);

        return redirect()->route('admin.appointments.index')
            ->with(
                'success',
                "The appointment for the trainee has been created successfully"
            );
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
    public function edit(Request $request)
    {

        $appointments = Appointment::where('id', $request->id)->first()->toArray();
        $date_to = strtotime($appointments['Time_To']);
        $old_to = date('H:i:s', $date_to);
        $old_timeStamp = strtotime($appointments['Time_from']);
        $old_time = date('H:i:s', $old_timeStamp);
        $old_date = date('Y-m-d', $old_timeStamp);
        $new_date = date_create($old_date);
        $new_string = $request->day . ' day ' . $request->months . ' month ' . $request->years . ' year';
        date_add($new_date, date_interval_create_from_date_string($new_string));
        $new_date = date_format($new_date, 'Y-m-d');
        $data = array(
            'Time_from' => $new_date . ' ' . $old_time,
            'Time_To' => $new_date . ' ' . $old_to
        );
        Appointment::where('id', $request->id)->update($data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        return response()->json($request);
    }
}
