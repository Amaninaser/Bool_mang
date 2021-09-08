<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\AttendanceRecord;
use App\Models\Trainee;
use App\Models\Trainer;
use Illuminate\Http\Request;

class AttendanceRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $trainee = Trainee::when($request->firstname, function ($query, $value) {
        //     $query->where(function ($query) use ($value) {
        //         $query->where('trainees.firstname', 'LIKE', "%$value%")
        //             ->orWhere('trainees.lastname', 'LIKE', "%{$value}%");
        //     });
        // })->paginate(3);

        return view('admin.attendance.index', [
            'trainers' => Trainer::all(),
            'trainees' => Trainee::all(),
            'appointments' => Appointment::all(),
            // 'trainee' => $trainee,

        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointments= Appointment::findOrFail($id);
        $trainers = Trainer::all();
        $trainees = Trainee::all();

        if ($appointments == null) {
            abort(404);
        }

        return view('admin.attendance.edit', compact('trainees','trainers','appointments'));
   
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
        $appointments = Appointment::findOrFail($id);
        if ($appointments == null) {
            abort(404);
        }

        $data = $request->all();
        $appointments->update($data);

        return redirect()->route('admin.attendance.index')
            ->with(
                'success',
                "تم التعديل بنجاح"
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointments = Appointment::findOrFail($id);
   
        $appointments->delete();
 
         return redirect()->route('admin.attendance.index')
             ->with('success', "تم حذف الحجز للمتدرب بنجاح");
     
    }
}
