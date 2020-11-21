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


    <title>Ziksales - Register</title>
  </head>
@endsection  
  
@section('main-content')

        <div class="col" id="main-content">
          @include('inc.messages')

          <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8 col-12">
              <nav class="d-flex justify-content-center mb-4">
                <div class="btn-group nav" role="tablist">
                  
                  <a class="btn btn-outline-info" data-toggle="tab"  id="register-tab" role="tab" aria-controls="register" aria-selected="false">Register</a>
                </div>
              </nav>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                  <div class="card shadow-sm">
                    <div class="card-body">
                      <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                          @csrf
                          @captcha
    			            @if(count($errors) > 0)
    			                @foreach($errors->all() as $error)
    			                    {{ $error }}
    			                @endforeach
    			            @endif
                        <div class="form-row">
                          <div class="form-group col-sm-6">
                            <label for="registerFirstName">First Name</label>
                            <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="registerFirstName" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="registerFirstName">Last Name</label>
                            <input type="text"  class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" id="registerFirstName" name="lname" value="{{ old('lname') }}" required autofocus>
                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                          </div>
                          
                          <div class="form-group col-sm-6">
                            <label for="registerEmail">Email address</label>
                            <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="registerEmail" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="registerPhone">Phone Number</label>
                             <input type="text"  class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" id="registerphone" name="phone" value="{{ old('phone') }}" required autofocus>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="registerPassword">Password</label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="registerPassword" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group col-sm-6">
                            <label for="registerConfirmPassword">Confirm Password</label>
                            <input type="password" class="form-control" id="registerConfirmPassword" name="password_confirmation" required>
                          </div>
                          <div class="form-group col-sm-12">
                            <label for="registerLastName">Address</label>
                             <input type="text"  class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" id="registeraddress" name="address" value="{{ old('address') }}" required autofocus>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <input type="hidden" name="referrer" value="{{session()->get('refId') ? session()->get('refId') : 'NoRef' }}">
                          <div class="form-group col-12">
                            <button type="submit" class="btn btn-success btn-block">REGISTER</button>
                          </div>
                        </div>
                      </form>
                      <p>Already registered? click <a href="/login">Here</a> to Login</p>
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