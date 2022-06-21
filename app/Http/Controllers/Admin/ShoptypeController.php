<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\ShopType;
use Illuminate\Http\Request;

class ShoptypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellTypes = ShopType::get();
        return view('admin.shopTypes.index',compact('sellTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shopTypes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ShopType::create([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'category_id' => $request->category_id,
            'image'=>$request->image
        ]);
        return redirect()->route('admin.shopTypes.index')->with('success', 'تم اضافة نوع الاعلان بنجاح');
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
        $sellType = ShopType::find($id);
        return view('admin.shopTypes.edit', compact('sellType'));
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
        $sellType = ShopType::find($id);
        $sellType->update([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'category_id' => $request->category_id,
            'image'=>$request->image
        ]);
        return redirect()->route('admin.shopTypes.index')->with('success', 'تم تعديل نوع الاعلان بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = ShopType::find($id);
        $old->delete();
        return redirect()->route('admin.shopTypes.index')->with('success', 'تم الحذف بنجاح');
    }
}
