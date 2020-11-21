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


    <title>Thank You | {{config('app.name')}}</title>
  </head>
@endsection  
  
@section('main-content')
        <div class="col" id="main-content">
          @include('inc.messages')

          <div class="text-center py-5 my-5">
            <div class="text-success">
              <span class="fa-stack fa-2x">
                <i class="fa fa-check fa-stack-1x"></i>
                <i class="fa fa-circle-o fa-stack-2x"></i>
              </span>
            </div>
            <h1>Thank you.</h1>
            <p>Your order has been placed and will be processed as soon as possible.</p>
            <p class="mb-0">
              <span class="text-muted">Order ID: </span>
              <span class="text-pink">#zs{{$order_id}}</span>
            </p>
            <p>
              <span class="text-muted">Amount: </span>
              <span class="text-pink">&#8358;{{ number_format($received_amount/100) }}</span>
            </p>
            <p>A confirmation email has been sent to <u>{{$received_email}}</u></p>
            <a href="{{ route('shop.index') }}" class="btn btn-secondary mb-5">CONTINUE SHOPPING</a>
            <a href="{{ route('orders.index') }}" class="btn btn-success mb-5">VIEW ORDER</a>
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