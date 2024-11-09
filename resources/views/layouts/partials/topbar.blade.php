<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

   <!-- Sidebar Toggle (Topbar) -->
   <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
   </button>

   <ul class="identitas">
      <li class="identitas-item">
         <h6>{{ auth()->user()->name }}</h6>
      </li>
      <li class="identitas-item">
         <h6></h6>
      </li>
      <li class="identitas-item">
         <h6 id="clock"></h6>
      </li>
   </ul>
   <!-- Topbar Navbar -->
   <ul class="navbar-nav ml-auto" style="background-color:rgb(66, 66, 66);">
      <li class="nav-item dropdown no-arrow">
         <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="img-profile rounded-circle"
               src="/img/undraw_profile.svg">
         </a>
         <!-- Dropdown - User Information -->
         <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{ route('profile') }}">
               <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
               Profile
            </a>
            <div class="dropdown-divider"></div>
            <form action="{{ route('logout') }}" method="post">
               @csrf
               <button type="submit" class="dropdown-item"> Logout</button>
            </form>
         </div>
      </li>
   </ul>

</nav>
<!-- End of Topbar -->