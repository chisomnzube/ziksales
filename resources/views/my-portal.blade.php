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


    <!-- PLUGINS FOR CURRENT PAGE -->
    <link rel="stylesheet" href="../plugins/nouislider/nouislider.min.css">

    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>My Portal | {{config('app.name')}}</title>
  </head>
  @endsection
  

@section('main-content')
        <div class="col" id="main-content">
          @include('inc.messages')
          <!-- Category Banner -->
          <div class="card border-0 mb-3">
            <img src="../img/categories/1-wide.jpeg" alt="" class="card-img">
            <div class="card-img-overlay">
              <h2 class="card-title text-white title">{{ auth()->user()->name }} {{auth()->user()->lname}}</h2>
            </div>
          </div>
          <!-- /Category Banner -->

          <!-- List -->
          <div class="d-flex justify-content-between mt-4">
              <ul class="nav nav-pills">

                <li class="nav-item">
                  <a class="nav-link"  style="background-color: #ff6600;" href="{{ route('sell.product') }}">Add New Product</a>
                </li>  &nbsp;
                <div class="btn-group" role="group" aria-label="Basic example">
                  <a class="btn btn-outline-info" href="{{ route('users.edit') }}">Profile</a>&nbsp;
                  <a class="btn btn-outline-info" href="{{ route('orders.index') }}">Order</a>&nbsp;
                  <a class="btn btn-outline-info" href="{{ route('wishlist.index') }}">Wishlist</a>&nbsp;
                  <a class="btn btn-outline-info" href="{{ route('seller.brand') }}">Branding</a>
                </div>             
                
              </ul>
            
          </div>
          <div class="row no-gutters gutters-2">

            @if($trueSeller->count() > 0)

            @foreach($products as $product)
            <div class="col-6 col-sm-12 mb-2" style="{{$product->featured ? 'background-color:green' : 'background-color:orange' }};">
              <div class="card card-product card-product-list">
                <a href=""><img src="{{ productImage($product->image) }}" alt="{!! $product->name !!}" class="card-img-top"></a>
                <div class="card-body">
                  <a href="" class="card-title h5">{!! $product->name !!} - {{$product->featured ? 'Product approved' : 'Product awaiting approval' }}</a>
                  <div class="d-inline-block d-sm-block mb-2">
                    <span class="price">&#8358;{{ number_format( $product->price )}}</span>
                  </div>
                  <p lang="zxx">{{ $product->name}} - {!! str_limit($product->details, 30) !!}</p>
                  <a href="{{ route('view.product', $product->slug) }}" style="color: white;" class="btn btn-outline-info btn-sm btn-success">View</a>
                  <a href="{{ route('update.product', $product->slug) }}" class="btn btn-outline-info btn-sm ">Update</a>

                  <form action="{{ route('product.destroy', $product->id) }}" method="post" style="display: inline;">
                      {{ csrf_field() }}
                      {{ method_field('Delete') }}
                      <button style="color: white;" onclick="alert('Are you sure you want to delete!')" class="btn btn-outline-info btn-sm btn-danger" >Delete</button>
                  </form>

                </div>
              </div>
            </div>
            @endforeach
            @else
              <p>You have no item in store</p>
            @endif  



          </div>
          <!-- /List -->

          <!-- Pagination -->
          <nav aria-label="Page navigation Shop List">
            <ul class="pagination justify-content-center">
                @if($trueSeller->count() > 0)
                    {{ $products->appends(request()->input())->links() }}
                @endif     
            </ul>
          </nav>
          <!-- /Pagination -->

          
        </div>
    @endsection  

@section('required-js')
    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- PLUGINS FOR CURRENT PAGE -->
    <script src="../plugins/nouislider/nouislider.min.js"></script>
    <script src="../plugins/raty-fa/jquery.raty-fa.min.js"></script>

    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>
@endsection