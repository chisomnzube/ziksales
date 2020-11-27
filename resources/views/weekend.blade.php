@extends('layouts.app')
@section('head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen.">
    <meta name="description" content=" Weekend sales is our big sales of the week. Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">

    <!-- FONT  --> 
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- PLUGINS FOR CURRENT PAGE -->
    <link rel="stylesheet" href="../plugins/nouislider/nouislider.min.css">

    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">

  </head>
  @endsection
  

@section('main-content')
        <div class="col" id="main-content">
          @include('inc.messages')


          <div class="d-flex justify-content-between">
            {{-- <!-- Tags -->
            <div class="btn-tags">
              @if($categories->count() > 0)
                @foreach($categories as $category)
                  <a href="{{ route('shop.index',['category' => $category->slug,]) }}" class="btn btn-light btn-sm  {{request()->category == $category->slug ? 'active' : ''}}">{!! $category->name !!}</a>
                @endforeach
              @endif

            </div>
            <!-- /Tags --> --}}

            <!-- Filter Modal Toggler -->
            <span>
              <button class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#filterModal"><i class="fa fa-filter"></i> FILTER</button>
            </span>
          </div>

          <!-- Grid -->
          <div class="d-flex justify-content-between mt-4">
            <h3 class="title">{{ $categoryName }}</h3>
            <div class="btn-group btn-group-sm align-self-start" role="group">
            </div>
          </div>
          <div class="row no-gutters gutters-2">

            <div class="row" style="width: 100%;" >
              <div class="col-md-12">
                <div class="d-flex justify-content-center">
                  <div class="powr-countdown-timer" id="222b1c7f_1606491543"></div>
                  <script src="https://www.powr.io/powr.js?platform=html"></script>
                </div>
              </div>
            </div>
            
            

            {{-- @if($products->count() > 0)
              @foreach($products as $product)
                  <div class="col-6 col-md-3 mb-2">
                    <div class="card card-product" style="height: 100%; width: 100%;">
                      
                      {!! $product->quantity < setting('site.stock_threshold') ? '<div class="badge badge-danger badge-pill">Only '.$product->quantity.' left</div>' : ''!!}
                      <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ productImage($product->image) }}" alt="{{ $product->name}} - {!! str_limit($product->details, 30) !!}" class="card-img-top dimg"></a>
                      <div class="card-body">
                        <span class="price"><del class="small text-muted">&#8358;{{ number_format( slash($product->price, $product->profit) )}}</del>&#8358;{{ number_format( totalcash($product->price, $product->profit))}}</span>
                        <a href="{{ route('shop.show', $product->slug) }}" class="card-title h6"><small>{{ $product->name}} - {!! str_limit($product->details, 30) !!}</small></a>
                        
                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ totalcash($product->price, $product->profit) }}">
                              <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-outline-info btn-sm btn-block">Add to cart</button>
                              </div>
                          </form>
                      </div>
                    </div>
                  </div>
              @endforeach
            @else
              <p>No product Found</p>
            @endif      --}}    

        
          </div>
          <!-- /Grid -->
            <!-- Pagination -->
            <nav aria-label="Page navigation Shop Grid">
                <div class="pagination justify-content-center">
                  {{--  {{$products->links()}} --}}
                  {{ $products->appends(request()->input())->onEachSide(1)->links() }}
                </div>         
                
            </nav>
            <!-- /Pagination -->
          

@include('layouts.footer')          
@endsection        
      

    <!-- Modal Cart -->


    <!-- Modal filter -->
    <div class="modal fade modal-filter" id="filterModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="form-group">
                <label for="filterSortBy"><ul>By Price</ul></label><br>
                <a class="btn btn-default btn-primary" href="{{ route('shop.index', ['category' => request()->category, 'subCategory' => request()->subCategory, 'sort' => 'low_high']) }}">Low to High</a><br><br>
                <a class="btn btn-default btn-primary" href="{{ route('shop.index', ['category' => request()->category, 'subCategory' => request()->subCategory, 'sort' => 'high_low']) }}">High to Low</a>
            </div>
            {{--<form>
              <div class="form-group">
                
                <label for="filterSortBy">Sort by</label>
                <select class="form-control custom-select" id="filterSortBy">
                  <option>Popular</option>
                  <option>Price: low to high</option>
                  <option>Price: high to low</option>
                </select>
              </div>
              <hr>
              <div class="form-group">
                <label for="filterCategory">Category</label>
                <select id="filterCategory" class="form-control custom-select">
                  <option>Laptops</option>
                  <option>Desktops</option>
                  <option>PC Gaming</option>
                  <option>Monitors</option>
                  <option>Tablets</option>
                  <option>Computer Accessories</option>
                  <option>Networking</option>
                  <option>Computer Components</option>
                  <option>Storage &amp; Hard Drives</option>
                </select>
              </div>
              <hr>
              <div class="form-group">
                <label class="mb-5">Price Range</label>
                <div id="price-range"></div>
              </div>
              <hr>
              <div class="form-group">
                <label>Rating</label>
                <div id="star-rating" data-score="4.5"></div>
              </div>
              <hr>
              <div class="form-group text-center">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="reset" class="btn btn-light">CLEAR ALL</button>
                  <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">DONE</button>
                </div>
              </div>
            </form>--}}
          </div>
        </div>
      </div>
    </div>

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
