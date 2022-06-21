<?php

namespace App\Http\Controllers\Admin;

use App\models\City;
use App\User;
use App\models\Make;
use App\models\Status;
use App\models\FuelType;
use App\models\SellType;
use Illuminate\Http\Request;
use App\models\Generator;
use App\Http\Controllers\Controller;

class generatorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Generator::where('category_id', 4)->get();
        return view('admin.generators.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellTypes = SellType::where('category_id', 4)->get();
        $makes = Make::get();
        $users = User::get();
        $statuses = Status::get();
        $fuels = FuelType::get();
        $cities = City::get();

        return view('admin.generators.create', compact('fuels', 'sellTypes', 'makes', 'users', 'statuses','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $x = [];
        for ($i = 0; $i < count($request->images); $i++) {
            $imageName = time() .  $i . '.' . $request->images[$i]->getClientOriginalExtension();
            $x[$i] = $imageName;
            $request->images[$i]->move(public_path('assets/images/products'), $imageName);
        }
        $images = implode('|', $x);

        Generator::create([
            'category_id' => $request->category_id,
            'sell_type_id' => $request->sell_type_id,
            'make_id' => $request->make_id,
            'model' => $request->model,
            'status_id' => $request->status_id,
            'fuel_type_id' => $request->fuel_type_id,
            'country' => $request->country,
            'ability' => $request->ability,
            'capacity' => $request->capacity,
            'fuel_tank_size' => $request->fuel_tank_size,
            'engine_type' => $request->engine_type,


            'number_of_phase' => $request->number_of_phase,
            'frequency_rate' => $request->frequency_rate,
            'muffler_box' => $request->muffler_box,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'images' => $images,
            'price' => $request->price,
            'title'=>$request->title,
            'slinder_number'=>$request->slinder_number,
            'engine_capacity'=>$request->engine_capacity,

            'rent'=>0
        ]);
        return redirect()->route('admin.generators.index')->with('success', 'The product has created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Generator::find($id);
        return view('admin.generators.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sellTypes = SellType::where('category_id', 4)->get();
        $makes = Make::get();
        $users = User::get();
        $statuses = Status::get();
        $fuels = FuelType::get();
        $product = Generator::find($id);
        return view('admin.generators.edit', compact('fuels', 'sellTypes', 'makes', 'users', 'statuses','product'));
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
        $product = Generator::find($id);

        if ($request->images) {
            $x = [];
            for ($i = 0; $i < count($request->images); $i++) {
                $imageName = time() .  $i . '.' . $request->images[$i]->getClientOriginalExtension();
                $x[$i] = $imageName;
                $request->images[$i]->move(public_path('assets/images/products'), $imageName);
            }
            $images = implode('|', $x);
        }
        else{
            $images = $product->images;
        }

        $product->update([
            'category_id' => $request->category_id,
            'sell_type_id' => $request->sell_type_id,
            'make_id' => $request->make_id,
            'model' => $request->model,
            'status_id' => $request->status_id,
            'fuel_type_id' => $request->fuel_type_id,
            'country' => $request->country,
            'ability' => $request->ability,
            'capacity' => $request->capacity,
            'fuel_tank_size' => $request->fuel_tank_size,
            'engine_type' => $request->engine_type,
            'number_of_phase' => $request->number_of_phase,
            'frequency_rate' => $request->frequency_rate,
            'muffler_box' => $request->muffler_box,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'images' => $images,
            'price' => $request->price,
        ]);
        return redirect()->route('admin.generators.index')->with('success', 'The product has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Generator::find($id);
        $old->delete();
        return redirect()->route('admin.generators.index')->with('success', 'Deleted successfully');
    }

    public function getSections(Request $request)
    {
        $makes = Make::where('sell_type_id', $request->sellTypeId)->get();

        return response()->json([
            'makes' => $makes,
        ]);
    }
}
