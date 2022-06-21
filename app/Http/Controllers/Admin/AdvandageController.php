<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Advandage;
use Illuminate\Http\Request;

class AdvandageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advandages = Advandage::get();
        return view('admin.advandages.index',compact('advandages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.advandages.create');
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
        $request->image->move(public_path('assets/images/advandages'), $file_to_store);

        Advandage::create([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'image' => $file_to_store,
        ]);
        return redirect()->route('admin.advandages.index')->with('success', 'The advandage has created successfully.');
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
        $advandage = Advandage::find($id);
        return view('admin.advandages.edit', compact('advandage'));
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
        $advandage = Advandage::find($id);

        if ($request->image) {
         //   unlink(public_path('assets/images/advandages') .'/' . $advandage->image);
            $fileName = $request->image->getClientOriginalName();
            $file_to_store = time() . '_' . $fileName ;
            $request->image->move(public_path('assets/images/advandages'), $file_to_store);
        }
        else{
            $file_to_store = $advandage->image;
        }

        $advandage->update([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'image'=> $file_to_store,
        ]);
        return redirect()->route('admin.advandages.index')->with('success', 'The advandage has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Advandage::find($id);
        $old->delete();
        return redirect()->route('admin.advandages.index')->with('success', 'Deleted successfully');
    }
}
