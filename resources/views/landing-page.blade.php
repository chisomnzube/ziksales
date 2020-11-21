@extends('layouts.app')
@section('head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen.">
    <meta name="description" content="Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- PLUGINS FOR CURRENT PAGE -->
    <link rel="stylesheet" href="../plugins/swiper/swiper.min.css">

    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>Ziksales - The Best shopping Experience in Nigeria</title>
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

          <!-- Home Slider -->
          <div class="swiper-container" id="home-slider">
            <div class="swiper-wrapper">
                          
              @if($banners->count() > 0)
                @foreach($banners as $banner)
                  <a href="{{ $banner->routes }}" class="swiper-slide" 
                    data-cover="{!! productImage($banner->image) !!}" data-xs-height="150px" data-sm-height="265px" data-md-height="300px" data-lg-height="300px" data-xl-height="300px"><img style="width:100%; height:100%" src="{!! productImage($banner->image) !!}"></a>
                @endforeach  
              @endif

            </div>
            <a href="#" role="button" class="carousel-control-prev d-none d-sm-flex" id="home-slider-prev"><i class="fa fa-angle-left fa-lg"></i></a>
            <a href="#" role="button" class="carousel-control-next d-none d-sm-flex" id="home-slider-next"><i class="fa fa-angle-right fa-lg"></i></a>
          </div>
          <!-- /Home Slider -->
          @include('inc.messages')

          <!-- FOR FASHION AND HEALTH/BEAUTY -->
          <div class="row services-box">
            
            <div class="col-4 col-md-4">
              <a href="{{ route('shop.index', ['category' => 'women-s-fashion']) }}" style="color: #ff751a;">
                <div class="media">
                  <i class="fa fa-female"></i>
                  <div class="media-body">
                    <h6>FEMALE'S FASHION</h6>
                    <span class="text-muted d-none d-md-block">Get the item you ordered, or your money back</span>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-4 col-md-4">
              <a href="{{ route('shop.index', ['category' => 'men-s-fashion']) }}" style="color: #ff751a;">
                <div class="media">
                  <i class="fa fa-male"></i>
                  <div class="media-body">
                    <h6>MALE'S FASHION</h6>
                    <span class="text-muted d-none d-md-block">Your transaction are secure with SSL Encryption</span>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-4 col-md-4">
              <a href="{{ route('shop.index', ['category' => 'health-and-beauty']) }}" style="color: #ff751a;">
                <div class="media">
                  <i class="fa fa-medkit"></i>
                  <div class="media-body">
                    <h6>HEALTH AND BEAUTY</h6>
                    <span class="text-muted d-none d-md-block">Chat with experts or have us call you right away</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- /FOR FASHION AND HEALTH/BEAUTY  -->

          
          <div class="card" style="border-radius: 5px;">
            <!-- Hot new releases -->
              <div class="card-header" style="background-color: #ff8533; color: white;">
                <b>Beauty & Fashion</b>
              </div>
            <div class="row no-gutters gutters-2">

              @if($fasbeas->count() > 0)
              @foreach($fasbeas as $fasbea)
              <div class="col-4 col-md-3 mb-2">
                <div class="card card-product" style="height: 100%; width: 100%;">
                  {!! $fasbea->quantity < setting('site.stock_threshold') ? '<div class="badge badge-danger badge-pill">Only '.$fasbea->quantity.' left</div>' : ''!!}
                  <a href="{{ route('shop.show', $fasbea->slug) }}"><img src="{{ productImage($fasbea->image) }}" alt="{{ $fasbea->name}} - {!! str_limit($fasbea->details, 30) !!}" class="card-img-top dimg"></a>
                  <div class="card-body">
                    <span class="price"><del class="small text-muted">&#8358;{{ number_format( slash($fasbea->price, $fasbea->profit) )}}</del>&#8358;{{ number_format( totalcash($fasbea->price, $fasbea->profit) )}}</span>
                    <a href="{{ route('shop.show', $fasbea->slug) }}" class="card-title h6"><small>{{ $fasbea->name}} - {!! str_limit($fasbea->details, 30) !!}</small></a>                    
                  </div>
                </div>
              </div>
              @endforeach

              @else
              <p>No product found</p>
              @endif            

            </div>
            <!-- /Hot new releases -->
          </div>
          

            
          <!-- For electronics,  laptops then a section for phone -->
          <div class="row services-box">
            
            <div class="col-4 col-md-4">
              <a href="{{ route('shop.index', ['category' => 'electronics']) }}" style="color: #ff751a;">
                <div class="media">
                  <i class="fa fa-tv"></i>
                  <div class="media-body">
                    <h6>ELECTRONICS</h6>
                    <span class="text-muted d-none d-md-block">Get the item you ordered, or your money back</span>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-4 col-md-4">
              <a href="{{ route('shop.index', ['category' => 'computer']) }}" style="color: #ff751a;">
                <div class="media">
                  <i class="fa fa-laptop"></i>
                  <div class="media-body">
                    <h6>COMPUTER</h6>
                    <span class="text-muted d-none d-md-block">Your transaction are secure with SSL Encryption</span>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-4 col-md-4">
              <a href="{{ route('shop.index', ['category' => 'phones-and-tablets']) }}" style="color: #ff751a;">
                <div class="media">
                  <i class="fa fa-mobile"></i>
                  <div class="media-body">
                    <h6>PHONES & TABLETS</h6>
                    <span class="text-muted d-none d-md-block">Chat with experts or have us call you right away</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- /For electronics,  laptops then a section for phone -->

          <div class="card" style="border-radius: 5px;">
            <!-- Hot new releases -->
              <div class="card-header" style="background-color: #ff8533; color: white;">
                <b>Computer & Electronics</b>
              </div>
              <div class="row no-gutters gutters-2">

                @if($comeles->count() > 0)
                @foreach($comeles as $comele)
                <div class="col-4 col-md-3 mb-2">
                  <div class="card card-product" style="height: 100%; width: 100%;">
                    {!! $comele->quantity < setting('site.stock_threshold') ? '<div class="badge badge-danger badge-pill">Only '.$comele->quantity.' left</div>' : ''!!}
                    <a href="{{ route('shop.show', $comele->slug) }}"><img src="{{ productImage($comele->image) }}" alt="{{ $comele->name}} - {!! str_limit($comele->details, 30) !!}" class="card-img-top dimg"></a>
                    <div class="card-body">
                      <span class="price"><del class="small text-muted">&#8358;{{ number_format( slash($comele->price, $comele->profit) )}}</del>&#8358;{{ number_format( totalcash($comele->price, $comele->profit) )}}</span>
                      <a href="{{ route('shop.show', $comele->slug) }}" class="card-title h6"><small>{{ $comele->name}} - {!! str_limit($comele->details, 30) !!}</small></a>
                        
                    </div>
                  </div>
                </div>
                @endforeach

                @else
                <p>No product found</p>
                @endif            

              </div>
              <!-- /For you -->
            </div>

          <div class="card" style="border-radius: 5px;">
            <!-- Hot new releases -->
              <div class="card-header" style="background-color: #ff8533; color: white;">
                <b>Phones & Tablets</b>
              </div>
              <div class="row no-gutters gutters-2">

                @if($mobiles->count() > 0)
                @foreach($mobiles as $mobile)
                <div class="col-4 col-md-3 mb-2">
                  <div class="card card-product" style="height: 100%; width: 100%;">
                    {!! $mobile->quantity < setting('site.stock_threshold') ? '<div class="badge badge-danger badge-pill">Only '.$mobile->quantity.' left</div>' : ''!!}
                    <a href="{{ route('shop.show', $mobile->slug) }}"><img src="{{ productImage($mobile->image) }}" alt="{{ $mobile->name}} - {!! str_limit($mobile->details, 30) !!}" class="card-img-top dimg"></a>
                    <div class="card-body">
                      <span class="price"><del class="small text-muted">&#8358;{{ number_format( slash($mobile->price, $mobile->profit) )}}</del>&#8358;{{ number_format( totalcash($mobile->price, $mobile->profit) )}}</span>
                      <a href="{{ route('shop.show', $mobile->slug) }}" class="card-title h6"><small>{{ $mobile->name}} - {!! str_limit($mobile->details, 30) !!}</small></a>
                        
                    </div>
                  </div>
                </div>
                @endforeach

                @else
                <p>No product found</p>
                @endif            

              </div>
              <!-- /Electronics-->
            </div>

          <!-- For electronics,  laptops then a section for phone -->
          <div class="row services-box">
            
            <div class="col-4 col-md-4">
              <a href="{{ route('shop.index', ['category' => 'grocery']) }}" style="color: #ff751a;">
                <div class="media">
                  <i class="fa fa-cutlery"></i>
                  <div class="media-body">
                    <h6>GROCERY</h6>
                    <span class="text-muted d-none d-md-block">Get the item you ordered, or your money back</span>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-4 col-md-4">
              <a href="{{ route('shop.index', ['category' => 'home-and-office']) }}" style="color: #ff751a;">
                <div class="media">
                  <i class="fa fa-home"></i>
                  <div class="media-body">
                    <h6>HOME & OFFICE</h6>
                    <span class="text-muted d-none d-md-block">Your transaction are secure with SSL Encryption</span>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-4 col-md-4">
              <a href="{{ route('shop.index', ['category' => 'books-and-stationary']) }}" style="color: #ff751a;">
                <div class="media">
                  <i class="fa fa-book"></i>
                  <div class="media-body">
                    <h6>BOOKS & STATIONARY</h6>
                    <span class="text-muted d-none d-md-block">Chat with experts or have us call you right away</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- /For electronics,  laptops then a section for phone -->

          <div class="card" style="border-radius: 5px;">
            <!-- Hot new releases -->
              <div class="card-header" style="background-color: #ff8533; color: white;">
                <b>Grocery</b>
              </div>
              <div class="row no-gutters gutters-2">

                @if($grocerys->count() > 0)
                @foreach($grocerys as $grocery)
                <div class="col-4 col-md-3 mb-2">
                  <div class="card card-product" style="height: 100%; width: 100%;">
                    {!! $grocery->quantity < setting('site.stock_threshold') ? '<div class="badge badge-danger badge-pill">Only '.$grocery->quantity.' left</div>' : ''!!}
                    <a href="{{ route('shop.show', $grocery->slug) }}"><img src="{{ productImage($grocery->image) }}" alt="{{ $grocery->name}} - {!! str_limit($grocery->details, 30) !!}" class="card-img-top dimg"></a>
                    <div class="card-body">
                      <span class="price"><del class="small text-muted">&#8358;{{ number_format( slash($grocery->price, $grocery->profit) )}}</del>&#8358;{{ number_format( totalcash($grocery->price, $grocery->profit) )}}</span>
                      <a href="{{ route('shop.show', $grocery->slug) }}" class="card-title h6"><small>{{ $grocery->name}} - {!! str_limit($grocery->details, 30) !!}</small></a>
                        
                    </div>
                  </div>
                </div>
                @endforeach

                @else
                <p>No product found</p>
                @endif            

              </div>
              <!-- /Fashion -->
            </div>

          <div class="card" style="border-radius: 5px;">
            <!-- Hot new releases -->
              <div class="card-header" style="background-color: #ff8533; color: white;">
                <b>Books & Home Equipments</b>
              </div>
              <div class="row no-gutters gutters-2">

                @if($homebooks->count() > 0)
                @foreach($homebooks as $homebook)
                <div class="col-4 col-md-3 mb-2">
                  <div class="card card-product" style="height: 100%; width: 100%;">
                    {!! $homebook->quantity < setting('site.stock_threshold') ? '<div class="badge badge-danger badge-pill">Only '.$homebook->quantity.' left</div>' : ''!!}
                    <a href="{{ route('shop.show', $homebook->slug) }}"><img src="{{ productImage($homebook->image) }}" alt="{{ $homebook->name}} - {!! str_limit($homebook->details, 30) !!}" class="card-img-top dimg"></a>
                    <div class="card-body">
                      <span class="price"><del class="small text-muted">&#8358;{{ number_format( slash($homebook->price, $homebook->profit) )}}</del>&#8358;{{ number_format( totalcash($homebook->price, $homebook->profit) )}}</span>
                      <a href="{{ route('shop.show', $homebook->slug) }}" class="card-title h6"><small>{{ $homebook->name}} - {!! str_limit($homebook->details, 30) !!}</small></a>
                        
                    </div>
                  </div>
                </div>
                @endforeach

                @else
                <p>No product found</p>
                @endif            

              </div>
              <!-- /Mobile Phones -->
            </div>


          
          @include('layouts.footer')
        @endsection
        
    

    <!-- Modal Cart -->
    

@section('required-js')
    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- PLUGINS FOR CURRENT PAGE -->
    <script src="../plugins/swiper/swiper.min.js"></script>

    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>
@endsection
  