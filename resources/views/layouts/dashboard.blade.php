<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="shortcut icon" href="public/assets/img/favicon.ico">
  <title>Evote | UNTAG</title>
  <link rel="icon" type="images/x-icon" href="{{asset('assets/images/evote.png')}}" />

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-social.css') }}">

  <!-- Chocolate Gallery -->
  <link rel="stylesheet" href="{{ asset('assets/css/chocolat.css') }}" type="text/css" media="screen" >

  <!-- CSS Tambahan -->
  @yield('head')
  
</head>

<body class="@if(Auth::user()->role_id == 2) sidebar-mini @endif">

  @if(Auth::user()->status == 1)
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            @if(Auth::user()->role_id == 1)
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            @endif
          </ul>
        </form>

        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }} </div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
              <!-- <a href="#" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a> -->
            </div>
          </li>
        </ul>
      </nav>

      @if(Auth::user()->role_id == 1)
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="/">Evote UNTAG</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="/">UNTAG</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item dropdown">
                <a href="{{ route('admin.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>

              <li class="menu-header">Data</li>
              <li class="nav-item">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>Data</span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('pilihan.index') }}">Data Pilihan</a></li>
                  <li><a href="{{ route('formatur.index') }}">Data Calon</a></li>
                  <li><a href="{{ route('pemilih.index') }}">Data Pemilih</a></li>
                </ul>
              </li>
            </ul>
        </aside>
      </div>
      @endif
      
      <!-- Main Content -->
      <div class="main-content">
        @yield('header')
        @yield('content')
        @yield('footer')
      </div>
    </div>
  </div>
  @else
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>404</h1>
            <div class="page-description">
              Whoopps, your account is'nt active yet. Please activated before you go!
            </div>
          </div>
        </div>
        <div class="row" style="display: flex; justify-content:center; padding-top: 50px;">
          <div class="col-2">
            <a class="dropdown-item has-icon btn-danger" href="{{ route('logout') }}"  style="color:#fff"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
          </div>
        </div>
      </div>
    </section>
  @endif
  
  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js') }}"></script>


  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>
  <!-- <script src="{{ asset('assets/js/custom2.js') }}"></script> -->

  <script type="text/javascript" src="{{ asset('assets/js/chocolat.js') }}"></script>

  <!-- JS Tambahan -->
  @yield('js')
</body>
</html>
