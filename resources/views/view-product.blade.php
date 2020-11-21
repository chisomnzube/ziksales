@extends('layouts.app')
@section('head')
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="{{ $product->keywords}}">
    <meta name="description" content="{{ $product->name}} has this specification {!! $product->details !!}">

    <!-- FONT  -->
    <!-- <link rel="stylesheet" href="../fonts/fira-sans.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fira+Sans">

    <!-- REQUIRED CSS: BOOTSTRAP, FONTAWESOME, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- PLUGINS FOR CURRENT PAGE -->
    <link rel="stylesheet" href="../plugins/swiper/swiper.min.css">
    <link rel="stylesheet" href="../plugins/photoswipe/photoswipe.min.css">
    <link rel="stylesheet" href="../plugins/photoswipe/photoswipe-default-skin/default-skin.min.css">

    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">


    <title>{{ $product->name}} :- {!! str_limit($product->details, 30) !!} | {{config('app.name')}}</title>
  </head>
@endsection  
  
@section('main-content')

        <div class="col" id="main-content">
          @include('inc.messages')

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('seller.index') }}" class="text-info">Dashboard</a></li>
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
                <h3 class="price">&#8358;{{ number_format($product->price)  }}</h3>
                    <div class="form-group mb-4">
                      <div class="btn-group btn-group-sm btn-group-toggle" data-toggle="buttons">
                        
                          Quantity: {{$product->quantity}}
                        
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


              <hr>
              <div class="d-flex align-items-center">
                <span class="text-muted">Share</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}{{auth()->user()? '?refId=r'.auth()->user()->id.'z' : ''}}" class="btn btn-light btn-icon rounded-circle border ml-2" data-toggle="tooltip" title="Facebook" target="_blank"><i data-feather="facebook" class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/intent/tweet?text={{$product->name.' '.str_limit($product->details, 100).' - Click on the link '}}{{url()->current()}}{{auth()->user()? '?refId=r'.auth()->user()->id.'z' : ''}}" class="btn btn-light btn-icon rounded-circle border ml-2" data-toggle="tooltip" title="Twitter"><i data-feather="twitter" class="fa fa-twitter" target="_blank"></i></a>
                <a href="https://wa.me/?text={{$product->name.' '.str_limit($product->details, 100).' - Click on the link '}}{{url()->current()}}{{auth()->user()? '?refId=r'.auth()->user()->id.'z' : ''}}" class="btn btn-light btn-icon rounded-circle border ml-2" data-toggle="tooltip" title="Whatsapp" target="_blank"><i data-feather="whatsapp" class="fa fa-whatsapp"></i></a>
              </div>
            </div>
          </div>
          <hr>
          <div class="row mt-4">
            <div class="col">
              <h3>Description</h3>
              {!! $product->description !!}
              
              <hr>


              <hr>

              
              

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
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>


    <!-- PLUGINS FOR CURRENT PAGE -->
    <script src="../plugins/swiper/swiper.min.js"></script>
    <script src="../plugins/raty-fa/jquery.raty-fa.min.js"></script>
    <script src="../plugins/photoswipe/photoswipe.min.js"></script>
    <script src="../plugins/photoswipe/photoswipe-ui-default.min.js"></script>

    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>
@endsection