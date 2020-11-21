@extends('layouts.app')
@section('head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. ">
    <meta name="description" content="Your Order Have been received. Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/starability-minified/starability-all.min.css') }}"/>


    <title>Rate your Order | {{config('app.name')}}</title>
  </head>
@endsection  
  
@section('main-content')
        <div class="col" id="main-content">
          @include('inc.messages')
            <h4>We would love your ratings and review for {{getProduct($rating->product_id)->name}}</h4>

          <div class="text-center py-5 my-5">
            <div class="row">
              <div class="col-md-8">
                <form action="{{ route('review.store') }}" method="POST" class="form-group">
                  @csrf
                  @captcha

                  <fieldset class="starability-basic">
                    <legend>Your rating:</legend>
                    <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="0" checked aria-label="No rating." />

                    <input type="radio" id="rate1" name="rating" value="1" />
                    <label for="rate1">1 star.</label>

                    <input type="radio" id="rate2" name="rating" value="2" />
                    <label for="rate2">2 stars.</label>

                    <input type="radio" id="rate3" name="rating" value="3" />
                    <label for="rate3">3 stars.</label>

                    <input type="radio" id="rate4" name="rating" value="4" />
                    <label for="rate4">4 stars.</label>

                    <input type="radio" id="rate5" name="rating" value="5" />
                    <label for="rate5">5 stars.</label>

                    <span class="starability-focus-ring"></span>
                  </fieldset><br>

                  <textarea class="form-control" name="review" placeholder="Review..."></textarea><br>
                  <input type="hidden" name="Thetoken" value="{{$rating->token}}">
                  <button class="btn btn-info" type="submit">Submit</button>

              </form>
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