@extends('layouts.backend.app')

@section('title','student_create')

@push('css')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


@endpush

@section('content')
<div class="container">

 <a href="{{ route('admin.student.index') }}">
  <button type="button" class="btn btn-dark" style="margin-top: 50px;">back</button>
 </a>

  <hr>
   
  
@if($errors->any())
    @foreach($errors->all() as $error)

   <div class="alert alert-danger" roles="alert">
     {{ $error }} 

     </div> 

    @endforeach

    @endif


    <form action="{{ route('admin.student.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
          <label for="name">Student Name: </label>
          <input type="text" class="form-control" placeholder="Enter department name" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="batch">Batch: </label>
            <input type="text" class="form-control" placeholder="Enter department name" id="name" name="batch">
          </div>

          <div class="form-group">
            <label for="reg_id">Reg No. </label>
            <input type="text" class="form-control" placeholder="Enter department name" id="reg_id" name="reg_id">
          </div>

          <div class="form-group">
            <label for="phone">Phone Number: </label>
            <input type="text" class="form-control" placeholder="Enter department name" id="phone"
             name="phone">
          </div>

          <div class="form-group">
            <label >Gender: </label>
            <div class="form-check">
              <input type="radio" class="form-check-input" name="gender" value="Male">Male <br>
              <input type="radio" class="form-check-input" name="gender" value="Female">Female <br>
              <input type="radio" class="form-check-input" name="gender" value="Other">Other <br>

          </div>
          
          </div>

          <div class="form-group">
            <label for="phone">Cgpa: </label>
            <input type="number" class="form-control" placeholder="Enter department name" id="phone"
             name="cgpa">
          </div>

            <div class="form-group">
             <label for="image"> Image: </label>
            
             <input type="file" id="file" class="form-control" onchange="readURL(this);" required="" name="image">           
       
                 <img  id="one">
            </div>









        
          <div style="width: 50%" class="form-group">
                                
                          
            <label class="form-label" for="department_id">Select Departments</label>
            <select name="department_id" id="department_id" class="form-control">
              <option class="text-center">Select Department</option>
                @foreach ($departments as $department)
                    <option class="text-center" value="{{ $department->id }}" >{{ $department->name }}</option>
                @endforeach
            </select>
                                        
          </div>

        <button type="submit" class="btn btn-dark">Submit</button>
      </form>


  
 
</div>
@endsection
@push('js')

<!--  <script>
    function loadPreview(input, id) {
      id = id || '#preview_img';
      if (input.files && input.files[0]) {
          var reader = new FileReader();
   
          reader.onload = function (e) {
              $(id)
                      .attr('src', e.target.result)
                      .width(200)
                      .height(150);
          };

          reader.readAsDataURL(input.files[0]);
      }
   }
  </script> -->



  <script type="text/javascript">
  function readURL(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#one')
        .attr('src', e.target.result)
        .width(80)
        .height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

@endpush