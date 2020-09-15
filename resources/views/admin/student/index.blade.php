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
          <!-- <button  class="btn btn-raised btn-danger btn-sm" href=" "> 
            <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
          </button> -->
         
          
         <a href="{{ route('admin.student.edit',$student->id) }} "> <button  class="btn btn-raised btn-success btn-sm"> 
            <i class="fa fa-edit fa-2x" aria-hidden="true"></i>
          </button></a>
||
          <button class="btn btn-danger waves-effect" type="button" onclick="deletePost({{ $student->id }})">
             <i class="fa fa-trash fa-2x" aria-hidden="true"></i>
          </button>

          <form id="delete-form-{{ $student->id }}" action="{{ route('admin.student.destroy',$student->id) }}" method="POST" style="display: none;">
              @csrf
              @method('DELETE')
           </form>
          
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
function deletePost(id){
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!',
    reverseButtons: true
    }).then((result) => {
    if (result.value) {

    event.preventDefault();
    document.getElementById('delete-form-'+id).submit();

    } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
    ) {
    swalWithBootstrapButtons.fire(
    'Cancelled',
    'Your imaginary file is safe :)',
    'error'
    )
    }
    })
} 

</script>



