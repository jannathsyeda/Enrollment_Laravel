@extends('layouts.backend.app')

@section('title','dashboard')

@push('css')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


@endpush

@section('content')
<div class="container">

   <a href="{{ route('admin.departments.index') }}"> <button type="button" class="btn btn-dark" style="margin-top: 50px;">back</button></a>

<hr>
@if($errors->any())
    @foreach($errors->all() as $error)

   <div class="alert alert-danger" roles="alert">
     {{ $error }} 

     </div> 

    @endforeach

    @endif

<form action="{{ route('admin.departments.store') }}" method="POST" >
    @csrf
    <div class="form-group">
      <label for="name">Department Name: </label>
      <input type="text" class="form-control" placeholder="Enter department name" id="name" name="name">
    </div>
    
    
    <button type="submit" class="btn btn-dark">Submit</button>
  </form>


</div>
@endsection
@push('js')

@endpush