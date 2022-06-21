<?php

namespace App\Http\Controllers\Admin;

use App\models\City;
use App\models\SellType;
use App\models\Subscription;
use App\models\TypeCategory;
use Illuminate\Http\Request;
use App\models\ProfileMaintenance;
use App\Http\Controllers\Controller;
use App\models\District;
use App\models\Specialization;
use Illuminate\Support\Facades\Hash;

class ProfileMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profileMaintenance = ProfileMaintenance::get();
        $cities = City::get();
        return view('admin.profileMaintenance.index',compact('profileMaintenance','cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = SellType::where('category_id',3)->get();
        $typeCategory = TypeCategory::get();
        $allCities  = City::get();
        $districts = District::get();
        $specialization = Specialization::get();
        return view('admin.profileMaintenance.create', compact('specialization', 'districts', 'category', 'typeCategory', 'allCities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileNameCover = $request->cover->getClientOriginalName();
        $file_to_store_cover = time() . '_' . $fileNameCover ;
        $request->cover->move(public_path('assets/images/profileMaintenance'), $file_to_store_cover);

        $fileNamePhoto = $request->photo->getClientOriginalName();
        $file_to_store_photo = time() . '_0' . $fileNamePhoto ;
        $request->photo->move(public_path('assets/images/profileMaintenance'), $file_to_store_photo);

        $request['password'] = Hash::make($request->password);
        ProfileMaintenance::create([
            'sell_type_id' => $request->sell_type_id,
            'type_category_id' => $request->type_category_id,
            'email' => $request->email,
            'password' => $request->password,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instgram' => $request->instgram,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'specialization_id' => $request->specialization_id,
            'work_hour' => $request->work_hour,
            'holidays' => $request->holidays,
            'cover' => $file_to_store_cover,
            'photo' => $file_to_store_photo,
            'address' => $request->address,
            'name' => $request->name,
        ]);
        return redirect()->route('admin.profileMaintenance.index')->with('success', 'The profile Maintenance has created successfully.');
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
        $profileMaintenance = ProfileMaintenance::find($id);
        $sellType = SellType::get();
        $typeCategory = TypeCategory::get();
        $cities = City::get();
        $districts = District::get();
        $specialization = Specialization::get();
        return view('admin.profileMaintenance.edit', compact('profileMaintenance', 'specialization', 'districts', 'sellType', 'typeCategory', 'cities'));
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
        $user = ProfileMaintenance::find($id);

        if ($request->cover) {
            unlink(public_path('assets/images/profileMaintenance') .'/' . $user->cover);
            $fileName_cover = $request->cover->getClientOriginalName();
            $file_to_store_cover = time() . '_' . $fileName_cover ;
            $request->cover->move(public_path('assets/images/profileMaintenance'), $file_to_store_cover);
        }
        else{
            $file_to_store_cover = $user->cover;
        }

        if ($request->photo) {
            unlink(public_path('assets/images/profileMaintenance') .'/' . $user->photo);
            $fileName_photo = $request->photo->getClientOriginalName();
            $file_to_store_photo = time() . '_0' . $fileName_photo ;
            $request->photo->move(public_path('assets/images/profileMaintenance'), $file_to_store_photo);
        }
        else{
            $file_to_store_photo = $user->photo;
        }

        $user->update([
            'sell_type_id' => $request->sell_type_id,
            'type_category_id' => $request->type_category_id,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instgram' => $request->instgram,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'specialization_id' => $request->specialization_id,
            'work_hour' => $request->work_hour,
            'holidays' => $request->holidays,
            'cover' => $file_to_store_cover,
            'photo' => $file_to_store_photo,
            'address' => $request->address,
            'name' => $request->name,
        ]);
        return redirect()->route('admin.profileMaintenance.index')->with('success', 'The profileMaintenance has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = ProfileMaintenance::find($id);
        $old->delete();
        return redirect()->route('admin.profileMaintenance.index')->with('success', 'Deleted successfully');
    }
}
