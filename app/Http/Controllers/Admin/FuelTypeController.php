<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\FuelType;
use Illuminate\Http\Request;

class FuelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuelTypes = FuelType::get();
        return view('admin.fuelTypes.index',compact('fuelTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fuelTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FuelType::create([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
        ]);
        return redirect()->route('admin.fuelTypes.index')->with('success', 'تم اضافة نوع الوقود بنجاح');
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
        $fuelType = FuelType::find($id);
        return view('admin.fuelTypes.edit', compact('fuelType'));
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
        $fuelType = FuelType::find($id);
        $fuelType->update([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
        ]);
        return redirect()->route('admin.fuelTypes.index')->with('success', 'تم تعديل نوع الوقود بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = FuelType::find($id);
        $old->delete();
        return redirect()->route('admin.fuelTypes.index')->with('success', 'تم الحذف بنجاح');
    }
}
