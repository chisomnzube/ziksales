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
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
     <link rel="stylesheet" href="{{ asset('../dist/css/vendor.min.css') }}">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="{{ asset('../dist/css/style.min.css') }}">


    <title>Reset password | {{config('app.name')}}</title>
  </head>
@endsection  

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection        

@section('required-js')
    <!-- REQUIRED JS  -->
    <script src="{{ asset('../plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('../plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


    <!-- Mimity JS  -->
    <script src="{{ asset('../dist/js/script.min.js') }}"></script>
@endsection
