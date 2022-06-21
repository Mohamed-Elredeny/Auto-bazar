<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Advertisment;
use App\models\Category;
use App\models\Make;

use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.advertisements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makes = Make::get();
        $categories = Category::get();
        return view('admin.advertisements.create',compact('makes','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = $request->model;
        /*
            version
            advCat
            advName
            advDetails
            advLink
            advFullType
            advYear
            advGear
            advMark
            advCondition
            advSlinder
            advEngineCapacity
            image
         */
        $version = $request->version;

        $fileName = $request->image->getClientOriginalName();
        $file_to_store = time() . '_' . $fileName ;
        $request->image->move(public_path('assets/images/advertisements'), $file_to_store);

        switch($version){
            case '1':
                Advertisment::create([
                    'version'=>1,
                    'advCat'=>$request->advCat,
                    'advName'=>$request->advName,
                    'advLink'=>$request->advLink,
                    'advFullType'=>$request->advFullType,
                    'advYear'=>$request->advYear,
                    'advGear'=>$request->advGear,
                    'advMark'=>$request->advMark,
                    'advCondition'=>$request->advCondition,
                    'advSlinder'=>$request->advSlinder,
                   'advEngineCapacity'=>$request->advEngineCapacity,
                   'image'=>$file_to_store
                ]);
                break;
            case '2':
                Advertisment::create([
                    'version'=>2,
                    'advCat'=>$request->advCat,
                    'advLink'=>$request->advLink,
                    'image'=>$file_to_store
                ]);
                break;
            case '3':
                Advertisment::create([
                    'version'=>3,
                    'advCat'=>$request->advCat,
                    'advName'=>$request->advName,
                    'advDetails'=>$request->advDetails,
                    'advLink'=>$request->advLink,
                    'image'=>$file_to_store
                ]);
                break;
        }
        return redirect()->back()->with('message','Done Successfully');

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
