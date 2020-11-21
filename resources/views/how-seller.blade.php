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
    <link rel='shortcut icon' type='image/ico' href='{{ asset('img/blog/ziksaleslogo.ico') }}' /> 
    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>How to sell on Ziksales | {{config('app.name')}}</title>
    <style >
      @media (max-width: 720px) {
            img {
                width: 70%;
            }
        }
    </style>
  </head>
@endsection  

@section('main-content')

        <div class="col" id="main-content">

          <!-- 404 Content -->
          <div class="text-center">
            <h1>How to sell on Ziksales</h1>
            <hr>           
             <p> The process of becoming a seller in ziksales is easier. You have the opportunity to make tons of sales using our platform free of charge.</p>
              <h5>Step 1 - Register as a user</h5>
              <p>You have to first of all register as a user in the platform. Follow this link to register <a href="{{ route('register') }}">Click Here</a>. <i>Skip if your are already a registered user.</i> </p>
              <h5>Step 2 - Register as a seller</h5>
              <p>After you have registered as a user, now you can register as a seller by filling in the categories of products you sell and the location of those products. Follow this link to register as a seller <a href="{{ route('seller.register') }}">Click Here</a> OR after registering as a user, click the User Icon at the top right corner of the website and select "Seller's portal"</p>
              <img src="{{ asset('img/user-icon2.jpg') }}"><br><br>
              <h5>Step 3 - Upload your products</h5>
              <p>When you are done registering as a seller, you will be taken to a page where you will see  a button "Add Products", click the button and start uploading the products to the website. </p>
              <img src="{{ asset('img/add-product.jpg') }}">
              <p>Get your products out to the market and make tons of sales.</p>


              <a class="btn btn-outline-info" href="javascript:history.back()" role="button"><i class="fa fa-arrow-left"></i> Go Back</a>
              <a class="btn " href="{{ route('landing-page') }}" role="button" style="background-color: #ff751a; color: white;"><i class="fa fa-home"></i> Home</a>
            
            {{-- <p>Think this is an error? Please <a href="{{ route('contact') }}"><u>let us know.</u></a></p> --}}
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
