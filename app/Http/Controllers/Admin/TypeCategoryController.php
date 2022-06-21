<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\SellType;
use App\models\TypeCategory;
use Illuminate\Http\Request;

class TypeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeCategories = TypeCategory::get();
        return view('admin.typeCategories.index',compact('typeCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellTypes = SellType::get();
        return view('admin.typeCategories.create' , compact('sellTypes'));
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
        $request->image->move(public_path('assets/images/typeCategories'), $file_to_store);

        TypeCategory::create([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'sell_type_id' => $request->sell_type_id,
            'image' => $file_to_store,
        ]);
        return redirect()->route('admin.typeCategories.index')->with('success', 'The type Category has created successfully.');
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
        $typeCategory = TypeCategory::find($id);
        $sellTypes = SellType::get();
        return view('admin.typeCategories.edit', compact('typeCategory', 'sellTypes'));
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
        $typeCategory = TypeCategory::find($id);

        if ($request->image) {
          //  unlink(public_path('assets/images/typeCategories') .'/' . $typeCategory->image);
            $fileName = $request->image->getClientOriginalName();
            $file_to_store = time() . '_' . $fileName ;
            $request->image->move(public_path('assets/images/typeCategories'), $file_to_store);
        }
        else{
            $file_to_store = $typeCategory->image;
        }

        $typeCategory->update([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'sell_type_id' => $request->sell_type_id,
            'image' => $file_to_store,
        ]);
        return redirect()->route('admin.typeCategories.index')->with('success', 'The type Category has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = TypeCategory::find($id);
        $old->delete();
        return redirect()->route('admin.typeCategories.index')->with('success', 'Deleted successfully');
    }
}
