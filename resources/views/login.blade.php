<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Sign In</title>
    <link rel="icon" type="image/x-icon" href="{{asset('/src/assets/img/favicon.ico')}}"/>

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('/src/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('assets/layouts/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/src/assets/css/light/authentication/auth-boxed.css')}}" rel="stylesheet" type="text/css" />
</head>
<body class="form">
<div class="auth-container d-flex">
    <div class="container mx-auto align-self-center">
        <div class="row">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <h2>Sign In</h2>
                                <p>Enter your email and password to login</p>
                            </div>

                            <form class="login-card was-validated" action="{{ route('login.validate') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(Session::get('failed'))
                                    <div class="alert alert-danger" style="margin-top: 10px!important;">
                                        {{ Session::get('failed') }}
                                    </div>
                                @endif

                                {{--<div class="col-md-12">
                                    <?php
                                    if(isset($_POST['try_login'])){
                                        if(empty($userData)) {
                                            echo '<div class="alert alert-danger">
                                                    Sorry Wrong Username or Password !
                                                </div>';
                                        } else {
                                            header("location:dashboard.php");
                                        }
                                    }
                                    ?>

                                </div>--}}
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input name="email" type="email" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <input name="password" type="password" class="form-control" required />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <button type="submit" class="btn btn-secondary w-100">SIGN IN</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('/src/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
</body>
</html>
