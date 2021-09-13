<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\Trainee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

         $trainee= Finance::when($request->id, function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('trainees.firstname', 'LIKE', "%$value%");
            
            });
        })
        ->with('trainee')
        ->get();

        $finances = Finance::all();
        $trainees = Trainee::all();

        return view('admin.finances.index', compact('finances','trainees','trainee'));
           
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.finances.create', [
            'finance' => new Finance(),
            'trainees' => Trainee::all(),
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
        $request->validate(Finance::validateRoles());

        $data = $request->all();

        $finance = Finance::create($data);

        return redirect()->route('admin.finances.index')
        ->with(
            'success',
            "Finance has been added to the trainee successfully");
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
        $finance= Finance::findOrFail($id);
        $trainees = Trainee::all();

        if ($finance == null) {
            abort(404);
        }

        return view('admin.finances.edit', compact('finance','trainees'));
   
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
        $finance = Finance::findOrFail($id);
        if ($finance == null) {
            abort(404);
        }

        $request->validate(Finance::validateRoles());
        $data = $request->all();
        $finance->update($data);

        return redirect()->route('admin.finances.index')
            ->with(
                'success',
                "The Trainer's finances have been modified successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finance = Finance::findOrFail($id);
   
        $finance->delete();
 
         return redirect()->route('admin.finances.index')
             ->with('success', "Trainer's finances have been removed successfully");
     
    }
}
