<?php
  use App\Category;
  $categories = Category::all();
?>
@extends('layouts.app')
@section('head')
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>Login - Ziksales</title>
  </head>
@endsection  
  
@section('main-content')

        <div class="col" id="main-content">

          <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8 col-12">
              <nav class="d-flex justify-content-center mb-4">
                <div class="btn-group nav" role="tablist">
                  <a class="btn btn-outline-info active" data-toggle="tab" id="login-tab" role="tab" aria-controls="login" aria-selected="true">Login</a>
                </div>
              </nav>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                  <div class="card shadow-sm card-login-form">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-6">

                          <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                             @csrf
                            <div class="form-group text-center">Login to your account</div>
                            <div class="form-group">
                              <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="loginUsername" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                               @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                              <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="loginPassword" placeholder="Password" name="password" required>
                              @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">Remember me</label>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">LOGIN</button>
                          </form>
                          <p>Not Registered? click <a href="/register">Here</a> to register</p>
                          <p>Forget Password? <a href="/password/reset">Click Here</a></p>

                        </div>
                        <div class="col-sm-6 mt-2 mt-sm-0">
                          <div class="form-group text-center">OR</div>
                          <div class="btn-group w-100 mb-1">
                            <button class="btn btn-primary active"><i class="fa fa-facebook fa-fw"></i></button>
                            <a class="btn btn-primary btn-block" href="/login/facebook">Login with Facebook</a>
                          </div>
                          <div class="btn-group w-100 mb-1">
                            <button class="btn btn-danger active"><i class="fa fa-google-plus fa-fw"></i></button>
                            <a class="btn btn-danger btn-block" href="/login/google">Login with Google+</a>
                          </div>
                          <div class="btn-group w-100">
                            <button class="btn btn-info active"><i class="fa fa-twitter fa-fw"></i></button>
                            <a class="btn btn-info btn-block" href="/login/twitter">Login with Twitter</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>

        </div>

        @endsection
      
@section('required-js')

    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>

@endsection