<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\models\Advandage;
use App\models\City;
use App\models\District;
use App\models\FuelType;
use App\models\Gearbox;
use App\models\Make;
use App\models\Product;
use App\models\Section;
use App\models\SellType;
use App\models\Status;
use App\models\TypeCategory;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category,$rent)
    {
        $sellTypes = SellType::where('category_id', $category)->get();
        $sectionssections = Section::get();
        $typeCategories = TypeCategory::get();
        $makes = Make::get();
        $cities = City::get();
        $users = User::get();
        $statuses = Status::get();
        $gearboxes = Gearbox::get();
        $fuels = FuelType::get();
        $advandages = Advandage::get();
        return view('site.addProduct',compact('sellTypes','sectionssections','typeCategories','makes','cities','users',
        'statuses','gearboxes','fuels','advandages','category','rent'));

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

        $sellTypeId = $request->sellTypeId;
        if($sellTypeId == 'sad'){
            $sellTypeId = null;
        }
        $sectionId = $request->sectionId;
        if($sectionId == 'sad'){
            $sectionId = null;
        }
        $typeCategoriesId = $request->typeCategoriesId;
        if($typeCategoriesId == 'sad'){
            $typeCategoriesId = null;
        }
        $makesId = $request->makes;

        $model = $request->model;
        $statuses = $request->statuses;
        $gearbox_id = $request->gearbox_id;
        $distance = $request->distance;
        $workhours = $request->workhours;
        $color = $request->color;
        $payment_method = $request->payment_method;
        $cityId = $request->cityId;
        $districtId = $request->districtId;
        $interior_brush = $request->interior_brush;
        $Interior_color = $request->Interior_color;
        $title = $request->title;
        $Description = $request->Description;
        $year = $request->year;
        $fuel_type_id  =$request->fuel_type_id;
        $price = $request->price;
        if(isset($request->advandages)){
            $advandages = implode(',',$request->advandages);
        }else {
            $advandages = '';
        }
        $rent= $request->rent;


        $create = Product::create([
            // 'subcategory_id' => $request->subcategory_id,
            'sell_type_id' => $sellTypeId,
            'section_id' => $sectionId,
            'type_category_id' => $typeCategoriesId,
            'make_id' => $makesId,
            'model' => $model,
            'status_id' => $statuses,
            'year' => $year,
            'gearbox_id' => $gearbox_id,
            'distance' => $distance,
            'work_hour' => $workhours,
            'color' => $color,
            'payment_method' => $payment_method,
            'city_id' => $cityId,
            'district_id' => $districtId,
            'interior_brush' => $interior_brush,
            'interior_color' => $Interior_color,
            'title' => $title,
            'description' => $Description,
            'user_id' => auth()->user()->id,
            'images' => $images,
            'price' => $request->price,
            'advandage_id' => $advandages,
            'fuel_type_id' => $fuel_type_id,
            'rent'=>$rent,
            'category_id' =>$request->category_id,
            'slinder_number'=>$request->slinder_number,
            'engine_capacity'=>$request->engine_capacity,
            'rent_type'=>$request->rent_type,
            'rent_period'=>$request->rent_period
        /*
            'rent_period'=>$request->rent_period
        */
        ]);
        return redirect()->route('profile-index',['type'=>'vendor','id'=>auth()->user()->id]);
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
        Product::destroy($id);
        return redirect()->back()->with('message', 'Your Product has been deleted successfully');
    }



    public function getProductSections(Request $request)
    {
        $type = SellType::find($request->sellType);
        if($type->Title_en == 'heavy equipment'){
            $sections = Section::get();
        }else{
            $sections = [];
        }
        $typeCategories = TypeCategory::where('sell_type_id', $request->sellType)->get();
        $makes = Make::where('sell_type_id', $request->sellType)->get();
        return response()->json([
            'sections' =>$sections,
            'typeCategories' => $typeCategories,
            'makes' => $makes,
        ]);
    }
    public function getDistricts(Request $request){
        $districts = District::where('city_id', $request->cityId)->get();
        return response()->json(
            [
                'districts'=>$districts
            ]);
    }
    public function SearchProducts(Request $request){
        $products = [];
        $view_products = [];
        $category = $request->category;
        $sell_type = $request->sell_type;


        $payment_method =Product::where('payment_method',$request->payment_method)->where('category_id',$category)->where('sell_type_id',$sell_type)->get();
        foreach($payment_method as $pay_method ){
            $products [] = $pay_method->id;
        }
        $country =Product::where('city_id',$request->city_id)->where('category_id',$category)->where('sell_type_id',$sell_type)->get();
        foreach($country as $pay_method ){
            $products [] = $pay_method->id;
        }
        $city =Product::where('district_id',$request->district_id)->where('category_id',$category)->where('sell_type_id',$sell_type)->get();
        foreach($city as $pay_method ){
            $products [] = $pay_method->id;
        }
        $status =Product::where('status_id',$request->status_id)->where('category_id',$category)->where('sell_type_id',$sell_type)->get();
        foreach($status as $pay_method ){
            $products [] = $pay_method->id;
        }
        $mark =Product::where('make_id',$request->make_id)->where('category_id',$category)->where('sell_type_id',$sell_type)->get();
        foreach($mark as $pay_method ){
            $products [] = $pay_method->id;
        }

        $price_from =$request->priceFrom;
        $price_to =$request->priceTo;
        $products =  array_unique($products);
        foreach($products as $product){
          $view_products [] =   Product::find($product);
        }

        $response = [
         'payment_method'=>   $payment_method ,
         'country' => $country,
         'city' => $city,
         'status' => $status,
         'price_from' => $price_from,
         'price_to' => $price_to,
         'mark' => $mark,
        ];


        $cities = City::get();
        //We need the rest of sell types for the same category
        //So we have to get  the category id for this sell type
        $category_id = SellType::find($sell_type)->category_id;
        //Now we can retrieve all products with
        //For this sell type and type category
        $cities = City::get();
        $products = $view_products;
        $sellTypes = SellType::where('category_id',$category_id)->get();
        $marks  = Make::where('sell_type_id',$sell_type)->get();
        $statuses = Status::get();
        $merge = [];
        $is_merge = 0;
        $sell_type_id = $sell_type;
        return view('site.categoryDetailsSearch',compact('products','sellTypes','sell_type_id','cities','statuses','merge','is_merge','marks','cities','category_id'));
    }
    public function changeProductSellType($proId, $sellTypeId){
        $product = Product::find($proId);
        $product->update([
           'sell_type_id'=>$sellTypeId
        ]);
        return redirect()->back();
    }
    public function setMakeIdAsASessoin(){

    }
}
