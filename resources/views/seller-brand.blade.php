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


    <title>Branding - Seller's Portal | {{config('app.name')}}</title>
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
              
              {{-- <div  id="read">
                  <h4 style="text-align: center;">Read before you proceed</h4>
                  <p>Welcome to Ziksales sellers portal. Sellers portal enables Marchant to upload their products to the site and manage it from their dashboard.</p>

                  <p> For you to make more sales using this platform, you have to provide your products at their Best price knowing fully well that you are not the only person selling the same product here.
                  </p>
                  <p>Once you fill the form, click the submit button, your account will be reviewed and you will receive a message shortly.</p>
                <button class="btn btn-primary btn-block" onclick="closedic()">Close</button>
              </div> --}}
              <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-outline-info" href="{{ route('users.edit') }}">Profile</a>&nbsp;
                <a class="btn btn-outline-info" href="{{ route('orders.index') }}">Order</a>&nbsp;
                <a class="btn btn-outline-info" href="{{ route('wishlist.index') }}">Wishlist</a>&nbsp;
                <a class="btn btn-outline-info" href="{{ route('seller.brand') }}">Branding</a>
              </div> 
              <br><br>
              <div class="tab-content">
                <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                  <div class="card shadow-sm">

                    @if(checkBranding(auth()->user()->id) < 1)
                    <div class="card-body">
                      <form method="POST" action="{{ route('brand.store') }}" aria-label="Brand's Registration">
                          @csrf
                          @captcha
                        <div class="form-row">
                          
                          
                          
                          <div class="form-group col-sm-12">
                          	<p><b>Note: This brand name is unique to you</b></p>
                          </div>
                          <div class="form-group col-sm-12">
                             <input type="text"  class="form-control" placeholder="Brand Name" id="registerphone" name="name" value="{{ old('name') }}" required autofocus>
                          </div>
                         
                          <div class="form-group col-12">
                            <button type="submit" class="btn btn-success btn-block">Submit</button>
                          </div>
                        </div>
                      </form>
                      
                    </div>
                    @else
                    <div class="card-body">
                      <strong>Your link is: 
                        <a href="{{ route('brand.name', getBrandName(auth()->user()->id)->slug) }}">{{ route('brand.name', getBrandName(auth()->user()->id)->slug) }}</a>
                      </strong>
                      <hr>
                      <div class="d-flex align-items-center">
                        <span class="text-muted">Share</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('brand.name', getBrandName(auth()->user()->id)->slug) }}" class="btn btn-light btn-icon rounded-circle border ml-2" data-toggle="tooltip" title="Facebook" target="_blank"><i data-feather="facebook" class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/intent/tweet?text=Check out my products on ziksales, click the link {{ route('brand.name', getBrandName(auth()->user()->id)->slug) }}" class="btn btn-light btn-icon rounded-circle border ml-2" data-toggle="tooltip" title="Twitter"><i data-feather="twitter" class="fa fa-twitter" target="_blank"></i></a>
                        <a href="https://wa.me/?text=Check out my products on ziksales, click the link {{ route('brand.name', getBrandName(auth()->user()->id)->slug) }}" class="btn btn-light btn-icon rounded-circle border ml-2" data-toggle="tooltip" title="Whatsapp" target="_blank"><i data-feather="whatsapp" class="fa fa-whatsapp"></i></a>
                      </div>
                      <hr>
                      <form method="POST" action="{{ route('brand.update') }}" aria-label="Brand's Registration">
                          @csrf
                          @captcha
                        <div class="form-row">
                          
                          
                          
                          <div class="form-group col-sm-12">
                            <p><b>Note: This brand name is unique to you</b></p>
                          </div>
                          <div class="form-group col-sm-12">
                             <input type="text"  class="form-control" placeholder="Brand Name" id="registerphone" name="name"         value="{{getBrandName(auth()->user()->id)->name}}" required autofocus>
                          </div>
                         
                          <div class="form-group col-12">
                            <button type="submit" class="btn btn-success btn-block">Update</button>
                          </div>
                        </div>
                      </form>
                      
                    </div>
                    @endif

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