<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::get();
        return view('admin.cities.index',compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileName = $request->image->getClientOriginalName();
        $file_to_store = time() . '_' . $fileName ;
        $request->image->move(public_path('assets/images/cities'), $file_to_store);

        City::create([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'code'=>$request->code,
            'flag'=>$file_to_store,
            'currency'=>$request->currency
        ]);
        return redirect()->route('admin.cities.index')->with('success', 'تم أضافة الدينة بنجاح.');
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
        $city = City::find($id);
        return view('admin.cities.edit', compact('city'));
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
        $cities = City::find($id);
        if ($request->image) {
            //unlink(public_path(asset('assets/images/cities')  .'/' . $cities->image));
            $fileName = $request->image->getClientOriginalName();
            $file_to_store = time() . '_' . $fileName ;
            $request->image->move(public_path('assets/images/cities'), $file_to_store);
        }
        else{
            $file_to_store = $cities->image;
        }
        $cities->update([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'code'=>$request->code,
            'image' => $file_to_store,
            'currency'=>$request->currency
        ]);
        return redirect()->route('admin.cities.index')->with('success', 'تم تعديل المدينة بنجاح.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = City::find($id);
        $old->delete();
        return redirect()->route('admin.cities.index')->with('success', 'تم حذف المدينة بنجاح.');
    }
}
