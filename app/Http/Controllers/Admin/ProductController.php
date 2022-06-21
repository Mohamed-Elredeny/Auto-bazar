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

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rent,$category_id)
    {
        $products = Product::where('category_id', $category_id)->where('rent',$rent)->get();
        return view('admin.products.index',compact('products','category_id','rent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($rent,$category_id)
    {
        $sellTypes = SellType::where('category_id', $category_id)->get();
        $sectionssections = Section::get();
        $typeCategories = TypeCategory::get();
        $makes = Make::get();
        $cities = City::get();
        $users = User::get();
        $statuses = Status::get();
        $gearboxes = Gearbox::get();
        $fuels = FuelType::get();
        $advandages = Advandage::get();
        return view('admin.products.create', compact('advandages', 'fuels', 'gearboxes', 'sellTypes', 'typeCategories', 'makes', 'cities', 'users', 'statuses','rent','category_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->images) {
            $x = [];
            for ($i = 0; $i < count($request->images); $i++) {
                $imageName = time() . $i . '.' . $request->images[$i]->getClientOriginalExtension();
                $x[$i] = $imageName;
                $request->images[$i]->move(public_path('assets/images/products'), $imageName);
            }

            $images = implode('|', $x);
        }
        if($request->advandage_id) {
            $advandages = implode('|', $request->advandage_id);
        }else{
            $advandages ='';
        }
        Product::create([
            'rent'=>$request->rent,
            'category_id' => $request->category_id,
            // 'subcategory_id' => $request->subcategory_id,
            'sell_type_id' => $request->sell_type_id,
            'section_id' => $request->section_id,
            'type_category_id' => $request->type_category_id,
            'make_id' => $request->make_id,
            'model' => $request->model,
            'status_id' => $request->status_id,
            'year' => $request->year,
            'gearbox_id' => $request->gearbox_id,
            'fuel_type_id' => $request->fuel_type_id,
            'distance' => $request->distance,
            'work_hour' => $request->work_hour,
            'color' => $request->color,
            'payment_method' => $request->payment_method,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'advandage_id' => $advandages,
            'interior_brush' => $request->interior_brush,
            'interior_color' => $request->interior_color,
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
            'images' => $images,
            'price' => $request->price,
            'rent_period'=>$request->rent_period,

            'slinder_number'=>$request->slinder_number,
            'engine_capacity'=>$request->engine_capacity,

            'country'=>$request->country,
            'ability'=>$request->ability,
            'capacity'=>$request->capacity,
            'fuel_tank_size'=>$request->fuel_tank_size,
            'engine_type'=>$request->engine_type,
            'number_of_phase'=>$request->number_of_phase,
            'frequency_rate'=>$request->frequency_rate,
            'muffler_box'=>$request->muffler_box,
        ]);
        return redirect()->route('admin.products.index',['category_id'=>$request->category_id,'rent'=>$request->rent])->with('success', 'The product has created successfully.');
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
        $product = Product::find($id);
        return view('admin.products.show', compact('advandages', 'product'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sellTypes = SellType::where('category_id', 1)->get();
        $sections = Section::get();
        $typeCategories = TypeCategory::get();
        $makes = Make::get();
        $cities = City::get();
        $users = User::get();
        $statuses = Status::get();
        $gearboxes = Gearbox::get();
        $fuels = FuelType::get();
        $advandages = Advandage::get();
        $product = Product::find($id);
        return view('admin.products.edit', compact('id','advandages', 'fuels','gearboxes', 'sellTypes', 'sections', 'typeCategories', 'makes', 'cities', 'users', 'product', 'statuses'));
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
        $advandages = implode('|', $request->advandage_id);

        $product->update([
            'category_id' => $request->category_id,
            // 'subcategory_id' => $request->subcategory_id,
            'sell_type_id' => $request->sell_type_id,
            'section_id' => $request->section_id,
            'type_category_id' => $request->type_category_id,
            'make_id' => $request->make_id,
            'model' => $request->model,
            'status_id' => $request->status_id,
            'year' => $request->year,
            'gearbox_id' => $request->gearbox_id,
            'fuel_type_id' => $request->fuel_type_id,
            'distance' => $request->distance,
            'work_hour' => $request->work_hour,
            'color' => $request->color,
            'payment_method' => $request->payment_method,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'advandage_id' => $advandages,
            'interior_brush' => $request->interior_brush,
            'interior_color' => $request->interior_color,
            'product_type' => $request->product_type,
            'user_id' => $request->user_id,
            'images' => $images,
            'price' => $request->price,

            'type_category_id_parts'=>$request->type_category_id_parts,
            'country'=>$request->country,
            'ability'=>$request->ability,
            'capacity'=>$request->capacity,
            'fuel_tank_size'=>$request->fuel_tank_size,
            'engine_type'=>$request->engine_type,
            'number_of_phase'=>$request->number_of_phase,
            'frequency_rate'=>$request->frequency_rate,
            'muffler_box'=>$request->muffler_box,

            'slinder_number'=>$request->slinder_number,
            'engine_capacity'=>$request->engine_capacity,

            'rent_type'=>$request->rent_type,
            'rent_period'=>$request->rent_period
        ]);
        return redirect()->back();
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
        return redirect()->route('admin.products.index',['category_id'=>$request->category_id,'rent'=>$request->rent])->with('success', 'Deleted successfully');
    }

    public function getSections(Request $request)
    {
        $sections = Section::where('sell_type_id',$request->sellTypeId)->get();
        $typeCategories = TypeCategory::where('sell_type_id', $request->sellTypeId)->get();
        $makes = Make::where('sell_type_id', $request->sellTypeId)->get();
        return response()->json([
            'sections' =>$sections,
            'typeCategories' => $typeCategories,
            'makes' => $makes,
        ]);
    }

    public function getSectionstest()
    {
        $sections = Section::get();
        //dd($sections);
         return response()->json($sections);
    }

    public function getDistricts(Request $request)
    {
        $districts = District::where('city_id', $request->cityId)->get();
        return response()->json($districts);
    }
}
