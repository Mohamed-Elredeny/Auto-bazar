<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Mail\ContactusChief;
use App\models\Advandage;
use App\models\Advertisment;
use App\models\Category;
use App\models\City;
use App\models\FuelType;
use App\models\Gearbox;
use App\models\MaintMark;
use App\models\Make;
use App\models\Product;
use App\models\ProfileMaintenance;
use App\models\Section;
use App\models\SellType;
use App\models\ShopType;
use App\models\Specialization;
use App\models\Status;
use App\models\Subscription;
use App\models\TypeCategory;
use App\models\UserFavorite;
use App\models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    public function index()
    {

        //$products =  Product::inRandomOrder()->limit(8)->where('category_id',1)->get();;
        $products = [];
        $productsxyz = [];

        $products1 = Product::inRandomOrder()->limit(4)->where('category_id',1)->get();
        foreach($products1 as $p1){
            $productsxyz [] = $p1;
        }
        $products2= Product::inRandomOrder()->limit(4)->where('category_id',2)->get();
        foreach($products2 as $p1){
            $productsxyz [] = $p1;
        }
        $products4 = Product::inRandomOrder()->limit(4)->where('category_id',4)->get();
        foreach($products4 as $p1){
            $productsxyz [] = $p1;
        }
        if(session()->get('country')){
            foreach($productsxyz as $p1){
                if($p1->user->city->id == session()->get('country')) {
                    $products [] = $p1;
                }
            }
        }


        $categories = Category::get();
        $autoShopsCenters = ProfileMaintenance::inRandomOrder()->limit(3)->get();
        $autoShops = Vendor::inRandomOrder()->limit(3)->get();
        $slider = Advertisment::get();
        $cities = City::get();
        $subscriptions = Subscription::inRandomOrder()->limit(3)->get();
        return view('site.index',compact('products', 'categories', 'autoShops','autoShopsCenters', 'subscriptions','slider','cities'));
    }

    public function category($id)
    {
        $cities = City::get();
        $products = Product::where('category_id',$id)->inRandomOrder()->limit(8)->get();
        $allProducts = Product::where('category_id',$id)->get();
        $sellTypes = SellType::where('category_id',$id)->get();
        $slider = Advertisment::get();
        $autoShops = ProfileMaintenance::inRandomOrder()->limit(8)->get();
        $specialization = Specialization::get();
        return view('site.subcategory',compact('products', 'allProducts', 'sellTypes','id','autoShops','specialization','slider','cities'));
    }
    public function ProfileWithCat($type){
        $specialization = Specialization::get();
        $autoShops = ProfileMaintenance::where('specialization_id',$type)->get();
        return view('site.shops',compact('autoShops','type','specialization'));
    }
    public function  subCategory($sell_type_id){
        //Cars
        $cities = City::get();
        //We need the rest of sell types for the same category
        //So we have to get  the category id for this sell type
        $category_id = SellType::find($sell_type_id)->category_id;
        //Now we can retrieve all products with
        //For this sell type and type category
        $cities = City::get();
        $products = Product::where('sell_type_id',$sell_type_id)->get();
        $sellTypes = SellType::where('category_id',$category_id)->get();
        $marks  = Make::where('sell_type_id',$sell_type_id)->get();
        $statuses = Status::get();
        $merge = [];
        $is_merge = 0;
        return view('site.categoryDetails',compact('products','sellTypes','sell_type_id','cities','statuses','merge','is_merge','marks','cities','category_id'));

    }
    public function searchProduct(Request $request){
        $is_merge =1;
        $sell_type_id = $request->sell_type_id;
        $cities = City::get();
        $statuses = Status::get();
        $category_id = SellType::find($sell_type_id)->category_id;
        $sellTypes = SellType::where('category_id',$category_id)->get();

        ///
        //Category
        $products = Product::where('sell_type_id',$sell_type_id)->get();


        $payment = [] ;
        $country = [] ;
        $city=[];
        $status = [];
        $priceFrom = [] ;
        $price_to= [];
        $year_from = [];
        $year_to = [];

        if($request->payment_method && $request->payment_method != 'sad'){
            foreach($products  as $product){
                if($product['payment_method'] == $request->payment_method){
                   $payment [] = $product->id;
                }
            }
        }//Payment
        if($request->city_id && $request->city_id != 'sad'){
            foreach($products  as $product){
                if($product['city_id'] == $request->city_id){
                    $country [] = $product->id;
                }
            }
        }//Country

        if($request->district_id && $request->district_id != 'sad'){
            foreach($products  as $product){
                if($product['district_id'] == $request->district_id){
                    $city [] = $product->id;
                }
            }
        }
        if($request->status_id){
            foreach($products  as $product){
                if($product['status_id'] == $request->status_id){
                    $status [] = $product->id;
                }
            }
        }
        if($request->priceFrom){
            foreach($products  as $product){
                if(floatval($product['price']) <= floatval($request->price_from)){
                    $priceFrom [] = $product->id;
                }
            }
        }
        if($request->price_to){
            foreach($products  as $product){
                if(floatval($product['price']) >= $request->price_to){
                    $priceTo [] = $product->id;
                }
            }
        }
        if($request->year_from){
            foreach($products  as $product){
                if($product['year_from'] <= $request->year_from){
                    $yearFrom [] = $product->id;
                }
            }
        }
        if($request->year_to){
            foreach($products  as $product){
                if($product['year_to'] >= $request->year_to){
                    $yearTo [] = $product->id;
                }
            }
        }
        $result12=array_unique(array_merge($payment,$country));
        $result34=array_unique(array_merge($city,$status));
        $result56=array_unique(array_merge($priceFrom,$price_to));
        $result78=array_unique(array_merge($year_from,$year_to));

        $result1234=array_unique(array_merge($result12,$result34));
        $result5678=array_unique(array_merge($result56,$result78));

        $merge =array_unique(array_merge($result1234,$result5678));
        $new_merge =[];
        if(count($merge)>0){
            foreach($merge as $mer){
                $new_merge[] = Product::find($mer);
            }
        }
        $merge = $new_merge;



        return view('site.categoryDetails',compact('products','sellTypes','sell_type_id','cities','statuses','merge','is_merge'));

    }
    public function editProfile(Request $request,$type){
        $cities = City::get();
        switch($type){
                case  'vendor':
                    $id=  auth()->user()->id;
                    $admin = Vendor::find($id);
                    if($request->email){
                        if($request->email != $admin->email){
                            $request->validate([
                                'email' => 'unique:vendors',
                            ]);
                        }
                    }

                    if ($request->image) {
                        //unlink(public_path('assets/images/users') .'/' . $admin->image);
                        $fileName = $request->image->getClientOriginalName();
                        $file_to_store = time() . '_' . $fileName ;
                        $request->image->move(public_path('assets/images/users'), $file_to_store);
                    }
                    else{
                        $file_to_store = $admin->image;
                    }

                    if ($request->cover) {
                        //unlink(public_path('assets/images/users') .'/' . $admin->cover);
                        $fileName1 = $request->cover->getClientOriginalName();
                        $file_to_store1 = time() . '_' . $fileName1 ;
                        $request->cover->move(public_path('assets/images/users'), $file_to_store1);
                    }
                    else{
                        $file_to_store1 = $admin->cover;
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
                        'district_id'=>$request->district_id,
                        'shopType'=>$request->shopType,
                        'company_name'=>$request->company_name,
                        'image'=>$file_to_store,
                        'cover'=>$file_to_store1
                    ]);
                    return redirect()->back();
                case 'maintenance':
                    $id=  auth()->user()->id;
                    $admin = ProfileMaintenance::find($id);

                    if($request->email){
                        if($request->email != $admin->email){
                            $request->validate([
                                'email' => 'unique:profile_maintenances',
                            ]);
                        }
                    }

                    if ($request->image) {
                        //unlink(public_path('assets/images/users') .'/' . $admin->photo);
                        $fileName = $request->image->getClientOriginalName();
                        $file_to_store = time() . '_' . $fileName ;
                        $request->image->move(public_path('assets/images/users'), $file_to_store);
                    }
                    else{
                        $file_to_store = $admin->photo;
                    }



                    if ($request->cover) {
                        //unlink(public_path('assets/images/users') .'/' . $admin->cover);
                        $fileName1 = $request->cover->getClientOriginalName();
                        $file_to_store1 = time() . '_' . $fileName1 ;
                        $request->cover->move(public_path('assets/images/users'), $file_to_store1);
                    }
                    else{
                        $file_to_store1 = $admin->cover;
                    }
                    if($request->holidays){
                    $holidays = implode('|', $request->holidays);
        }else{
                        $holidays = '';
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
                        'district_id'=>$request->district_id,
                        'photo'=>$file_to_store,
                        'cover'=>$file_to_store1,
                        'work_hour'=>$request->work_hour,
                        'holidays'=>$holidays,
                        'specialization_id'=>$request->specialization_id,
                        'sellTypeId'=>$request->sellTypeId

                    ]);
                    return redirect()->back();
            }
    }
    public function user_holidays($action){
        //Get
        //Remove
        //Add

        switch($action){
            case 'get':
                break;
            case 'remove':
                break;
            case 'add':
                break;
        }
    }
    public function wishlist(){
        $products = UserFavorite::where('user_id',Auth::user()->id)->get();
        $count = 0;
        $total_price = 0;
        if(count($products) > 0 ){
            $count = count($products);
            foreach($products as $pro){
                $total_price += floatval($pro->price);
            }
        }
        return view('site.wishlist',compact('products','count','total_price'));
    }
    public function Add_Remove_wishlist($action,$product_id){
        if($action == 'add'){
            $exist =  UserFavorite::where('user_id',Auth::user()->id)->where('product_id',$product_id)->get();
            if(count($exist) > 0 ){
                return redirect()->route('wishlist')->with('message','already exist');
            }else {
                UserFavorite::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $product_id
                ]);
            }
            return redirect()->route('wishlist')->with('message','Done Successfully');
        }else{
            $pros = UserFavorite::where('user_id',Auth::user()->id)->where('product_id',$product_id)->get();

            foreach($pros as $pro){
                $pro->delete();
            }
            return redirect()->back()->with('message','Done Successfully');
        }
    }
    public function search_products(Request $request){
        $makes = Make::where('Title_ar','like','%' . $request->key . '%')->orWhere('Title_en','like','%' .$request->key . '%')->orWhere('Title_ku','like','%' .$request->key . '%')->get();
        $makes_ids = [];
        foreach($makes as $make){
            $makes_ids [] = $make->id;
        }
        $products =  Product::whereIn('make_id',$makes_ids)->orWhere('title','like', '%' . $request->key . '%')->get();
        $count  = count($products);
        return view('site.search',compact('products','count','key'));
    }
    public function contact(Request $request){
        $messagee = $request->message;
        $emaill = $request->user_email;
        $subjecttt = $request->subject;
        Mail::to('businessautobazaar@gmail.com')->send(new Contact($emaill, $subjecttt, $messagee));
        return redirect()->back()->with('message','Your email has been sent successfully !');
    }
    public function viewVendorMakes($vendor){
        $cities = City::get();
        $sell_type_id = ProfileMaintenance::find($vendor)->sell_type_id;
        $makes = Make::where('sell_type_id',$sell_type_id)->get();

        $all_marks = MaintMark::where('maint_Id',$vendor)->get();
        $pure_marks = [];
        foreach($all_marks as $m ){
            $pure_marks [] = $m['mark_id'];
        }
        return view('site.addVendorMarks',compact('vendor','makes','sell_type_id','pure_marks','cities'));
    }
    public function handleVendorMark($process,$mark_id){
        $cities = City::get();

        switch($process){
            case 'add':
                MaintMark::create([
                    'maint_Id'=> Auth::user()->id,
                    'mark_id'=>$mark_id
                ]);
                return redirect()->back();
            case 'remove':
             $all_marks =MaintMark::where('maint_Id',Auth::user()->id)->where('mark_id',$mark_id)->get();
             foreach($all_marks as $al_mark){
                 $al_mark->delete();
             }
             return redirect()->back();

        }
    }
    public function product($id)
    {
        $cities = City::get();
        $product = Product::find($id);
        $vendor_products = $product->user_id;
        $makes_products = $product->make_id;
        $vendor_products = Product::where('user_id',$vendor_products)->limit(8)->get();
        $makes_products = Product::where('make_id',$makes_products)->limit(8)->get();
        return view('site.productDetails',compact('product','vendor_products','makes_products','cities'));
    }
    public function productEdit($id){
        $cities = City::get();
        $product = Product::find($id);
        $type = $product->category_id;
        $rent = $product->rent;
        $images = explode('|',$product->images);

       $sellTypes  = SellType::where('category_id',$type)->get();
       $statuses   = Status::get();
       $gearboxes  = Gearbox::get();
       $fuels = FuelType::get();
       $advandages  = Advandage::get();
        $users=  Vendor::get();
        $types = Category::get();
        $sections = Section::get();
        $shopTypes  = ShopType::get();


        $category = SellType::where('category_id',3)->get();

        return view('site.editProduct',compact(
            'id','cities','product','cities',
            'sellTypes','statuses','gearboxes','fuels','advandages','users','types',
            'rent','images','type','category','sections','shopTypes'
        ));
    }
    public function productUpdate(Request $request){

        $product = Product::find($request->product_id);


        $rent = $request->rent;
        $makesId = $request->makesId;
        $model = $request->model;
        $status_id = $request->status_id;
        $year = $request->year;
        $gearbox_id = $request->gearbox_id;
        $fuel_type_id = $request->fuel_type_id;
        $work_hour = $request->work_hour;
        $distance = $request->distance;
        $color = $request->color;
        $payment_method =$request->payment_method;
        $city_id = $request->city_id;
        $district_id = $request->district_id;
        $interior_brush = $request->interior_brush;
        $interior_color = $request->interior_color;
        $price = $request->price;
        $country = $request->country;
        $section_id = $request->section_id;
        $description = $request->description;
        $slinder_number= $request->slinder_number;
        $engine_capacity=  $request->engine_capacity;


        $images = $request->images;
        if($request->advandage_id) {
            $advandages = implode('|', $request->advandage_id);
        }else{
            $advandages = $product->advandage_id;
        }

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
            // 'subcategory_id' => $request->subcategory_id,
            'section_id'=>$section_id,
            'make_id' => $makesId,
            'model' => $model,
            'status_id' => $status_id,
            'year' => $year,
            'gearbox_id' => $gearbox_id,
            'fuel_type_id' => $fuel_type_id,
            'distance' => $distance,
            'work_hour' => $work_hour,
            'color' => $color,
            'payment_method' => $payment_method,
            'city_id' => $city_id,
            'district_id' => $district_id,
            'advandage_id' => $advandages,
            'interior_brush' => $interior_brush,
            'interior_color' => $interior_color,
            'images' => $images,
            'price' => $price,


            //Spare parts
            'country'=>$country,


            //Expect Spare parts & Trucks cars and heavy equipments
            'slinder_number'=>$request->slinder_number,
            'engine_capacity'=>$request->engine_capacity,


            //Generators
            'fuel_tank_size'=>$request->fuel_tank_size,
            'engine_type'=>$request->engine_type,
            'number_of_phase'=>$request->number_of_phase,
            'frequency_rate'=>$request->frequency_rate,
            'muffler_box'=>$request->muffler_box,
            'ability'=>$request->ability,
            'capacity'=>$request->capacity,
             'title'=>$request->title,


            'rent_type'=>$rent,
            'rent_period'=>$request->rent_period
        ]);
        return redirect()->back()->with('message','Done Successfully');

    }

    public function get_all_shops(){
        $autoShops = Vendor::get();
        return view('site.all_shops',compact('autoShops'));
    }
}
