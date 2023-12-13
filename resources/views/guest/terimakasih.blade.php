<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link rel="shortcut icon" href="public/assets/img/favicon.ico">
  <title>Evote | UNTAG</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-social.css') }}">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/4566ed067d.js" crossorigin="anonymous"></script>

  <!-- CSS Tambahan -->
  @yield('head')
</head>

<body class="sidebar-mini">
  <div id="app">
    <div class="main-wrapper">
      <!-- Main Content -->
      <div class="main-content">
            <div class="row" style="display: flex;-ms-flex-wrap: wrap;flex-wrap: nowrap;margin-right: -15px;margin-left: -15px;justify-content: center;">
                <div class="col-12 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="empty-state" data-height="400">
                            <div class="empty-state-icon bg-success">
                                <i class="fas fa-check"></i>
                            </div>
                            <h2>Terima kasih!</h2>
                            <p class="lead">
                                Semoga IPM UNTAG dapat melanjutkan tongkat estafet perjuangan yang lebih baik lagi!
                            </p>
                              <div>
                                <a class="dropdown-item has-icon btn-danger" href="{{ route('logout') }}"  style="color:#fff"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                  <i class="fas fa-sign-out-alt"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                                    @csrf
                                    <!-- <button class="btn btn-danger"><i class="fas fa-sign-out-alt"></i>Logout</button> -->
                                </form>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </div>
  </div>
  
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

  <!-- JS Tambahan -->
  @yield('js')
</body>
</html>
