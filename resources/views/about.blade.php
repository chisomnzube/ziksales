@extends('layouts.app')
@section('head')
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. ">
    <meta name="description" content="About Ziksales. Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>About Us | {{config('app.name')}}</title>
  </head>
@endsection  

@section('main-content')
        <div class="col" id="main-content">

          <!-- About Us -->
          <div class="row">
            <div class="col-md-6 mb-3 mb-md-0">
              <img style="width:100%; height:100%;" src="https://www.ziksales.com//storage/banners/July2019/sP0qqfIHBPoRstQOqUcO.png" alt="About Us" class="w-100">
            </div>
            <div class="col-md-6">
              <h3 class="title">About Us</h3>
              <p>
                  Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.
              </p>
              
            </div>
          </div>

          <div class="my-5"></div>

          <!-- Our Purpose -->
          <div class="row">
            <div class="col-md-6 mb-3 mb-md-0 order-md-2">
              <img src="../img/about-us/our-purpose.jpg" alt="Our Purpose" class="w-100">
            </div>
            <div class="col-md-6 order-md-1">
              <h3 class="title">Our Purpose</h3>
              <p></p>
              <ul>
                <li>To give you a convinient, secure and safe shopping experience</li>
                <li>To help you find the right product</li>
                <li>To increase the sales of other sellers</li>
                <li>To help start-ups grow</li>
              </ul>
            </div>
          </div>

          <div class="my-5"></div>

          <!-- Our Values -->
          <h3 class="title text-center mb-4">Our Values</h3>
          <div class="row">
            <div class="col-md-6 mb-3">
              <div class="media">
                <img class="rounded-circle mr-3" src="../img/about-us/serve.jpg" width="64" height="64" alt="We Serve">
                <div class="media-body">
                  <h5>We Serve</h5>
                  Our customers are the sole arbiter of the value of our products and services. We strive to meet unmet needs and serve the underserved.
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="media">
                <img class="rounded-circle mr-3" src="../img/about-us/run.jpg" width="64" height="64" alt="We Run">
                <div class="media-body">
                  <h5>We Run</h5>
                  We are in a constant race to success while grappling with rapidly shifting forces. We move faster, better and with more urgency every day.
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="media">
                <img class="rounded-circle mr-3" src="../img/about-us/adapt.jpg" width="64" height="64" alt="We Adapt">
                <div class="media-body">
                  <h5>We Adapt</h5>
                  Rapid change is the only constant in the digital age of ours. We embrace change, celebrate it and always strive to be a thought leader that influences it.
                </div>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <div class="media">
                <img class="rounded-circle mr-3" src="../img/about-us/commit.jpg" width="64" height="64" alt="We Commit">
                <div class="media-body">
                  <h5>We Commit</h5>
                  Our work is our commitment. We commit to our values, institution, customers and partners. We commit to each other. Above all, we commit to doing the best we can and being the best we are.
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