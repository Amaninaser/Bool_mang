<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\Trainee;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.finances.index', [
            'finances' => Finance::all(),
            'trainees' => Trainee::all(),

        ]);
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
            "تم إضافة المالية للمتدرب بنجاح",
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

       // $request->validate(Trainee::validateRoles());
        $data = $request->all();
        $finance->update($data);

        return redirect()->route('admin.finances.index')
            ->with(
                'success',
                "تم تعديل المالية للمدرب بنجاح ",
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
        $finance = Finance::findOrFail($id);
   
        $finance->delete();
 
         return redirect()->route('admin.finances.index')
             ->with('success', "تم حذف المالية للمدرب بنجاح");
     
    }
}
