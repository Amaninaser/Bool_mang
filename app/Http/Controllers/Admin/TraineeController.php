<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trainee;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      

        $trainees= Trainee::when($request->firstname, function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('trainees.firstname', 'LIKE', "%$value%")
                    ->orWhere('trainees.no_id', 'LIKE', "%{$value}%")
                    ->orWhere('trainees.phone', 'LIKE', "%{$value}%");

            });
        })
            ->when($request->id, function ($query, $value) {
                $query->where('id', '=', $value);
            })
            ->latest('firstname')
            ->paginate(3);
        $trainee_search = Trainee::orderBy('firstname')->get();

        return view('admin.trainees.index', [
            'trainees' => $trainees,
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
        return view('admin.trainees.create', [
            'trainee' => new Trainee(),
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
        $request->validate(Trainee::validateRoles());

        $data = $request->all();

        $trainee = Trainee::create($data);

        return redirect()->route('admin.trainees.index')
        ->with(
            'success',
            "Trainee was created with name: " . $request->firstname . " " . $request->lastname,
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
        $trainee= Trainee::findOrFail($id);
        $trainers = Trainer::all();

        if ($trainee == null) {
            abort(404);
        }

        return view('admin.trainees.edit', compact('trainee','trainers'));
   
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
        $trainee = Trainee::findOrFail($id);
        if ($trainee == null) {
            abort(404);
        }

        $request->validate(Trainee::validateRoles());
        $data = $request->all();
        $trainee->update($data);

        return redirect()->route('admin.trainees.index')
            ->with(
                'success',
                "Trainee was updat with name: " . $request->firstname . " " . $request->lastname,
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
        $trainee = Trainee::findOrFail($id);
   
        $trainee->delete();
 
         return redirect()->route('admin.trainees.index')
             ->with('success', "Trainee ($trainee->fullname) Deleted Sccessufly!");
     
    }
}
