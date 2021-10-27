<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class isVPMarketing
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
        $id = Auth::user()->email;
        $jobtitle = DB::table('employees')
        ->select('jobTitle')
        ->where('employeeNumber',$id)
        ->get();
        //dd($jobtitle[0]->jobTitle);
        if(str_contains($jobtitle[0]->jobTitle, 'VP Marketing')){
            return redirect()->route('admin')->with('msg','you dont have role for this features');
        }
        return $next($request);
    }
}
