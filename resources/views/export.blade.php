<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Evote | Pemira Ortom Spemduta</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-social.css') }}">

</head>

<body class="sidebar-gone">
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <!-- Main Content -->
      <div class="main-content" style="padding: 80px 30px 0px 80px;">
      <section class="section">
          <div class="row">
            @foreach($datas as $data)
            <div class="col-lg-4 col-md-4 col-sm-12">
                <div class="card">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-header">
                                <h4 style="color:#262626">Detail Calon</h4>
                            </div>
                        </div>
                        <div class="col-5 text-center gallery" style="align-items: flex-start!important;">
                            <div class="gallery-md" style="align-items: flex-start!important; padding-top:50px;">
                                <a class="gallery-item" href="{{ asset('image/avatar-4.png') }}">
                                    <img width="200" src="{{ asset('image/avatar-4.png') }}" />
                                </a>
                            </div>
                        </div>
                        <div class="col-7">
                            <form action="#" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input name="nama" type="text" class="form-control" required value="{{ $data->nama }}">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Visi</label>
                                        <textarea name="visi" class="form-control" required>{{ $data->visi }}</textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Misi</label>
                                        <textarea name="misi" class="form-control" required>{{ $data->misi }}</textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
          </div>
        </section>
      </div>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->


  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->

</body>
</html>
