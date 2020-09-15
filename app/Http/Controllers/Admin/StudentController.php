<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Department;
use App\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $students = Student::latest()->paginate(10);
        return view('admin.student.index',compact('students'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       $departments = Department::all();
         return view('admin.student.create',compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'batch' => 'required',
            'reg_id' => 'required',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'cgpa'=>'required',
            'department_id' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
  
           ]);
  
     // Get Form Image
          $image = $request->file('image');
          $slug = str_slug($request->name);
          if (isset($image)) {
             
             // Make Unique Name for Image 
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
  
  
          // Check Category Dir is exists
  
              if (!Storage::disk('public')->exists('post')) {
                 Storage::disk('public')->makeDirectory('post');
              }
  
  
              // Resize Image for category and upload
              $postImage = Image::make($image)->resize(1600,1066)->stream();
              Storage::disk('public')->put('post/'.$imageName,$postImage);
  
     }else{
      $imageName = "default.png";
     }
  
    $students = new Student();
    //$students->user_id = Auth::id();
    $students->name = $request->name;
    $students->slug = $slug;
    $students->department_id = $request->department_id;
    $students->image = $imageName;
    $students->batch = $request->batch;
    $students->reg_id = $request->reg_id;
    $students->phone = $request->phone;
    $students->gender = $request->gender;
    $students->cgpa = $request->cgpa;



    $students->save();
    return redirect(route('admin.student.index'))->with('successMsg', 'Student Inserted Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments = Department::all();
        $student = Student::find($id);
        return view('admin.student.edit',compact('departments','student'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'batch' => 'required',
            'reg_id' => 'required',
            'phone' => 'required|numeric',
            'gender' => 'required',
            'cgpa'=>'required',
            'department_id' => 'required',
            
  
           ]);

           $post = Student::find($id);

           // Get Form Image
        $image = $request->file('image');

        $slug = str_slug($request->name);
        if (isset($image)) {
             
        // Make Unique Name for Image 
        $currentDate = Carbon::now()->toDateString();
        $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
  
  
        // Check Category Dir is exists
        if (!Storage::disk('public')->exists('post')) {
            Storage::disk('public')->makeDirectory('post');
        }
  
        // Delete old post image
        if(Storage::disk('public')->exists('post/'.$post->image)){
            Storage::disk('public')->delete('post/'.$post->image);
        }
  
        // Resize Image for category and upload
        $postImage = Image::make($image)->resize(1600,1066)->stream();
        Storage::disk('public')->put('post/'.$imageName,$postImage);
  
     }else{

        $ext = pathinfo(public_path().'post/'.$post->image, PATHINFO_EXTENSION);
        $currentDate = Carbon::now()->toDateString();
        $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$ext;
              
        Storage::disk('public')->rename('post/'.$post->image, 'post/'.$imageName);
        $post->image = $imageName;
     }
  
    

    $post->name = $request->name;
    $post->slug = $slug;
    $post->department_id = $request->department_id;
    $post->image = $imageName;
    $post->batch = $request->batch;
    $post->reg_id = $request->reg_id;
    $post->phone = $request->phone;
    $post->gender = $request->gender;
    $post->cgpa = $request->cgpa;



    $post->save();
   
    return redirect(route('admin.student.index'))->with('successMsg', 'Student Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::find($id)->delete();
        return redirect(route('admin.student.index'))->with('successMsg', 'Successfully Deleted');
    }
}
