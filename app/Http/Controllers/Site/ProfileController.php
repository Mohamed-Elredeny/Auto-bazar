<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\models\MaintMark;
use App\models\Product;
use App\models\ProfileMaintenance;
use App\models\Vendor;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($type,$id)
    {
        $products =Product::where('user_id',$id)->get();
        $recent = Product::where('user_id',$id)->inRandomOrder()->limit(8)->get();
        $profile = ProfileMaintenance::find($id);

        switch ($type){
            case 'vendor':
                $profile = Vendor::find($id);
                return view('site.profileSeller',compact('products','recent','id','profile'));
            case 'maintenance':
                $marks = MaintMark::where('maint_Id',$id)->get();
                return view('site.profileMaintenance',compact('products','recent','id','profile','marks'));
        }

    }
    public function viewProfile($type,$id)
    {
        $products =Product::where('user_id',$id)->get();
        $recent = Product::where('user_id',$id)->latest()->limit(8)->get();
        switch ($type){
            case 'vendor':
                $profile = Vendor::find($id);
                return view('site.profileSeller',compact('products','recent','id','profile'));
            case 'maintenance':
                $profile = ProfileMaintenance::find($id);
                $marks = MaintMark::where('maint_Id',$id)->get();
                return view('site.profileMaintenance',compact('products','recent','id','profile','marks'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
