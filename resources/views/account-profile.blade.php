@extends('layouts.app')
@section('head')
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales profile, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. ">
    <meta name="description" content="My Profile. Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>My Profile | {{config('app.name')}}</title>
  </head>
@endsection  

@section('main-content')

        <div class="col" id="main-content">
            @include('inc.messages')

          <div class="card user-card">
            <div class="card-body">
              <div class="media">
               @include('inc.account')
              <hr>
              <form action="{{ route('users.update') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <div class="form-row">
                  <div class="form-group col-sm-6">
                    <label for="profileFirstName">First Name</label>
                    <input name="name" type="text" class="form-control" id="profileFirstName" value="{{ old('name', $user->name) }}">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="profileLastName">Last Name</label>
                    <input name="lname" type="text" class="form-control" id="profileLastName" value="{{ old('name', $user->lname) }}">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="profileEmail">Email address</label>
                    <input type="email" name="email" class="form-control" id="profileEmail" value="{{ old('email', $user->email) }}">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="profilePhone">Phone Number</label>
                    <input name="phone" type="number" class="form-control" id="profilePhone" value="{{ old('phone', $user->phone) }}">
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="profilePassword">Password</label>
                    <input type="password" name="password" class="form-control" id="profilePassword">
                    <p><i>Leave password blank to keep current password</i></p>
                  </div>
                  <div class="form-group col-sm-6">
                    <label for="profileConfirmPassword">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="profileConfirmPassword">
                  </div>
                  <div class="form-group col-12">
                  <div class="form-group col-sm-12">
                    <label for="profilePhone">Address</label>
                    <input name="address" type="text" class="form-control" id="profileAddress" value="{{ old('phone', $user->address) }}">
                  </div>
                    <button type="submit" class="btn btn-success btn-block">SAVE</button>
                  </div>
                </div>
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