@extends('layouts.app')
@section('head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. ">
    <meta name="description" content="My Compare. Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>Compare | {{config('app.name')}}</title>
  </head>
@endsection  


@section('main-content')

        <div class="col" id="main-content">
            @include('inc.messages')

          <h3>Product Comparison</h3>
@if(Cart::instance('compare')->count() > 0)
          <div class="table-responsive">
            <table class="table table-bordered text-center table-wishlist">
              <thead>
                <tr>
                  
                  @foreach(Cart::instance('compare')->content() as $item)
                  <th>
                    <p><a href="detail.html"><img src="{{ productImage($item->model->image) }}" width="75" height="75" alt="{{ $item->model->name}} - {!! str_limit($item->model->details, 30) !!}"></a></p>
                    <p><a href="detail.html" class="text-body">{{ $item->model->name}} - {!! str_limit($item->model->details, 30) !!}</a></p>
                    <div class="btn-group btn-group-sm" role="group">
                      <form action="{{ route('compare.switchToCart', $item->rowId) }}" method="POST">
                          {{ csrf_field() }}
                      <button type="submit" class="btn btn-outline-info">Add to cart</button>
                      </form>
                    </div>
                  </th>
                  @endforeach              
                  
                  
                </tr>
              </thead>
              <tbody>
                <tr>

                @foreach(Cart::instance('compare')->content() as $item)
                  <td>
                    <strong>Price:</strong>
                    <div>&#8358;{{ number_format( totalcash($item->model->price, $item->model->profit) )}}</div>
                  </td>      
                @endforeach  
                  
                </tr>
                {{--<tr>
                  <td>
                    <strong>Model:</strong>
                    <div>Model 1</div>
                  </td>
                  <td>
                    <strong>Model:</strong>
                    <div>Model 2</div>
                  </td>
                  <td>
                    <strong>Model:</strong>
                    <div>Model 3</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>Brand:</strong>
                    <div>Brand 1</div>
                  </td>
                  <td>
                    <strong>Brand:</strong>
                    <div>Brand 2</div>
                  </td>
                  <td>
                    <strong>Brand:</strong>
                    <div>Brand 3</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>Availability:</strong>
                    <div>Availabel 1</div>
                  </td>
                  <td>
                    <strong>Availability:</strong>
                    <div>Availabel 2</div>
                  </td>
                  <td>
                    <strong>Availability:</strong>
                    <div>Availabel 3</div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <strong>Rating:</strong>
                    <div><div class="rating" data-value="2"></div></div>
                    <a href="#" class="text-muted small">(2 reviews)</a>
                  </td>
                  <td>
                    <strong>Rating:</strong>
                    <div><div class="rating" data-value="3"></div></div>
                    <a href="#" class="text-muted small">(3 reviews)</a>
                  </td>
                  <td>
                    <strong>Rating:</strong>
                    <div><div class="rating" data-value="4"></div></div>
                    <a href="#" class="text-muted small">(4 reviews)</a>
                  </td>
                </tr>--}}
                <tr>
                  @foreach(Cart::instance('compare')->content() as $item)
                  <td>                    
                    <div class="btn-group btn-group-sm" role="group">
                       <form action="{{ route('compare.destroy', $item->rowId) }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                      <button type="submit" class="btn btn-outline-info">Remove</button>
                      </form>
                    </div>
                  </td>
                  @endforeach                  
                </tr>
              </tbody>
            </table>
          </div>
@endif

@include('layouts.footer')
@endsection  


@section('required-js')
    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>
@endsection