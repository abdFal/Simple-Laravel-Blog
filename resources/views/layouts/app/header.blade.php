<header class="d-flex px-4 flex-wrap align-items-center justify-content-center justify-content-md-between mb-4 border-bottom">
  <a href="/" class="d-flex fs-1 align-items-center col-md-3 mb-4 mb-md-0 text-dark text-decoration-none">
    <i class="fa-solid fa-blog"></i>
  </a>
  <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
    <li>
      <a href="{{ url('posts') }}" class="nav-link px-2 mb-2 link-secondary">Home</a>
    </li>
  </ul>
  <div class="col-md-3 text-end">
    @if (Auth::check())
    <div class="nama fs-5 fw-bold d-flex align-items-center">
      <span> Hai, {{ Auth::user()->name }}</span>
      <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle ms-3" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f4/User_Avatar_2.png" alt="mdo" width="32" height="32" class="rounded-circle">
      </a>
      <ul class="dropdown-menu text-small">
        <li><a class="dropdown-item text-muted">Account</a></li>
        <li><a class="dropdown-item" href="{{ url('logout') }}" class="btn btn-outline-danger ms-2 mb-2">Sign out</a></li>
      </ul>
    </div>
    @else
    <a href="{{ url('register') }}" class="btn btn-primary me-2 mb-2">Register</a>
    <a href="{{ url('login') }}" class="btn btn-outline-primary me-2 mb-2">Login</a>
    @endif
  </div>
</header>