<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
        $input = $request->all();
        $role = DB::table('employees')
                    ->select('jobTitle')
                    ->where('employeeNumber','=',$input['id'])
                    ->get();
                    
        if ($role[0]->jobTitle == "President"){
            return $next($request);
        }
        return redirect() -> route('login') -> with('error',"You dont have permission to access this page");
    }
}
