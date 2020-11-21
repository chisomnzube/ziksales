@extends('layouts.app')
@section('head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales wishlist, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. ">
    <meta name="description" content="My Wishlist. Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>Wishlist | {{config('app.name')}}</title>
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
              @if(Cart::instance('wishlist')->count())
              <table class="table table-cart">
                <tbody>
                  
                  @foreach(Cart::instance('wishlist')->content() as $item)
                  <tr>
                    <td>                      
                      {{--<form action="{{ route('wishlist.destroy', $item->rowId) }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-sm btn-outline-warning rounded-circle" title="Remove"><i class="fa fa-close"></i></button>
                      </form>--}}
                    </td>
                    <td>
                      <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" width="50" height="50" alt="{{ $item->model->name}} - {!! $item->model->details!!}"></a>         
                      <form action="{{ route('wishlist.destroy', $item->rowId) }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          <button type="submit" class="btn btn-sm btn-outline-warning rounded">Remove</button>
                      </form>
                    </td>
                    <td>
                      <h6><a href="{{ route('shop.show', $item->model->slug) }}" class="text-body">{{ $item->model->name}} - {!! $item->model->details!!}</a></h6>
                      <h6 class="text-muted">&#8358;{{ number_format( totalcash($item->model->price, $item->model->profit) )}}</h6>
                      
                        {!!getStockLevel($item->model->quantity)!!}
                      
                    </td>
                    <td>
                      <form action="{{ route('wishlist.switchToCart', $item->rowId) }}" method="POST">
                          {{ csrf_field() }}
                        <button type="submit" class="btn btn-info btn-sm">Move to cart</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach

                  
                  {{--<tr>
                    <td colspan="4">
                      <button class="btn btn-outline-secondary">CLEAR ALL</button>
                    </td>
                  </tr>--}}
                </tbody>
              </table>
              @endif
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