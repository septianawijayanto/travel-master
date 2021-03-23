<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login | Kerinci Mulya Travel </title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('admin/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('admin/css/elegant-icons-style.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
        Theme Name: NiceAdmin
        Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        Author: BootstrapMade
        Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

    <div class="container">
        <form class="login-form" action="{{url('/postlogin')}}" method="POST">
            {{csrf_field()}}
            <div class="login-wrap">
                <h1 class="text-center"><i>Login</i></h1>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_mail"></i></span>
                    <input name="email" type="text" class="form-control" placeholder="Email" autofocus>
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="input-group">
                    <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me"> Remember me
                    <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
                </label>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                <a href="{{url('/registrasi')}}" class="btn btn-danger btn-lg btn-block" type="submit"><font  color='white'> Registrasi</font></a>
            </div>
        </form>

        <div class="text-right">
            <div class="credits">
                <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
            -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </div>


</body>

</html>