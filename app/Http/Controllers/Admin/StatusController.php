<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Status::get();
        return view('admin.statuses.index',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.statuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Status::create([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
        ]);
        return redirect()->route('admin.statuses.index')->with('success', 'The status has created successfully.');
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
        $status = Status::find($id);
        return view('admin.statuses.edit', compact('status'));
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
        $status = Status::find($id);
        $status->update([
            'Title_ar' => $request->Title_ar,
            'Title_en' => $request->Title_en,
            'Title_ku' => $request->Title_ku,
        ]);
        return redirect()->route('admin.statuses.index')->with('success', 'The status has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Status::find($id);
        $old->delete();
        return redirect()->route('admin.statuses.index')->with('success', 'Deleted successfully');
    }
}
