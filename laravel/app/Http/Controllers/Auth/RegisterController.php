<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
        $this->middleware('guest');
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
            'EmployeeID' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $result =   DB::table('employees')
                    ->select('employeeNumber')
                    ->where('employeeNumber','=',(int)$data['EmployeeID'])
                    ->get();

        if (count($result) == 0) {//dont have any match in employees database

            return view('auth.register')->with('error', "dont have any match in employees database");

        } else {

            $result =   DB::table('employees_logindata')
                        ->select('employeeNumber')
                        ->where('employeeNumber','=',(int)$data['EmployeeID'])
                        ->get();

            if (count($result) == 0) {

                DB::table('employees_logindata')->insert([
                    'employeeNumber' => $data['EmployeeID'],
                    'password' => Hash::make($data['password']),
                ]);

                return back()->with('success', "registration successful!");
            } else {

                return back()->with('error', "this employeesID is already registered");
            }
        }
        
    }
}
