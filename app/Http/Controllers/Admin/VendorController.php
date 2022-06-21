<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Admin;
use App\models\Advandage;
use App\models\City;
use App\models\Product;
use App\models\ShopType;
use App\models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Vendor::get();

        return view('admin.vendors.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCities = City::get();
        $shopTypes = ShopType::get();
        return view('admin.vendors.create',compact('allCities','shopTypes'));
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
        #region image
        $fileName = $request->image->getClientOriginalName();
        $file_to_store = time() . '_' . $fileName ;
        $request->image->move(public_path('assets/images/users'), $file_to_store);
        #endregion
        #region cover
        $fileName1 = $request->cover->getClientOriginalName();
        $file_to_store1 = time() . '_' . $fileName1 ;
        $request->cover->move(public_path('assets/images/users'), $file_to_store1);
        #endregion


        Vendor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instgram' => $request->instgram,
            'city_id' => $request->city_id,
            'district_id'=>$request->district_id,
            'image'=>$file_to_store,
            'cover'=>$file_to_store1,
            'shopType'=>$request->shopType,
            'company_name'=>$request->company_name
        ]);
        return redirect()->route('admin.vendors.index')->with('success', 'The admin has created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advandages = Advandage::get();
        $product = Vendor::find($id);
        return view('admin.vendors.show', compact('advandages', 'product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = Vendor::find($id);
        $allCities = City::get();
        return view('admin.vendors.edit', compact('city','allCities'));
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
        $admin = Vendor::find($id);

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
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instgram' => $request->instgram,
            'city_id' => $request->city_id,
            'district_id'=>$request->district_id
        ]);
        return redirect()->route('admin.vendors.index')->with('success', 'The admin has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Vendor::find($id);
        $old->delete();
        return redirect()->route('admin.vendors.index')->with('success', 'Deleted successfully');
    }
}
