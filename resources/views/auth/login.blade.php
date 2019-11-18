
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://www.madcoderz.com/madol/asset/images/favicon.ico">

    <title>Madol | Login</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="js/vendor/bootstrap/bootstrap.min.css">
    <!--custom style sheet-->
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="wrapper-login">
    <div class="container">
        <div id="app">
            <div class="login-form">
                <div class="card ">
                    <div class="card-body">
                        <div class="main-logo text-center my-3">
                        <img src="{{url('/images/thumbnail_7.png')}}" style="height:auto">
                        </div>
                        <p class="text-center text-muted mb-3">Sign in to your account</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail1" placeholder="E-mail">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="row form-group mt-3">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember Me!</label>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <a href="javascript:void(0)" class="text-forgot"><i class="icon-lock"></i> Forgot password?</a>
                                </div>
                            </div>
                            <div class="form-group my-3 row">
                                <div class="col-12 text-right">
                                    <input type="submit" class="btn btn-custom btn-fullwidth" data-id="dashboard" value="Submit">
                                </div>
                            </div>
                        </form>
                        <div class="form-group mt-5 row">
                            <div class="col-12 text-center socials">
                                <a href="javascript:void(0)" class="m-1" data-toggle="tooltip" data-original-title="Login with Facebook"><i class="fa-round fb-md icon-social-facebook"></i></a>
                                <!--Twitter-->
                                <a href="javascript:void(0)" class="m-1" data-toggle="tooltip" data-original-title="Login with Twitter"><i class="fa-round tw-md icon-social-twitter"></i></a>
                                <!--Google +-->
                                <a href="javascript:void(0)" class="m-1" data-toggle="tooltip" data-original-title="Login with Google+"><i class="fa-round gplus-md icon-social-google"></i></a>
                                <!--Linkedin-->
                                <a href="javascript:void(0)" class="m-1" data-toggle="tooltip" data-original-title="Login with Linkedin"><i class="fa-round li-md icon-social-linkedin"></i></a>
                            </div>
                        </div>  
                    </div>
                </div>
                </div>
        </div>
    </div>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/vendor/jquery/jquery.min.js"></script>
    <script src="js/vendor/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!--Plugin-->
    <script>
        $('[data-toggle="tooltip"]').tooltip();

    </script>

</body>

</html>

















