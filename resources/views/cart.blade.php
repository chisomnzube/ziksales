@extends('layouts.app')
@section('head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales Cart, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. ">
    <meta name="description" content="My cart - Ziksales. Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- PLUGINS FOR CURRENT PAGE -->
    <link rel="stylesheet" href="../plugins/swiper/swiper.min.css ">

    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css ">


    <title>My Cart | {{config('app.name')}}</title>
    <style>
        /*width:100%;*/
        @media (max-width: 720px) {
            .dimg {
                height: 120px;
            }
        }
        @media (min-width: 730px) {
            .dimg {
                height: 250px;
            }
        }
    </style>
  </head>
@endsection  
        
@section('main-content')


        <div class="col" id="main-content">
          @include('inc.messages')

          @if(Cart::count() > 0)
          <h3 class="title mb-3">You have {{Cart::count()}} item(s) in your cart</h3>

          <!-- Shopping Cart Table -->
          <table class="table table-cart">
            <tbody>
              
              @foreach(Cart::content() as $item)
              <tr>
                <td>                  
                  <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-sm btn-outline-warning rounded-circle" title="Remove"><i class="fa fa-close"></i></button>
                  </form>
                </td>
                <td>
                  <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" width="50" height="50" alt="{{ $item->model->name}} - {!! str_limit($item->model->details, 30) !!}"></a>                  
                  <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-sm btn-outline-warning rounded">Remove</button>
                  </form>
                </td>
                <td>
                  <h6><a href="{{ route('shop.show', $item->model->slug) }}" class="text-body">{{ $item->model->name}} - {!! str_limit($item->model->details, 30) !!}</a></h6>
                  <h6 class="text-muted">&#8358;{{ number_format( $item->subtotal)}}</h6>
                  
                  
                  <form action="{{ route('cart.wishlist', $item->rowId) }}" method="POST">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-primary btn-sm">Add to wishlist</button>
                  </form>
                  
                </td>
                <td>
                  <div class="input-spinner">
                    {{--<input type="number" class="form-control quantity" value="1" min="1" max="999">
                    <div class="btn-group-vertical">
                      <button type="button" class="btn btn-light"><i class="fa fa-chevron-up"></i></button>
                      <button type="button" class="btn btn-light"><i class="fa fa-chevron-down"></i></button>
                    </div>--}}

                    <select class="quantity form-control" data-id="{{ $item->rowId }}" data-productQuantity="{{$item->model->quantity}}">
                        @for($i = 1; $i < 5 + 1; $i++)
                            <option {{ $item->qty == $i ? 'selected' : '' }} >{{$i}}</option>
                        @endfor
                    </select>
                  </div>
                  {{--<span class="price">&#8358;not now</span>--}}
                </td>
              </tr>
              @endforeach     


              <tr>
                <td colspan="4">
                  <div class="box-total">
                    <h4>Total: <span class="price">&#8358;{{number_format($newTotal)}}</span></h4>
                    <a href="{{ route('checkout.index') }}" class="btn btn-success">CHECKOUT</a>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>

            @if(! session()->has('coupon'))
              <tr>
                <td colspan="12">
                      <form class="bg-light p-3 border shadow-sm" method="POST" action="{{ route('coupon.store') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                      {{ csrf_field() }}
                        <label for="checkoutName">Have Coupon Code?</label>
                          <input type="text" name="coupon_code" class="form-control" id="coupon_code">
                          
                          <button type="submit" class="btn btn-primary">Apply</button>
                    </form>
                </td>
              </tr>

              @else
              <tr>
                <td colspan="12">
                <form class="bg-light p-3 border shadow-sm" method="POST" action="{{ route('coupon.destroy') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <button type="submit" class="btn btn-primary">Remove Coupon</button>
              </form>
              </td>
            </tr>
              @endif
              <br/>
              
              
          
          <!-- /Shopping Cart Table -->
          @else
            <h3 class="title mb-3">No item(s) in your cart</h3>
          @endif  

              <a class="btn btn-success" href="{{ route('landing-page') }}">Continue Shopping</a><hr>

          <!-- Recently viewed-->
          <h4>Recently viewed items</h4>
          <div class="content-slider">
            <div class="swiper-container" id="popular-slider">
              <div class="swiper-wrapper">
                
                @for($i = 0; $i < 2; $i++)
                <div class="swiper-slide">
                  <div class="row no-gutters gutters-2">

                    @foreach($recentlyViews as $recentlyView)
                    <div class="col-6 col-md-3 mb-2">
                      <div class="card card-product">
                        {!! $recentlyView->quantity < setting('site.stock_threshold') ? '<div class="badge badge-danger badge-pill">Only '.$recentlyView->quantity.' left in stock</div>' : ''!!}
                        <a href="{{ route('shop.show', $recentlyView->slug) }}"><img src="{{ productImage($recentlyView->image) }}" alt="{{ $recentlyView->name}} - {!! str_limit($recentlyView->details, 30) !!}" class="card-img-top dimg"></a>
                        <div class="card-body">
                          <span class="price">&#8358;{{ number_format( totalcash($recentlyView->price, $recentlyView->profit) )}}</span>
                          <a href="{{ route('shop.show', $recentlyView->slug) }}" class="card-title h6">{{ $recentlyView->name }} - {!! str_limit($recentlyView->details, 30)!!}</a>
                          
                        </div>
                      </div>
                    </div>
                    @endforeach

                  </div>
                </div>
                @endfor
                
                
                
              </div>
            </div>
            <a href="#" role="button" class="carousel-control-prev" id="popular-slider-prev"><i class="fa fa-angle-left fa-lg"></i></a>
            <a href="#" role="button" class="carousel-control-next" id="popular-slider-next"><i class="fa fa-angle-right fa-lg"></i></a>
          </div>
          <!-- /Recently viewed-->

@include('layouts.footer')
@endsection  


@section('required-js')
    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- PLUGINS FOR CURRENT PAGE -->
    <script src="../plugins/swiper/swiper.min.js"></script>

    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>


    <!--extra js-->
    <script src="js/app.js"></script>
    <script >

        (function(){
          const classname = document.querySelectorAll('.quantity')

          Array.from(classname).forEach(function(element){
              element.addEventListener('change', function(){
                  const id = element.getAttribute('data-id')
                  const productQuantity = element.getAttribute('data-productQuantity')
                  
                    axios.patch(`/cart/${id}`, {
                    quantity: this.value,
                    productQuantity: productQuantity
                  })
                  .then(function (response) {
                    //console.log(response);
                    window.location.href = '{{ route('cart.index') }}'
                  })
                  .catch(function (error) {
                    //console.log(error);
                    window.location.href = '{{ route('cart.index') }}'
                  });
              })
          })

        })();
    </script>
    @endsection