@extends('layouts.app')
@section('head')
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. ">
    <meta name="description" content="The details of my Order. Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>Order Details | {{config('app.name')}}</title>
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
              <h3><u>ZS{{$order->id}}</u></h3>

              <ul class="nav nav-pills main-nav-pills" role="tablist">
                <li class="nav-item">
                  <a class="nav-link text-success" href="javascript:void(0)"><i class="fa fa-refresh"></i> PROCESSING</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="javascript:void(0)"><i class="fa fa-long-arrow-right"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-success" href="javascript:void(0)"><i class="fa fa-paper-plane"></i> SENDING</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="javascript:void(0)"><i class="fa fa-long-arrow-right"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-{{$order->shipped == 1 ? 'success' : 'muted'}}" href="javascript:void(0)"><i class="fa fa-gift"></i> DELIVERED</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="javascript:void(0)"><i class="fa fa-long-arrow-right"></i></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-{{$order->shipped == 1 ? 'success' : 'muted'}}" href="javascript:void(0)"><i class="fa fa-check-circle"></i> FINISHED</a>
                </li>
              </ul>

              <table class="table table-cart">
                <tbody>
                  <?php $price = 0; ?>
                  @foreach($order->products as $product) 
                  <tr>
                    <td hidden></td>
                    <td>
                      <a href="{{ route('shop.show',$product->slug) }}"><img src="{{ productImage($product->image) }}" width="50" height="50" alt="Product image" alt="{{$product->name}}"></a>
                      <button class="btn btn-sm btn-outline-warning rounded">Remove</button>
                    </td>
                    <td>
                      <h6><a href="{{ route('shop.show',$product->slug) }}" class="text-body">{{$product->name}}</a></h6>
                      <h6 class="text-muted">&#8358;{{ number_format( totalcash($product->price, $product->profit) )}}</h6>
                      
                      
                    </td>
                    <td>
                      Qty:
                      @foreach($order->order_products as $xyz)
                        
                            @if($product->id == $xyz['product_id'])
                                {{ $xyz['quantity'] }}
                                <span class="price">&#8358;{{ number_format($xyz['quantity'] * totalcash($product->price, $product->profit))}}</span>
                                
                            @endif
                      @endforeach  
                    </td>
                  </tr>
                  
                  <?php $price += totalcash($product->price, $product->profit) ?>
                  @endforeach

                </tbody>
              </table>
              <div class="text-right">
                <table class="table table-borderless table-sm mb-5">
                    <tbody>

                      <tr>
                        <td>Subtotal</td>
                        <td style="width:150px" class="roboto-condensed bold">&#8358;{{ number_format($order->billing_subtotal)}}</td>
                      </tr>

                      <tr>
                        <td>Discount({{$order->billing_discount_code}})</td>
                        <td class="roboto-condensed bold">  
                          &#8358;{{ number_format($order->billing_discount)}}
                       </td>
                      </tr>                      

                      <tr>
                        <td>Shipping Fee</td>
                        <td class="roboto-condensed bold">
                          &#8358;{{ number_format($order->delivery_fee)}}
                       </td>
                      </tr>

                      <tr>
                        <td class="bold">TOTAL</td>
                        <td class="roboto-condensed bold text-success h5">&#8358;{{ number_format($order->billing_subtotal + $order->delivery_fee)}}</td>
                      </tr>
                    </tbody>
                  </table>
              </div>

              <div class="row">
                <div class="col-lg-6">
                  <h5 class="bold"><u>Shipping Address :</u></h5>
                  <strong>{{auth()->user()->name.' '.auth()->user()->lname}}</strong><br/>
                  {{auth()->user()->email}}<br/>
                  {{auth()->user()->phone}}<br/>
                  {{auth()->user()->address}}<br/>
                </div>
                {{--<div class="col-lg-6 mt-4 mt-lg-0">
                  <h5 class="bold"><u>Payment Method :</u></h5>
                  <strong>Credit card</strong>
                  <table class="table table-borderless table-sm">
                    <tbody>
                      <tr>
                        <td>Number <span class="float-right">:</span></td>
                        <td>4567 8912 3456 7891 234</td>
                      </tr>
                      <tr>
                        <td>Full Name <span class="float-right">:</span></td>
                        <td>John Thor</td>
                      </tr>
                      <tr>
                        <td>Expiry Date <span class="float-right">:</span></td>
                        <td>01 / 2020</td>
                      </tr>
                      <tr>
                        <td>CVC Code <span class="float-right">:</span></td>
                        <td>1234</td>
                      </tr>
                    </tbody>
                  </table>
                </div>--}}
              </div>
              <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('orders.index') }}" class="btn btn-outline-primary btn-sm rounded-pill"><i class="fa fa-long-arrow-left"></i> Back</a>
                <button type="button" class="btn btn-primary btn-sm rounded-pill"><i class="fa fa-print"></i> Print</button>
              </div>

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