@extends('layouts.backend.app')

@section('title','student_create')

@push('css')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


@endpush

@section('content')
<div class="container">
    @if($errors->any())
    @foreach($errors->all() as $error)

   <div class="alert alert-danger" roles="alert">
     {{ $error }} 

     </div> 

    @endforeach

    @endif

    <form action="{{ route('admin.student.update', $student->id) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Student Name: </label>
          <input type="text" class="form-control" placeholder="Enter department name" id="name" name="name"
           value="{{ $student->name }}">
        </div>
        <div class="form-group">
            <label for="batch">Batch: </label>
            <input type="text" class="form-control" placeholder="Enter department name" id="name" name="batch" 
            value="{{ $student->batch }}">
          </div>

          <div class="form-group">
            <label for="reg_id">Reg No. </label>
            <input type="text" class="form-control" placeholder="Enter department name" id="reg_id" name="reg_id"
             value="{{ $student->reg_id }}">
          </div>

          <div class="form-group">
            <label for="phone">Phone Number: </label>
            <input type="text" class="form-control" placeholder="Enter department name" id="phone"
             name="phone" value="{{ $student->phone }}">
          </div>

           <div class="form-group">
            <label >Gender: </label>
            <div class="form-check">
              <input type="radio" class="form-check-input" {{ ($student->gender=='Male') ? 'checked' : ''  }} 
              name="gender" value="{{ $student->gender }}" >Male <br>
              <input type="radio" class="form-check-input" {{ ($student->gender=='Female') ? 'checked' : ''  }}
               name="gender" value="{{ $student->gender }}">Female <br>
              <input type="radio" class="form-check-input" {{ ($student->gender=='Other') ? 'checked' : ''  }}
               name="gender" value="{{ $student->gender }}">Other <br>
          </div>
          </div> 

          <div class="form-group">
            <label for="cgpa">Cgpa: </label>
            <input type="text" class="form-control" placeholder="Enter cgpa" id="phone"
             name="cgpa" value="{{ $student->cgpa }}">
          </div>

          <div class="form-group">
            <label for="image">Image: </label>
            <input type="file" class="form-control" placeholder="Enter department name" id="image" name="image">
          </div>

        
           <div style="width: 50%" class="form-group">       
            <label class="form-label" for="department_id">Select Departments</label>
            <select name="department_id" id="department_id" class="form-control">
              <option class="text-center">Select Department</option>
                @foreach ($departments as $department)
                    <option   
                        {{ $student->department_id == $department->id ? 'selected' : '' }}
             
                          value="{{ $department->id }}" >{{ $department->name }}</option>
                @endforeach
            </select>
                                        
          </div> 

        <button type="submit" class="btn btn-dark">Submit</button>
      </form>
    




</div>
@endsection
@push('js')

@endpush