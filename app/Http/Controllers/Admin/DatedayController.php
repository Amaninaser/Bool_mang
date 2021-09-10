<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dateday;
use App\Models\SchedualTimes;
use App\Models\DaysName;

use App\Models\Trainer;
use Illuminate\Http\Request;

class DatedayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datedays= Dateday::when($request->date_from, function ($query, $value) {
                $query->whereDate('date_from', '<=', "$value")
                ->whereTime('start_time', '<=', "$value")
                    ->whereTime('end_time', '>=', "$value");
        })
          
            ->latest('date_from')
            ->paginate(3);

        return view('admin.datedays.index', [
            'datedays' => $datedays,
            'daysnames' => DaysName::all(),
            'trainers' => Trainer::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.datedays.create', [
            'dateday' => new Dateday(),
            'trainers' => Trainer::all(),

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
        
       // $request->validate(Dateday::validateRoles());
    
       $data = $request->all();
       $day_name =$data['day'];
    
    $dates =new Dateday;
    $dates->trainer_id = $request->trainer_id;
    $dates->start_time = $request->start_time;
    $dates->end_time = $request->end_time;
    $dates->date_from = $request->date_from;
    $dates->date_to = $request->date_to;
    $dates->save();

       foreach($day_name as $day){

        DaysName::create([  
            'day_name'=>$day,
            'days_id'=> $dates->id   
           
        ]);
    }

      // dd('gujg');

        return redirect()->route('admin.datedays.index')
        ->with(
            'success', "Available days for trainer have been added successfully!");
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
        $dateday= Dateday::findOrFail($id);
        $trainers = Trainer::all();
        $daysnames = DaysName::all();


        if ($dateday == null) {
            abort(404);
        }

        return view('admin.datedays.edit', 
        compact('dateday','trainers','daysnames'));
   
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
        $dateday = Dateday::findOrFail($id);
        if ($dateday == null) {
            abort(404);
        }

        $request->validate(Dateday::validateRoles());
        $data = $request->all();
        $dateday->update($data);

        return redirect()->route('admin.datedays.index')
            ->with(
                'success',
                "Date_Day Updated Sccessufly!"
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
        $dateday = Dateday::findOrFail($id);
   
        $dateday->delete();
 
         return redirect()->route('admin.datedays.index')
             ->with('success', "Date_day Deleted Sccessufly!");
    }
}
