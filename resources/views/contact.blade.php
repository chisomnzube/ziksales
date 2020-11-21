@extends('layouts.app')
@section('head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. ">
    <meta name="description" content="Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>Contact Us | {{config('app.name')}}</title>
  </head>
@endsection  

@section('main-content')
        <div class="col" id="main-content">
          @include('inc.messages')

          <div class="row">
            <div class="col-sm-6 mb-3 mb-sm-0">
              <div class="img-thumbnail">
                <div class="embed-responsive embed-map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.9264094650316!2d-73.97488578459351!3d40.763643279326224!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c258f00eb25f59%3A0x75ddbee78904e799!2s767+5th+Ave%2C+New+York%2C+NY+10153%2C+USA!5e0!3m2!1sen!2sid!4v1532319134271" width="600" height="450" style="border:0" allowfullscreen></iframe>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <h3>CONTACT US</h3>
              <form class="mt-3" action="{{ route('contact.store') }}" method="POST">
                {{ csrf_field() }}
                @captcha
	            @if(count($errors) > 0)
	                @foreach($errors->all() as $error)
	                    {{ $error }}
	                @endforeach
	            @endif
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <div class="media">
                      <span><i class="fa fa-map-marker fa-fw text-info"></i></span>
                      <div class="media-body ml-1">
                        <div>Nnamdi Azikiwe University Awka</div>
                        {{--<div>New York</div>
                        <div>NY 10153</div>--}}
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-6">
                    <div class="media mb-3 mb-md-0">
                      <span><i class="fa fa-phone fa-fw text-info"></i></span>
                      <div class="media-body ml-1">07031382795</div>
                    </div>
                    <div class="media">
                      <span><i class="fa fa-envelope fa-fw text-info"></i></span>
                      <div class="media-body ml-1">contact@ziksales.com</div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input name="name" type="text" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                  <input name="phone" type="text" class="form-control" placeholder="Phone Number">
                </div>
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                  <textarea name="body" class="form-control" rows="3" placeholder="Message"></textarea>
                </div>
                <button type="submit" class="btn btn-info">SEND</button>
              </form>
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