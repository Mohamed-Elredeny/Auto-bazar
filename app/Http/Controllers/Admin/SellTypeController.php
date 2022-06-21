<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Category;
use App\models\SellType;
use Illuminate\Http\Request;

class SellTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellTypes = SellType::get();
        return view('admin.sellTypes.index',compact('sellTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.sellTypes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        SellType::create([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'category_id' => $request->category_id,
            'image'=>$request->image
        ]);
        return redirect()->route('admin.sellTypes.index')->with('success', 'تم اضافة نوع الاعلان بنجاح');
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
        $sellType = SellType::find($id);
        $categories = Category::get();
        return view('admin.sellTypes.edit', compact('sellType', 'categories'));
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
        $sellType = SellType::find($id);

        $sellType->update([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'category_id' => $request->category_id,
            'image'=>$request->image
        ]);
        return redirect()->route('admin.sellTypes.index')->with('success', 'تم تعديل نوع الاعلان بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = SellType::find($id);
        $old->delete();
        return redirect()->route('admin.sellTypes.index')->with('success', 'تم الحذف بنجاح');
    }
}
