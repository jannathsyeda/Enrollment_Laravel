{{-- <div class="w3-sidebar w3-bar-block w3-black w3-xlarge" style="width:230px">
    
    @if(Request::is('admin*'))

  <span  class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a> 
  </span>

  <span class="{{ Request::is('admin/departments*') ? 'active' : '' }}">
  <a href="{{ route('admin.departments.index') }}" class="w3-bar-item w3-button"><i class="fa fa-book"></i> Departments</a>
 </span>

 <span class="{{ Request::is('admin/student*') ? 'active' : '' }}">
    <a href="{{ route('admin.student.index') }}" class="w3-bar-item w3-button"><i class="fa fa-graduation-cap"></i> All Students</a> 
 </span>

 <span class="{{ Request::is('admin/faculties*') ? 'active' : '' }}">
    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-laptop"></i> All faculties</a> 
 </span>


    <a  href="{{ route('logout') }}"onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"class="w3-bar-item w3-button"><i class="fa fa-sign-out"></i> Sign Out</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
     @csrf
    </form> 
    @endif
</div>
  
  <div style="margin-left:230px">
  
  <div class="w3-container">
 <h1> <strong>Admin Dashboard</strong></h1>
  
  </div>
  
  </div> --}}

<!-------------------------------------------------------------------->
<!-------------------------------------------------------------------->
<!-------------------------------------------------------------------->
<!-------------------------------------------------------------------->

  <style>
  
   a{
       font-weight: 700;
       border-bottom: 1px solid grey;
   }
</style>
<div class="sidebar">
   @if (Request::is('admin*'))
       <a class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"
       href="{{ route('admin.dashboard') }}">
       Dashboard
       </a>


       <a class="{{ Request::is('admin/departments*') ? 'active' : '' }}"
               href="{{ route('admin.departments.index') }}">
               Departments
       </a>

       <a class="{{ Request::is('admin/student*') ? 'active' : '' }}"
               href="{{ route('admin.student.index') }}">
       All Student
       </a>


       <a onclick="logout()"  style="color:white;">
       Sign Out
       </a>

       <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
       @csrf
       </form>        
   @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
      <script type="text/javascript">
      function logout(){
          const swalWithBootstrapButtons = Swal.mixin({
               customClass: {
               confirmButton: 'btn btn-success',
               cancelButton: 'btn btn-danger'
               },
               buttonsStyling: false
           })
           swalWithBootstrapButtons.fire({
               title: 'Are you sure to logout?',
               type: 'warning',
               showCancelButton: true,
               confirmButtonText: 'Yes',
               cancelButtonText: 'No',
               reverseButtons: true
           }).then((result) => {
               if (result.value) {
                   event.preventDefault();
                   document.getElementById('logout').submit();
               } else if (
               /* Read more about handling dismissals below */
               result.dismiss === Swal.DismissReason.cancel
               ) {
               swalWithBootstrapButtons.fire(
                   'Cancelled',
               )
              }
           })
      } 
      </script>