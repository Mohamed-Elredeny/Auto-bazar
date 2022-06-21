<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\models\Category;
use App\models\City;
use App\models\Make;
use App\models\ProfileMaintenance;
use App\models\SellType;
use App\models\ShopType;
use App\models\Specialization;
use App\models\Vendor;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use function Symfony\Component\String\s;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     //   $this->middleware('guest');
    }
    public function showRegisterForm($type){
        $cities = City::get();
        $category = SellType::where('category_id',3)->get();
        $specialization = Specialization::get();
        $shopTypes = ShopType::get();
        $makes = Make::get();
        switch($type) {
            case 'vendor':
                return view('site.register',compact('cities','type','category','specialization','makes','shopTypes'));
            default :
                return view('site.register',compact('cities','type','category','specialization','makes','shopTypes'));
        }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \app\User
     */
    public function RegisterFormSubmit(Request $request){
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:vendors'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $type =$request->type;

        if($request->photo) {
            $fileName = $request->photo->getClientOriginalName();
            $file_to_store = time() . '_' . $fileName;
            $request->photo->move(public_path('assets/images/users'), $file_to_store);
        }else{
            $file_to_store = null;
        }
        if($request->cover) {
            $fileName1 = $request->cover->getClientOriginalName();
            $file_to_store1 = time() . '_' . $fileName1;
            $request->cover->move(public_path('assets/images/users'), $file_to_store1);
        }else{
            $file_to_store1 = null;
        }
        $fname = $request['fname'];
        $lname = $request['lname'];
        $phone1 = $request['phone1'];
        $phone2 = $request['phone2'];

        switch($type){
        case 'maintenance':
            $holidays = implode('|', $request->holidays);

            $vendor = ProfileMaintenance::create([
                'name' => $fname . $lname,
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'phone1'=>$phone1,
                'phone2'=>$phone2,
                'facebook'=>$request['facebook'],
                'twitter'=>$request['twitter'],
                'instgram'=>$request['instgram'],
                'city_id'=>$request['city_id'],
                'district_id'=>$request['district_id'],
                'image'=>$file_to_store,
                'cover'=>$file_to_store1,
                'sell_type_id'=>$request->sellTypeId,
                'type_category_id'=>$request->type_category_id,
                'specialization_id'=>$request->specialization_id,
                'work_hour'=>$request->work_hour,
                'holidays'=>$holidays,
//                'shopType'=>$request->shopType

            ]);
        break;
        default:
        $vendor = Vendor::create([
            'name' => $fname . $lname,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone1'=>$phone1,
            'phone2'=>$phone2,
            'facebook'=>$request['facebook'],
            'twitter'=>$request['twitter'],
            'instgram'=>$request['instgram'],
            'company_name'=>$request['company_name'],
            'jurisdiction'=>$request['jurisdiction'],
            'city_id'=>$request['city_id'],
            'district_id'=>$request['district_id'],
            'image'=>$file_to_store,
            'cover'=>$file_to_store1,
            'shopType'=>$request->shopType

        ]);
    }
        return redirect()->route('auth.login');



    }
    protected function create(array $data)
    {
        $fname = $data['fname'];
        $lname = $data['lname'];
        $phone1 = $data['phone1'];
        $phone2 = $data['phone2'];
          Vendor::create([
            'name' => $fname . $lname,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone1'=>$phone1,
            'phone2'=>$phone2,
            'facebook'=>$data['facebook'],
            'twitter'=>$data['twitter'],
            'instgram'=>$data['instgram'],
            'company_name'=>$data['company_name'],
            'jurisdiction'=>$data['jurisdiction'],
            'city_id'=>$data['city_id'],
            'district_id'=>$data['district_id']
        ]);

    }
}
