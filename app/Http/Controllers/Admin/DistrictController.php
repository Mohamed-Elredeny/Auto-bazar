<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\City;
use App\models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::get();
        return view('admin.districts.index',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        return view('admin.districts.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        District::create([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'city_id' => $request->city_id,
        ]);
        return redirect()->route('admin.districts.index')->with('success', 'تم اضافة الحي بنجاح');
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
        $district = District::find($id);
        $cities = City::get();
        return view('admin.districts.edit', compact('district', 'cities'));
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
        $district = District::find($id);
        $district->update([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'city_id' => $request->city_id,
        ]);
        return redirect()->route('admin.districts.index')->with('success', 'تم تعديل الحي بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = District::find($id);
        $old->delete();
        return redirect()->route('admin.districts.index')->with('success', 'تم الحذف بنجاح');
    }
}
