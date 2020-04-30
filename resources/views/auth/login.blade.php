<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('admin/images/favicon.ico') }}">

    <!-- App css -->
    <link href="{{ url('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ url('admin/css/style.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ url('admin/js/modernizr.min.js') }}"></script>

</head>


<body class="account-pages">

    <!-- Begin page -->
    <div class="accountbg" style="background: url('{{ url('admin/images/bg-1.jpg') }}');background-size: cover;"></div>

    <div class="wrapper-page account-page-full">

        <div class="card">
            <div class="card-block">

                <div class="account-box">

                    <div class="card-box p-5">
                        <h2 class="text-uppercase text-center pb-4">
                            <a href="index.html" class="text-success">
                                <span><img src="{{ url('admin/images/logo.png') }}" alt="" height="26"></span>
                            </a>
                        </h2>

                        <form class="" method="POST" action="{{ route('login') }}">
                            @csrf

                            @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <div class="form-group m-b-20 row">
                                <div class="col-12">
                                    <label for="emailaddress">Email or username</label>
                                    <input class="form-control @error('username') is-invalid @enderror" name="username"
                                        type="username" value="{{ old('username') }}" id="emailaddress" required=""
                                        placeholder="Enter your email or username">
                                </div>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">
                                    <a href="page-recoverpw.html" class="text-muted pull-right"><small>Forgot your
                                            password?</small></a>
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password" required=""
                                        id="password" placeholder="Enter your password">
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group row m-b-20">
                                <div class="col-12">

                                    <div class="checkbox checkbox-custom">
                                        <input id="remember" type="checkbox" checked="">
                                        <label for="remember">
                                            Remember me
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row text-center m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign
                                        In</button>
                                </div>
                            </div>

                        </form>

                        <div class="row m-t-50">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="page-register.html"
                                        class="text-dark m-l-5"><b>Sign Up</b></a></p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center">
            <p class="account-copyright">2018 © Highdmin. - Coderthemes.com </p>
        </div>

    </div>



    <!-- jQuery  -->
    <script src="{{ url('admin/js/jquery.min.js') }}"></script>
    <script src="{{ url('admin/js/popper.min.js') }}"></script>
    <script src="{{ url('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('admin/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('admin/js/waves.js') }}"></script>
    <script src="{{ url('admin/js/jquery.slimscroll.js') }}"></script>

    <!-- App js -->
    <script src="{{ url('admin/js/jquery.core.js') }}"></script>
    <script src="{{ url('admin/js/jquery.app.js') }}"></script>

</body>

</html>
