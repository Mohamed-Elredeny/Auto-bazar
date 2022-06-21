<?php

namespace App\Http\Controllers\Auth;
use App\models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Route;
class LoginController extends Controller
{
    public $id;
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

   // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest:admin')->except('logout');
        /*$this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:profile_maintenance')->except('logout');*/
    }

    public function showLoginForm()
    {
        $cities  = City::get();
        return view('auth.login',compact('cities'));
    }

    public function UserLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            config()->set('auth.defaults.guard', 'admin');
            $this->id = auth()->user()->id;
            //return 1;
            // if successful, then redirect to their intended location
            return redirect()->route('admin.admin.home');
        }
        if (Auth::guard('vendor')->attempt(['email' => $request->email, 'password' => $request->password])) {
            config()->set('auth.defaults.guard', 'vendor');
            $this->id = auth()->user()->id;
            // if successful, then redirect to their intended location
            return redirect()->route('vendor.profile-index',['type'=>'vendor','id'=>$this->id]);
        }
        if (Auth::guard('profile_maintenance')->attempt(['email' => $request->email, 'password' => $request->password])) {
            config()->set('auth.defaults.guard', 'profile_maintenance');
            $this->id = auth()->user()->id;
            return redirect()->route('maintenance.profile-index',['type'=>'maintenance','id'=>$this->id]);
            // if successful, then redirect to their intended location
            //return redirect()->route('admin.home');
        }

        return redirect()->route('auth.login')->withErrors(['msg'=>'Make Sure you entered correct credentials']);
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('vendor')->logout();
        Auth::guard('web')->logout();
        Auth::guard('profile_maintenance')->logout();
        return redirect()->back();
    }
}
