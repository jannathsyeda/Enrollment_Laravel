<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('mainhome') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="{{ route('login') }}">Log in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         All Departments          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            
            @foreach ($departments as $department)
            <a class="dropdown-item" href="{{ route('departmentwiseShowPage',$department->id) }}">{{ $department->name }}</a>
                    @endforeach

          </div>
        </li>
      </ul>

      <form class="form-inline my-2 my-lg-0" method="GET" action="{{ route('search') }}">
        <input class="form-control mr-sm-2"  name="query" type="text" placeholder="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>

      {{-- <form method="GET" action="{{ route('search') }}">
        <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
        <input class="src-input" name="query" type="text" placeholder="Type of search">
    </form> --}}
    </div>
  </nav>