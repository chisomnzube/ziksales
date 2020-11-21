@extends('layouts.app')
@section('head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. ">
    <meta name="description" content="My Checkout Page. Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>Checkout | {{config('app.name')}}</title>
  </head>
@endsection  
  
<?php
  foreach(Cart::instance('default')->content() as $item)
    {
        $product_id[] = $item->model->id;
        $product_qty[] = $item->qty;
    }
?>

@section('main-content')
        <div class="col" id="main-content">
          @include('inc.messages')

          <div class="row">
            <div class="col-sm-7 col-md-8">
              <h3 class="title"><i class="fa fa-map-marker"></i> Delivery address</h3>
              {{--<span class="text-muted">Step 1 of 3</span>--}}
              <hr>
              <form class="bg-light p-3 border shadow-sm" method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                <div class="form-group">
                  <label for="checkoutName">Name</label>
                  <input type="text" name="name" class="form-control" id="checkoutName" value="{{ auth()->user()->name.' '. auth()->user()->lname}}" disabled>
                </div>
                <div class="form-group">
                  <label for="checkoutPhone">Phone</label>
                  <input type="text" name="phone" class="form-control" id="checkoutPhone" value="{{ auth()->user()->phone}}" disabled>
                </div>
                <div class="form-group">
                  <label for="checkoutAddr1">Profile Delivery Address</label>
                  <input name="address" type="text" class="form-control" id="checkoutAddr1" value="{{ auth()->user()->address}}" disabled>
                </div>
                <div class="form-group">
                  <label for="checkoutAddr1">Delivery Address (Leave blank if you want to use your profile delivery address.)</label>
                  <input name="altaddress" type="text" class="form-control" id="altaddress" value="">
                  <small id="addr2Help" class="form-text text-muted">* Leave blank if you want delivery at your profile address </small>
                </div>
                
                    <input type="hidden" name="email" value="{{auth()->user()->email}}"> {{-- required --}}
                    {{-- <input type="hidden" name="orderID" value="555555555555"> --}}
                    <input type="hidden"  name="amount" value="{{$newTotal}}00"> {{-- required in kobo --}}
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" id="metadata" name="metadata" value="{{ json_encode($array = ['name' => auth()->user()->name,'address' => auth()->user()->address, 'phone' => auth()->user()->phone, 'delivery_fee' => $delivery_sum, 'user_id' => auth()->user()->id, 'newSubtotal' => $newSubtotal, 'discount' => $discount, 'discount_code' => $discount_code, 'product_id' => $product_id, 'product_qty' => $product_qty, 'altaddress' =>  '', ]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                    <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                    {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

                    <div class="btn-group btn-group-justified">
                      <p>
                        <button style="background-color: #ff751a; color: white;" class="btn btn-lg btn-block" type="submit" value="Pay Now!" onclick="alty();">
                        <i class="fa fa-money fa-lg"></i> Pay Now!
                        </button>
                      </p>&nbsp;
                      <p>                        
                        <a class="btn btn-info btn-lg btn-block" href='tel:+2348140987860'><i class="fa fa-phone fa-lg"></i> Call To Order</a>
                      </p>
                    </div>
              </form>
              
             
            </div>
            <div class="col-sm-5 col-md-4 pt-5">
              <h4 class="title mb-3">Order summary</h4>
              
              @if(Cart::content()->count() > 0)
                @foreach(Cart::content() as $item)
                <div class="media border-bottom mb-3">
                  <img src="{{ productImage($item->model->image) }}" width="50" height="50" alt="{{ $item->model->name}} - {!! str_limit($item->model->details, 30) !!}">
                  <div class="media-body ml-3">
                    <h6>{{ $item->model->name}} - {!! str_limit($item->model->details, 30) !!}</h6>
                    <div>{{$item->qty}} x <span class="price">&#8358;{{ number_format( totalcash($item->model->price, $item->model->profit) )}}</span></div>
                  </div>
                </div>
                @endforeach
              @endif
              
              
              <div class="d-flex justify-content-between">
                <span>Sub Total</span>
                <span>&#8358;{{ number_format(Cart::subtotal()) }}</span>
              </div>
              @if(session()->has('coupon'))
                <div class="d-flex justify-content-between">
                  <span>Discount({{ session()->get('coupon')['name'] }})</span>
                  <span>- &#8358;{{ number_format($discount) }}</span>
                </div>
               
              <div class="d-flex justify-content-between">
                <span>New SubTotal</span>
                <span> &#8358;{{ number_format($newSubtotal) }}</span>
              </div>
              @endif 

              <div class="d-flex justify-content-between">
                <span>Delivery Fee</span>
                <span>&#8358;{{number_format($delivery_sum)}}</span>
              </div>
              <hr>
              <div class="box-total">
                  <h4>TOTAL</h4>
                  <h4><span class="price">&#8358;{{number_format($newTotal)}}</span></h4>
              </div>              

            </div>
          </div>

        @include('layouts.footer') 
        @endsection


@section('required-js')
    <script>
      function alty() 
        {
          var altaddress = document.getElementById('altaddress').value;
          var metadata = document.getElementById('metadata').value;
          var position = -2;
          var output = [metadata.slice(0, position), altaddress, metadata.slice(position)].join('');
          document.getElementById('metadata').value = output;
          //window.alert(output);
          //document.getElementById('demoalt').innerHTML = altaddress;
          //document.getElementById('demoamount').value = altaddress;
        }
    </script>
    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>
@endsection