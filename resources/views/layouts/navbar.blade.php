<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">

    {{-- <div class="logout">
      <a href="#" class="btn btn-danger">Danger</a>

    </div> --}}
    <li class="">
      <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
        <img class="icon" src="{{ asset('template') }}/assets/img/icon-logout.svg" alt="">
        <span>Logout</span>
      </a>
    </li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>


  </ul>
</nav>
