 <!-- partial:partials/_sidebar.html -->
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item navbar-brand-mini-wrapper">
        <a class="nav-link navbar-brand brand-logo-mini" href="index.html"><img src="{{asset ('assets/images/logo-mini.svg')}}" alt="logo" /></a>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Dashboard</span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('backend.index')}}">
          <span class="menu-title">Dashboard</span>
          <i class="icon-screen-desktop menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
          <span class="menu-title">Tables</span>
          <i class="icon-grid menu-icon"></i>
        </a>
        <div class="collapse" id="tables">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('backend.user.index')}}">User Table</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('backend.ruang.index')}}">Ruang Table</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('backend.jadwal.index')}}">Jadwal Table</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('backend.booking.index')}}">Booking Table</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>