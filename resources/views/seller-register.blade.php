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


    <title>Seller's Portal | {{config('app.name')}}</title>
    <script type="text/javascript">
      function closedic()
        {
          document.getElementById('read').style.display = "none";
        }
    </script>
    <style type="text/css">
      #read{
        background-color: lightblue;
        border-radius: 4px;
      }
    </style>
  </head>
@endsection  
  
@section('main-content')

        <div class="col" id="main-content">
          @include('inc.messages')

          <div class="row justify-content-center">
            <div class="col-xl-6 col-md-8 col-12">
              <nav class="d-flex justify-content-center mb-4">
                <div class="btn-group nav" role="tablist">
                  
                  <a class="btn btn-outline-info" data-toggle="tab"  id="register-tab" role="tab" aria-controls="register" aria-selected="false">Seller's Registration portal</a>
                </div>
              </nav>
              <div  id="read">
                  <h4 style="text-align: center;">Read before you proceed</h4>
                  <p>Welcome to Ziksales sellers portal. Sellers portal enables Marchant to upload their products to the site and manage it from their dashboard.</p>

                  <p> For you to make more sales using this platform, you have to provide your products at their Best price knowing fully well that you are not the only person selling the same product here.
                  </p>
                  <p>Once you fill the form, click the submit button, your account will be reviewed and you will receive a message shortly.</p>
                <button class="btn btn-primary btn-block" onclick="closedic()">Close</button>
              </div>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                  <div class="card shadow-sm">
                    <div class="card-body">
                      <form method="POST" action="{{ route('seller.registered') }}" aria-label="Seller's Registration">
                          @csrf
                        <div class="form-row">
                          
                          
                          
                          <div class="form-group col-sm-12">
                          	<p><b>Note: Your products must be New</b></p>
                          </div>
                          <div class="form-group col-sm-12">
                            <label for="registerPhone">* Product Description (<small>What type of product(s) do you sell</small>)</label>
                             <input type="text"  class="form-control{{ $errors->has('specialize') ? ' is-invalid' : '' }}" id="registerphone" name="specialize" value="{{ old('specialize') }}" required autofocus>
                                @if ($errors->has('specialize'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('specialize') }}</strong>
                                    </span>
                                @endif
                          </div>
                         
                          
                          <div class="form-group col-sm-12">
                            <label for="registerLastName">* Product Address (<small>This is the current location of your product(s)</small>)</label>
                             <input type="text"  class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" id="registeraddress" name="address" value="{{ old('address') }}" required autofocus>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group col-12">
                            <button style="background-color: #ff751a; color: white;" type="submit" class="btn btn-block">Submit</button>
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

        @endsection
      
@section('required-js')

    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>

@endsection