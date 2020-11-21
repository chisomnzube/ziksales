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


    <title>404 Page not Found - Ziksales</title>
  </head>
@endsection  

@section('main-content')

        <div class="col" id="main-content">

          <!-- 404 Content -->
          <div class="text-center">
            <div class="display-2"><i class="fa fa-compass"></i></div>
            <h1>OOPS! ERROR 404 PAGE NOT FOUND</h1>
            <h4>The page you were looking for doesn't exist.</h4>
            <div class="btn-group btn-group-sm mt-3 mb-5" role="group">
              <a class="btn btn-outline-info" href="javascript:history.back()" role="button"><i class="fa fa-arrow-left"></i> Go Back</a>
              <a class="btn btn-info" href="{{ route('landing-page') }}" role="button"><i class="fa fa-home"></i> Home</a>
            </div>
            <p>Think this is an error? Please <a href="{{ route('contact') }}"><u>let us know.</u></a></p>
          </div>
          <!-- /404 Content -->
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

