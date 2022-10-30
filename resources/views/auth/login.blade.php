<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login | Jawara Daging</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('template') }}/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('template') }}/node_modules/@fortawesome/fontawesome-free/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('template') }}/node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="{{ asset('template') }}/node_modules/izitoast/dist/css/iziToast.min.css">


  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('template') }}/assets/css/style.css">
  <link rel="stylesheet" href="{{ asset('template') }}/assets/css/components.css">
  <link rel="stylesheet" href="{{ asset('template') }}/assets/css/jawara-daging.css">

</head>

<body class="login">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset('template') }}/assets/img/logo.svg" alt="logo" class="shadow-dark rounded-circle-login">
            </div>
            <form action="{{ route('post.login') }}" method="POST" id="login">
              @csrf
              <div class="form-group">
                <div class="input-group">
                  <input id="username" type="text" class="form-control" name="username" tabindex="1" autocomplete="username" required autofocus placeholder="Username or Email">
                    <div class="input-group-append">
                        <a><i class="fas fa-user-alt"></i></a>
                    </div>
                </div>
              </div>


              <div class="form-group">
                <div class="input-group" id="show_hide_password">
                    <input type="password" name='password' class="form-control" tabindex="2" name="password" placeholder="Password" required autocomplete="current-password">
                    <div class="input-group-append">
                        <a href="#"><i class="fas fa-eye-slash"></i></a>
                    </div>
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-red btn-lg btn-block" tabindex="3">
                  Masuk
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('template') }}/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="{{ asset('template') }}/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="{{ asset('template') }}/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="{{ asset('template') }}/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
  <script src="{{ asset('template') }}/node_modules/moment/min/moment.min.js"></script>
  <script src="{{ asset('template') }}/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('template') }}/node_modules/izitoast/dist/js/iziToast.min.js"></script>


  <!-- Template JS File -->
  <script src="{{ asset('template') }}/assets/js/scripts.js"></script>
  <script src="{{ asset('template') }}/assets/js/custom.js"></script>
  <script src="{{ asset('template') }}/assets/js/page/modules-toastr.js"></script>


  <!-- Page Specific JS File -->

{{-- Js show hidden password --}}

<script>
    $(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fas fa-eye-slash" );
            $('#show_hide_password i').removeClass( "far fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fas fa-eye-slash" );
            $('#show_hide_password i').addClass( "far fa-eye" );
        }
    });
    });
</script>

{{-- Js error email toaster  --}}


@if (Session::has('error'))
    <script>
        iziToast.error({
            title: 'Error',
            message: '{{ Session::get('error') }}',
            position: 'topRight',
        });
    </script>
@endif


@if (Session::has('success'))
    <script>
        iziToast.success({
            title: 'Success',
            message: '{{ Session::get('success') }}',
            position: 'topRight',
        });
    </script>
@endif


</body>
</html>
