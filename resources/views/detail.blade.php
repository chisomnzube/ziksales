@extends('layouts.app')
@section('head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="{{ $product->keywords}}">
    <meta name="description" content="{{ $product->name}} is in {{$subName}} category and it's features are {!! $product->details !!}">
    <meta property="og:image" content="{{ productImage($product->image) }}">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="{{ asset('../dist/css/vendor.min.css') }}">


    <!-- PLUGINS FOR CURRENT PAGE -->
    <link rel="stylesheet" href="{{ asset('../plugins/swiper/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../plugins/photoswipe/photoswipe.min.css') }}">
    <link rel="stylesheet" href="{{ asset('../plugins/photoswipe/photoswipe-default-skin/default-skin.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/starability-minified/starability-all.min.css') }}"/>

    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="{{ asset('../dist/css/style.min.css') }}">


    <title>{{ $product->name}} :- {!! str_limit($product->details, 30) !!} | {{config('app.name')}}</title>
    {{-- <style>
        img
        {
            width:100%;
        }
    </style> --}}
    <style>
        width:100%;
        @media (max-width: 720px) {
            .dimg {
                height: 120px;
            }
        }
        @media (min-width: 730px) {
            .dimg {
                height: 230px;
            }
        }
    </style>
  </head>
@endsection  
  
@section('main-content')

        <div class="col" id="main-content">
          @include('inc.messages')

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('landing-page') }}" class="text-info">Home</a></li>
              <li class="breadcrumb-item"><a  class="text-info">{{$subName}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->

          <div class="row">
            <div class="col-md-7">
              <div class="img-detail-wrapper">
                <img src="{{ productImage($product->image) }}" class="img-fluid px-5" id="img-detail" alt="{{ $product->name}}- {!! str_limit($product->details, 30) !!}" data-index="0">
                <div class="img-detail-list">
                  <a href="#" class="active"><img src="{{ productImage($product->image) }}" data-large-src="{{ productImage($product->image) }}" alt="{{ productImage($product->image) }}" data-index="0"></a>

                  @if($product->images)
                    
                      @foreach( json_decode($product->images, true) as $image)
                        <a href="#"><img src="{{ productImage($image) }}" data-large-src="{{ productImage($image) }}" alt="{{ productImage($image) }}" data-index="
                          @for($i = 1; $i <= count( json_decode($product->images, true) ); $i++)
                                {{$i}}
                          @endfor       
                          "></a>
                      @endforeach
                     
                  @endif
                  
                </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="detail-header">
                <h3>{{ $product->name }}</h3>
                <h3 class="price">&#8358;{{ number_format(totalcash($product->price, $product->profit) ) }}</h3>
                    <div class="form-group mb-4">
                      <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                        
                          {!!$stockLevel!!}
                        
                      </div>
                    </div>
              </div>
              <form>
                <div class="form-group">
                    
                  <label class="d-block"><b>Details</b></label>
                  <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                    
                      <p>{!! $product->details !!}</p>
                    
                  </div>
                </div>
               
              </form>
              <form>
                <div class="form-group">
                    
                  <label class="d-block"><b>Delivery Information</b></label>
                  <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                    
                      <p>{{getDeliveryDay($product->delivery_info) }}</p>
                    
                  </div>
                </div>
               
              </form>

              @if($product->quantity > 0)
                <form action="{{ route('cart.store') }}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="id" value="{{ $product->id }}">
                  <input type="hidden" name="name" value="{{ $product->name }}">
                  <input type="hidden" name="price" value="{{ totalcash($product->price, $product->profit) }}">
                    <div class="form-group">
                      <button type="submit" class="btn btn-info btn-block">ADD TO CART</button>
                    </div>
                </form>
              @endif  
              <div class="row">
                  <div class="col-md-6" style="margin:5px;">
                      <a class="btn btn-block" style="background-color: #ff6600; color:white;" href="https://wa.me/2347031382795?text=Hello Mr. Ziksales, I will like to order for this item {{$product->name}} - {!! str_limit($product->details, 30) !!} as seen on {{url()->current()}}"><i data-feather="whatsapp" class="fa fa-whatsapp"></i> Order on Whatsapp</a>
                  </div>
                  <div class="col-md-5" style="margin:5px;">
                      <form action="{{ route('compare.store') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="hidden" name="name" value="{{ $product->name }}">
                        <input type="hidden" name="price" value="{{ totalcash($product->price, $product->profit) }}">
                          <div class="form-group">
                            <button type="submit" class="btn btn-block" style="background-color: #ff6600; color:white;">Add To Compare</button>
                          </div>
                      </form>
                  </div>
              </div>
              <hr>
              <div class="d-flex align-items-center">
                <span class="text-muted">Share</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" class="btn btn-light btn-icon rounded-circle border ml-2" data-toggle="tooltip" title="Facebook" target="_blank"><i data-feather="facebook" class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/intent/tweet?text=Check out {{$product->name.' '.str_limit($product->details, 100).' - Click on the link '}}{{url()->current()}}" class="btn btn-light btn-icon rounded-circle border ml-2" data-toggle="tooltip" title="Twitter"><i data-feather="twitter" class="fa fa-twitter" target="_blank"></i></a>
                <a href="https://wa.me/?text=Check out {{$product->name.' '.str_limit($product->details, 100).' - Click on the link '}}{{url()->current()}}" class="btn btn-light btn-icon rounded-circle border ml-2" data-toggle="tooltip" title="Whatsapp" target="_blank"><i data-feather="whatsapp" class="fa fa-whatsapp"></i></a>
              </div>
            </div>
          </div>
          <hr>
          <div class="row mt-4">
            <div class="col">
              <h3>Description</h3>
              {!! $product->description !!}
              
              <hr>

              <!-- Similar Items -->
              <h3>Similar {!!$subName!!}</h3>
              <div class="content-slider">
            <div class="swiper-container" id="popular-slider">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="row no-gutters gutters-2">

                    @foreach($relaProducts as $relaProduct)
                    <div class="col-4 col-md-4 mb-2">
                      <div class="card card-product" style="height: 100%; width: 100%;">
                        {!! $product->quantity < setting('site.stock_threshold') ? '<div class="badge badge-danger badge-pill">Only '.$product->quantity.' left in stock</div>' : ''!!}        
                        <a href="{{ route('shop.show', $relaProduct->slug) }}"><img src="{{ productImage($relaProduct->image) }}" alt="{{ $relaProduct->name}} :- {!! str_limit($relaProduct->details, 30) !!}" class="card-img-top dimg"></a>
                        <div class="card-body">
                          <span class="price"> &#8358;{{ number_format( totalcash($relaProduct->price, $relaProduct->profit) )}}</span>
                          <a href="{{ route('shop.show', $relaProduct->slug) }}" class="card-title h6">{{ $relaProduct->name }} - {!! str_limit($relaProduct->details, 30)!!}</a>
                          
                        </div>
                      </div>
                    </div>
                    @endforeach

                  </div>
                </div>
                
               {{-- <div class="swiper-slide">
                  <div class="row no-gutters gutters-2">

                    <div class="col-6 col-md-3 mb-2">
                      <div class="card card-product">
                        <div class="badge badge-success badge-pill">save $89.01</div>
                        <button class="wishlist" title="Add tot wishlist"><i class="fa fa-heart"></i></button>
                        <a href="detail.html"><img src="../img/product/9.jpg" alt="ASUS VivoBook F510UA FHD Laptop" class="card-img-top"></a>
                        <div class="card-body">
                          <span class="price"><del class="small text-muted">$599.00</del> $509.99</span>
                          <a href="detail.html" class="card-title h6">ASUS VivoBook F510UA FHD Laptop</a>
                          <div class="d-flex justify-content-between align-items-center">
                            <span class="rating" data-value="4"></span>
                            <button type="button" class="btn btn-outline-info btn-sm">Add to cart</button>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div> --}}
                
              </div>
            </div>
           
          </div>
              <!-- /Similar Items -->

              <hr>
              <h3 id="reviews">Reviews</h3>
              

              @if($reviews->count() > 0)
              @foreach($reviews as $review)
              <div class="media">
                <div class="media-body ml-3">
                  <h5 class="mb-0">{{$review->user_name }}</h5>
                  <p class="starability-result" data-rating="{{$review->rating}}">
                    Rated: {{$review->rating}} stars
                  </p>
                  {{-- <small class="ml-2">{{$review->rating}} - {{$review->created_at}}</small> --}}
                  <p>{{$review->review}}</p>
                </div>
              </div>
              @endforeach

              @else
                <h6>No Review yet!</h6>
              @endif
              

            </div>
          </div>

        

    <!-- Photoswipe container-->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="pswp__bg"></div>
      <div class="pswp__scroll-wrap">
        <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
            <div class="pswp__counter"></div>
            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
            <button class="pswp__button pswp__button--share" title="Share"></button>
            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
            <div class="pswp__preloader">
              <div class="pswp__preloader__icn">
                <div class="pswp__preloader__cut">
                  <div class="pswp__preloader__donut"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
            <div class="pswp__share-tooltip"></div>
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          <div class="pswp__caption">
            <div class="pswp__caption__center"></div>
          </div>
        </div>
      </div>
    </div>
    @include('layouts.footer')
 @endsection
   

@section('required-js')
    <!-- REQUIRED JS  -->
    <script src="{{ asset('../plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('../plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('../plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


    <!-- PLUGINS FOR CURRENT PAGE -->
    <script src="{{ asset('../plugins/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('../plugins/raty-fa/jquery.raty-fa.min.js') }}"></script>
    <script src="{{ asset('../plugins/photoswipe/photoswipe.min.js') }}"></script>
    <script src="{{ asset('../plugins/photoswipe/photoswipe-ui-default.min.js') }}"></script>

    <!-- Mimity JS  -->
    <script src="{{ asset('../dist/js/script.min.js') }}"></script>
@endsection