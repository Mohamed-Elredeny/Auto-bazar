<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Subscription;
use Illuminate\Http\Request;

class SubsriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subsriptions = Subscription::get();
        return view('admin.subsriptions.index',compact('subsriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.subsriptions.create');
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
        $request->image->move(public_path('assets/images/subsriptions'), $file_to_store);

        Subscription::create([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'Details_ar' => $request->Details_ar,
            'Details_en' => $request->Details_en,
            'Details_ku' => $request->Details_ku,
            'price' => $request->price,
            'image' => $file_to_store,
        ]);
        return redirect()->route('admin.subsriptions.index')->with('success', 'The subsription has created successfully.');
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
        $subsription = Subscription::find($id);
        return view('admin.subsriptions.edit', compact('subsription'));
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
        $subsription = Subscription::find($id);

        if ($request->image) {
            unlink(public_path('assets/images/subsriptions') .'/' . $subsription->image);
            $fileName = $request->image->getClientOriginalName();
            $file_to_store = time() . '_' . $fileName ;
            $request->image->move(public_path('assets/images/subsriptions'), $file_to_store);
        }
        else{
            $file_to_store = $subsription->image;
        }

        $subsription->update([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
            'Details_ar' => $request->Details_ar,
            'Details_en' => $request->Details_en,
            'Details_ku' => $request->Details_ku,
            'price' => $request->price,
            'image' => $request->Title_en,
        ]);
        return redirect()->route('admin.subsriptions.index')->with('success', 'The subsription has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Subscription::find($id);
        $old->delete();
        return redirect()->route('admin.subsriptions.index')->with('success', 'Deleted successfully');
    }
}
