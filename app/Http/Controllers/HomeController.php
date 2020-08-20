<?php

namespace App\Http\Controllers;
use App\Department;
use App\Student;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $departments=Department::latest()->paginate(10);
        $students = Student::latest()->paginate(10);
    
        return view('welcome',compact('students','departments'));
    }


    public function departmentWise($id )
    {
       $departments = Department::find($id);
         $students =  Student::latest()->where('department_id', $id)->paginate(8);
        return view('departmentWiseshow',compact('students', 'departments'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $students = Student::where('reg_id','LIKE',"%$query%")->get();
        return view('search',compact('query','students'));
        }


}
