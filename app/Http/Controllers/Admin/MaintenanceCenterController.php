<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\MaintenanceCenter;
use Illuminate\Http\Request;

class MaintenanceCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenanceCenters = MaintenanceCenter::get();
        return view('admin.maintenanceCenters.index',compact('maintenanceCenters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maintenanceCenters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MaintenanceCenter::create([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
        ]);
        return redirect()->route('admin.maintenanceCenters.index')->with('success', 'تم اضافة مركز الصيانة بنجاح');
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
        $maintenanceCenter = MaintenanceCenter::find($id);
        return view('admin.maintenanceCenters.edit', compact('maintenanceCenter'));
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
        $maintenanceCenter = MaintenanceCenter::find($id);
        $maintenanceCenter->update([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
        ]);
        return redirect()->route('admin.maintenanceCenters.index')->with('success', 'تم تعديل مركز الصيانة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = MaintenanceCenter::find($id);
        $old->delete();
        return redirect()->route('admin.maintenanceCenters.index')->with('success', 'تم الحذف بنجاح');
    }
}
