<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth::user()) {
            $employeeNumber = auth::user()->employeeNumber;
            $role = DB::table('employees')
            ->select('jobTitle')
            ->where('employeeNumber','=', $employeeNumber)
            ->get();
                if(true){
                    if ($role[0]->jobTitle == "President"){
                        return $next($request);
                    }
                } else {
                    return redirect() -> route('login') -> with('error',"You dont have permission to access this page");
                }
        } else {
            return redirect() -> route('home');
        }
    }
        
        
}

