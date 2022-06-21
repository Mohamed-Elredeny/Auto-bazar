<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Subscription;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subscription = Subscription::get();
        return view('admin.users.create', compact('subscription'));
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
        $request->cover->move(public_path('assets/images/users'), $file_to_store_cover);

        $fileNamePhoto = $request->photo->getClientOriginalName();
        $file_to_store_photo = time() . '_0' . $fileNamePhoto ;
        $request->photo->move(public_path('assets/images/users'), $file_to_store_photo);

        $request['password'] = Hash::make($request->password);
        User::create([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instgram' => $request->instgram,
            'city_id' => $request->city_id,
            'company_name' => $request->company_name,
            'jurisdiction' => $request->jurisdiction,
            'register_type' => $request->register_type,
            'subscription_id' => $request->subscription_id,
            'cover' => $file_to_store_cover,
            'photo' => $file_to_store_photo,
        ]);
        return redirect()->route('admin.users.index')->with('success', 'The user has created successfully.');
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
        $user = User::find($id);
        $subscription = Subscription::get();
        return view('admin.users.edit', compact('user', 'subscription'));
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
        $user = User::find($id);

        if ($request->cover) {
            unlink(public_path('assets/images/users') .'/' . $user->cover);
            $fileName_cover = $request->cover->getClientOriginalName();
            $file_to_store_cover = time() . '_' . $fileName_cover ;
            $request->cover->move(public_path('assets/images/users'), $file_to_store_cover);
        }
        else{
            $file_to_store_cover = $user->cover;
        }

        if ($request->photo) {
            unlink(public_path('assets/images/users') .'/' . $user->photo);
            $fileName_photo = $request->photo->getClientOriginalName();
            $file_to_store_photo = time() . '_0' . $fileName_photo ;
            $request->photo->move(public_path('assets/images/users'), $file_to_store_photo);
        }
        else{
            $file_to_store_photo = $user->photo;
        }

        $user->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instgram' => $request->instgram,
            'city_id' => $request->city_id,
            'company_name' => $request->company_name,
            'jurisdiction' => $request->jurisdiction,
            'register_type' => $request->register_type,
            'subscription_id' => $request->subscription_id,
            'cover' => $file_to_store_cover,
            'photo' => $file_to_store_photo,
        ]);
        return redirect()->route('admin.users.index')->with('success', 'The user has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = User::find($id);
        $old->delete();
        return redirect()->route('admin.users.index')->with('success', 'Deleted successfully');
    }
}
