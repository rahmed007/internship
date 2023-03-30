
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
    <a class="navbar-brand" href="#"><img src="{{asset('images/blogo.png')}}" alt="" width="80px"><span class="logo-text">Business Data</span> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto nav-menu-custom">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('home')}}">Home </a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link" href="{{route('companies.index')}}">Companies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('employees.index')}}">Employees</a>
          </li>
         
        <li class="nav-item">
          <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        
      </ul>
    </div>
</div>
  </nav>