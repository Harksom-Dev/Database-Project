<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
    public function login(request $request) {
        
        $input = $request->all();

        // dd($input);
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $password =   DB::table('employees_logindata')
                        ->select('password')
                        ->where('employeeNumber','=',$request->username)
                        ->get();

        // $test = array($request->password, $password[0]->password);
        // dd($test);

        if (password_verify($request->password, $password[0]->password)) {

            $role = DB::table('employees')
                    ->select('jobTitle')
                    ->where('employeeNumber','=',$request->username)
                    ->get();
            // dd($role[0]->jobTitle);
            switch ($role[0]->jobTitle) {
                case "President":
                    $token = encrypt($request->username,"!@#$%^&*(");
                    $user = Auth::user();
                    // dd(Auth::check());
                    return redirect()->route('psd.home', ['token' => $token]);
                    break;
                case "Sale Manager (EMEA)":
                    return redirect()->route('SaleManagertHome')-> with('success', "login completed");
                    break;
                case "Sales Manager (APAC)":
                    return redirect()->route('SaleManagertHome')-> with('success', "login completed");
                    break;
                case "Sales Manager (NA)":
                    return redirect()->route('SaleManagertHome')-> with('success', "login completed");
                    break;
                case "VP Marketing":
                    return redirect()->route('VPMarketingHome')-> with('success', "login completed");
                    break;
                case "VP Sales":
                    return redirect()->route('VPSalesHome')-> with('success', "login completed");
                    break;
                case "Sales Rep":
                    return redirect()->route('SalesRepHome')-> with('success', "login completed");
                    break;
            };
        }
        return back()->with('error', "userID and password are wrong.");
    }
}
