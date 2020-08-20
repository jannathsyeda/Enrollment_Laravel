@extends('layouts.frontend.app')

@section('title', 'Main')

@section('content')
<div class="container-fluid" style="margin-left:120;width:78%;margin-top:100px;">

<table class="table table-dark">
    <thead>
      <tr>
        <th> </th>
        <th >Name</th>
        <th>Batch</th>
        <th>Reg_id</th>
        <th>Phone</th>
        <th>Gender</th>
        <th>Department</th>
        <th>Image</th>
       




      </tr>
    </thead>
    <tbody>
      @foreach($students as $key=>$student)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $student->name }}</td>
        <td>{{ $student->batch }}</td>
        <td>{{ $student->reg_id }}</td>
        <td>{{ $student->Phone }}</td>
        <td>{{ $student->gender }}</td>
        <td>{{ $student->department->name }}</td>
        <td><img class="img-fluid" width="100px;" src="{{ asset('storage/post/'.$student->image) }}" alt=""></td>
        {{-- <td style="width:200px; text-align:center; ">
          <button  class="btn btn-raised btn-danger btn-sm" href=" "> 
            <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
          </button>
         
          ||
         <a href="{{ route('admin.student.edit',$student->id) }} "> <button  class="btn btn-raised btn-success btn-sm"> 
            <i class="fa fa-edit fa-2x" aria-hidden="true"></i>
          </button></a>
          
        </td> --}}


      </tr>
    @endforeach
   
    </tbody>
  </table>

  {{ $students->links() }}
  <div class="container-fluid" style="margin-left:250px;width:78%;">

@endsection
