<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\models\City;
use App\models\Make;
use App\models\Status;
use App\models\Gearbox;
use App\models\Product;
use App\models\Section;
use App\models\FuelType;
use App\models\SellType;
use App\models\Advandage;
use App\models\Subcategory;
use App\models\TypeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\District;

class sparePartsController extends Controller
{
    public function index()
    {
        $products = Product::where('category_id', 2)->get();
        return view('admin.spareParts.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellTypes = SellType::where('category_id', 2)->get();
        $sections = Section::get();
        $typeCategories = TypeCategory::get();
        $makes = Make::get();
        $cities = City::get();
        $users = User::get();
        $statuses = Status::get();
        $gearboxes = Gearbox::get();
        $fuels = FuelType::get();
        $advandages = Advandage::get();
        return view('admin.spareParts.create', compact('advandages', 'fuels', 'gearboxes', 'sellTypes', 'sections', 'typeCategories', 'makes', 'cities', 'users', 'statuses'));
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

        Product::create([
            'category_id' => $request->category_id,
            // 'subcategory_id' => $request->subcategory_id,
            'sell_type_id' => $request->sell_type_id,
            'section_id' => $request->section_id,
            'type_category_id' => $request->type_category_id,
            'make_id' => $request->make_id,
            'model' => $request->model,
            'status_id' => $request->status_id,
            'year' => $request->year,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'product_type' => $request->product_type,
            'user_id' => $request->user_id,
            'images' => $images,
        ]);
        return redirect()->route('admin.spareParts.index')->with('success', 'The product has created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin.spareParts.show', compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sellTypes = SellType::get();
        $sections = Section::get();
        $typeCategories = TypeCategory::get();
        $makes = Make::get();
        $cities = City::get();
        $users = User::get();
        $statuses = Status::get();
        $product = Product::find($id);
        return view('admin.spareParts.edit', compact( 'sellTypes', 'sections', 'typeCategories', 'makes', 'cities', 'users', 'product', 'statuses'));
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
        $product = Product::find($id);

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
            'section_id' => $request->section_id,
            'type_category_id' => $request->type_category_id,
            'make_id' => $request->make_id,
            'model' => $request->model,
            'status_id' => $request->status_id,
            'year' => $request->year,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'product_type' => $request->product_type,
            'user_id' => $request->user_id,
            'images' => $images,
        ]);
        return redirect()->route('admin.spareParts.index')->with('success', 'The product has updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old = Product::find($id);
        $old->delete();
        return redirect()->route('admin.spareParts.index')->with('success', 'Deleted successfully');
    }

    public function getSections(Request $request)
    {
        $sections = Section::where('sell_type_id', $request->sellTypeId)->get();
        $makes = Make::where('sell_type_id', $request->sellTypeId)->get();

        return response()->json([
            'sections' =>$sections,
            'makes' => $makes,
        ]);
    }

    public function getSectionstest()
    {
        $sections = Section::where('sell_type_id', 1)->get();
        dd($sections);
        // return response()->json($sections);
    }

    public function getDistricts(Request $request)
    {
        $districts = District::where('city_id', $request->cityId)->get();
        return response()->json($districts);
    }
}
