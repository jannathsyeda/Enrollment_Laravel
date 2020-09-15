@extends('layouts.backend.app')

@section('title','dashboard')

@push('css')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


@endpush

@section('content')
<div class="container">

 <a href="{{ route('admin.departments.create') }}">
  <button type="button" class="btn btn-dark" style="margin-top: 50px;">Add Departments</button>
 </a>

  <hr>
   
  @if(session('successMsg'))

  <div class="alert alert-success" roles="alert">
  {{ session('successMsg') }} 

  </div> 
  @endif   
  
    <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th> </th>
            <th>Department Name</th>
            <th>Create Date</th>
            <th>Action</th>

           
          </tr>
        </thead>
        <tbody>
          @foreach($departments as $key=>$department)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $department->name  }}</td>
            <td>{{ $department->created_at  }}</td>
           <td>
         
            <form method="POST" id="delete-form-{{ $department->id }}" action="{{ route('admin.departments.destroy', $department->id) }}" style="display: none;">
              {{ csrf_field() }}
              {{ method_field('delete') }} 
            </form>   
           
             <button onclick="if (confirm('Are you sure to delete this data?')) {
             event.preventDefault();
             document.getElementById('delete-form-{{ $department->id }}').submit();
          
             }else{
              event.preventDefault();
             }
          
             " class="btn btn-raised btn-danger btn-sm" href=" "><i class="fa fa-trash fa-2x" aria-hidden="true"></i>  
          
            </button>
            </td>
          

          </tr>
          
        </tbody>
        @endforeach
      </table>
</div>
@endsection
@push('js')

@endpush