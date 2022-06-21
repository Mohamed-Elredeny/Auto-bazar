<?php

namespace App\Http\Controllers\Admin;

use App\models\Admin;
use App\models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::get();

        return view('admin.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCities = City::get();
        return view('admin.admins.create',compact('allCities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'email' => 'required|unique:admins',
            'city_id'=>'required'
        ]);

       // $request['password'] = Hash::make($request->password);
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instgram' => $request->instgram,
            'city_id' => $request->city_id,
        ]);
        return redirect()->route('admin.admins.index')->with('success', 'The admin has created successfully.');
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
        $city = Admin::find($id);
        $allCities = City::get();

        return view('admin.admins.edit', compact('city','allCities'));
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


        $admin = Admin::find($id);

        if($request->email){
            if($request->email != $admin->email){
                $request->validate([
                    'email' => 'unique:admins',
                ]);
            }
        }

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instgram' => $request->instgram,
            'city_id' => $request->city_id,
        ]);
        return redirect()->route('admin.admins.index')->with('success', 'The admin has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Admin::find($id);
        $old->delete();
        return redirect()->route('admin.admins.index')->with('success', 'Deleted successfully');
    }
}
