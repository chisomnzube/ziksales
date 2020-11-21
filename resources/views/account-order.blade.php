@extends('layouts.app')
@section('head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales Order, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. ">
    <meta name="description" content="My Orders. Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>My Orders | {{config('app.name')}}</title>
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
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead class="thead-light">
                    <tr>
                      <th>S/N</th>
                      <th scope="col">Order ID</th>
                      <th scope="col">Items</th>
                      <th scope="col">Date</th>
                      <th scope="col">Price</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>

                    @if($orders->count() > 0)
                      <?php $i = 0;?>
                      @foreach($orders as $order)
                      <?php $i++;?>
                      <tr>
                        <td>{{$i}}</td>
                        <th scope="row"><a href="{{ route('orders.show', $order->id) }}" class="text-info">ZS{{$order->id}}</a></th>
                        <td>
                            @foreach($order->products as $product) 
                               {{$product->name}} - <img style="width: 30px; height: 40px;" src="{{ productImage($product->image) }}"><br>
                            @endforeach   
                         </td>
                        <td>{{$order->created_at}}</td>
                        <td>&#8358;{{ number_format( $order->billing_total)}}</td>
                        <td>
                            {!!$order->shipped == 0 ? '<span class="badge badge-primary">In Progress</span>' : '<span class="badge badge-success">Delivered</span>' !!}
                        </td>
                      </tr>
                      @endforeach

                      @else
                        <p>No Order.</p>
                    @endif
                    
                  </tbody>
                </table>
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