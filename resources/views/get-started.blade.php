<?php
namespace App\Http\Controllers;

use App\Category;
use App\CategorySub;
$categories = Category::all();
$allSubCategories = CategorySub::all();
?>
@extends('layouts.app')
@section('head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. ">
    <meta name="description" content="This is 404 Page. Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us. ">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>Agent - Get Started | {{config('app.name')}}</title>
  </head>
@endsection  

@section('main-content')

        <div class="col" id="main-content">
          @include('inc.messages')

          <!-- 404 Content -->
          <div class="text-center">
            <div class="display-2"><i class="fa fa-shopping-cart"></i></div>
            <h1>Ziksales Agent - Get Started</h1>
            <h2>How does it work?</h2>
            <p>To become Ziksales Agent, just click the button "Get Started", you will be registered as an agent. <br>
              Pick products from the website and market to your friends on social media and other platforms.<br>Place the order for your friends using your account and get your commission. <br>
            That's Easy</p>
            <h4 style="text-decoration: underline;">Benefits of being ziksales Agent</h4>
            <ul class="list-group">
              <li class="list-group-item"><i class="fa fa-tint fa-lg fa-fw"></i> No registeration fee.</li>
              <li class="list-group-item"><i class="fa fa-tint fa-lg fa-fw"></i> You work from anywhere.</li>
              <li class="list-group-item"><i class="fa fa-tint fa-lg fa-fw"></i> There is no limit to how much you can earn.</li>
              <li class="list-group-item"><i class="fa fa-tint fa-lg fa-fw"></i> You have &#8358;500 in your wallet as a new agent.</li>
              <li class="list-group-item"><i class="fa fa-tint fa-lg fa-fw"></i> Quick payout when you reach a treshhold of &#8358;1,000</li>
              <li class="list-group-item"><i class="fa fa-tint fa-lg fa-fw"></i> You stand a chance for monthly reward for hardwork.</li>
            </ul>
            <div class="btn-group btn-group-sm mt-3 mb-5" role="group">              
              <a class="btn btn-info" href="{{ route('agent.store') }}" role="button"><i class="fa fa-home"></i> Get Started</a>
            </div>
          </div>
          <!-- /404 Content -->

@endsection        
      </div>
    </div>

@section('required-js')
    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>
@endsection
  </body>
</html>
