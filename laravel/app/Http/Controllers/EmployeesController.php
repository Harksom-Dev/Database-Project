<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

class EmployeesController extends Controller
{
    function index(Request $request){
        $employees = Employee::WHERE([
            ['employeeNumber', '!=', Null],
            [function ($query) use ($request){
                if($term = $request-> term){
                    $query
                    -> orWhere('employeeNumber', 'LIKE' , '%'. $term. '%')
                    -> orWhere('firstName', 'LIKE', '%'. $term . '%')
                    -> orWhere('lastName', 'LIKE', '%'. $term . '%')
                    -> orWhere('jobTitle', 'LIKE', '%'. $term . '%')
                    -> get();
                }
            }]
        ])-> paginate(9);

        if(count($employees) != 0){
            return view('employees', compact('employees')) -> with('i', (request()->input('page', 1) -1 ) *5 );
        }else {
            return view('employees', compact('employees')) -> withMessage('No User Found !. Try to search again !');
        }
    }

    public function store(Request $request){

        $request->validate(
            [
            'firstName' => 'required|max:50',
            'lastName' => 'required|max:50',
            'extension' => 'required|max:10',
            'email' => 'required|max:100',
            'ofcode' => 'required|max:10',
            'jobtitle' => 'required| max:50'
            ],
            []
        );

        // to record
        $orderNum = DB::table('employees')
        ->select('employeeNumber')
        ->latest('employeeNumber')
        ->value('employeeNumber');

        $data = array();
        $data["employeeNumber"] = $orderNum+1;
        $data["firstName"] = $request->firstName;
        $data["lastName"]= $request->lastName;
        $data["extension"]= $request->extension;
        $data["email"] = $request->email;
        $data["officeCode"]= $request->ofcode; //
        $data["reportsTo"]= $request->reportsTo;
        $data["jobTitle"] = $request->jobtitle;
        
        DB::table('employees')-> insert($data);


        return redirect()->back()->with('success',"Employee Registered");
        

    }

    public function edit($id){
        //dd($customerNumber);
        $employees = DB::table('employees')
        ->where('employees.employeeNumber',$id)
        ->get();
        return view('editEmployee', compact('employees'));
    } 

    public function update(Request $request, $id){
        DB::table('employees')
                ->where('employeeNumber', $id)
                ->update([
                    'firstName'=> $request->firstName,
                    'lastName'=> $request->lastName,
                    'extension' => $request->extension,
                    'email'=> $request->email,
                    'officeCode'=> $request->ofcode,
                    'reportsTo'=> $request->reportsTo,
                    'jobTitle' => $request->jobtitle
                ]);
                    return redirect()->route('employee')->with('success', 'Employee Updated');
    }

    public function softdelete($id){
        
        $delete = DB::table('employees')
        ->where('employees.employeeNumber',$id)
        ->delete();

        return redirect()->route('employee')->with('deleted', 'Employee Deleted');
    }

