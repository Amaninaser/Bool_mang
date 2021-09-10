<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dateday;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        
        $trainers= Trainer::when($request->firstname, function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('trainers.firstname', 'LIKE', "%$value%")
                    ->orWhere('trainers.phone', 'LIKE', "%{$value}%");
            });
        })
            ->when($request->id, function ($query, $value) {
                $query->where('id', '=', $value);
            })
            ->latest('firstname')
            ->paginate(3);
            $trainee_search = Trainer::orderBy('firstname')->get();

            return view('admin.trainers.index', [
                'trainers' => $trainers,
                'datedays'=> Dateday::all(),
             
            ]);
        

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trainers.create', [
            'trainer' => new Trainer(),
            'datedays' => Dateday::all(),
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
        $request->validate(Trainer::validateRoles());

        $data = $request->all();

        $trainer = Trainer::create($data);

        return redirect()->route('admin.trainers.index')
        ->with(
            'success',
            "Trainer with name : " . $request->firstname . " " . $request->lastname . " has been created successfully",
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
    public function edit($id)
    {
        $trainer= Trainer::findOrFail($id);
        if ($trainer== null) {
            abort(404);
        }

        return view('admin.trainers.edit', compact('trainer'));
   
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
        $trainer = Trainer::findOrFail($id);
        if ($trainer == null) {
            abort(404);
        }

        $request->validate(Trainer::validateRoles());
        $data = $request->all();
        $trainer->update($data);

        return redirect()->route('admin.trainers.index')
            ->with(
                'success',
                "Trainer with name : " . $request->firstname . " " . $request->lastname . " has been updated successfully",
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
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();
         return redirect()->route('admin.trainers.index')
             ->with('success', 
             "Trainer with name : " . $trainer->firstname . " " . $trainer->lastname . " has been deleted successfully",
           );
    }
}
