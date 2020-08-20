@extends('layouts.backend.app')

@section('title','student_index')

@push('css')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endpush

@section('content')
<div class="container">

 <a href="{{ route('admin.student.create') }}">
  <button type="button" class="btn btn-dark" style="margin-top: 50px;">Add Students</button>
 </a>

  <hr>
   
  @if(session('successMsg'))

  <div class="alert alert-success" roles="alert">
  {{ session('successMsg') }} 

  </div> 
  @endif  
  <div class="table-responsive">
  <table class="table table-dark">
    <thead>
      <tr>
        <th> </th>
        <th >Name</th>
        <th>Batch</th>
        <th>Reg_id</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Cgpa</th>
        <th>Department</th>
        <th>Image</th>
        <th style="width:200px; text-align:center; ">Action</th>




      </tr>
    </thead>
    <tbody>
      @foreach($students as $key=>$student)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->batch }}</td>
        <td>{{ $student->reg_id }}</td>
        <td>{{ $student->phone }}</td>
        <td>{{ $student->gender }}</td>
        <td>{{ $student->cgpa }}</td>

        <td>{{ $student->department->name }}</td>
        <td><img class="img-fluid" width="100px;" src="{{ asset('storage/post/'.$student->image) }}" alt=""></td>
        <td style="width:200px; text-align:center; ">
          <button  class="btn btn-raised btn-danger btn-sm" href=" "> 
            <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
          </button>
         
          ||
         <a href="{{ route('admin.student.edit',$student->id) }} "> <button  class="btn btn-raised btn-success btn-sm"> 
            <i class="fa fa-edit fa-2x" aria-hidden="true"></i>
          </button></a>
          
        </td>


      </tr>
    @endforeach
   
    </tbody>
  </table>
  </div>
  {{ $students->links() }}




 
</div>
@endsection
@push('js')

@endpush