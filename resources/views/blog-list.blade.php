@extends('layouts.app')
@section('head')

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Ziksales Blog, Best E-commerce Site In Nigeria, I want to Buy, about Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. ">
    <meta name="description" content="My Blog - Ziksales. Ziksales is an excellent E-commerce platform that makes buying and selling easy. We give you a safe, comfortable, secure and excellent shopping experience. We deal on products like Phones and Tablets, Men's fashion, Women's fashion, Electronics, Health and Beauty, Computing, Grocery, Sporting Goods, Home and Kitchen. Feel free shopping with us.">
  
    <!-- FONTS  -->
    <!-- <link rel="stylesheet" href="../fonts/nunito.css"> -->
    <!-- <link rel="stylesheet" href="../fonts/roboto.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700">

    <!-- REQUIRED CSS: BOOTSTRAP, METISMENU, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">

    <title>Blog | {{config('app.name')}}</title>
  </head>
 @endsection 
 

@section('main-content')
    <!-- Main Content -->
    <div class="container my-3">
      <div class="row">

        <div class="col">

          <!-- Blog Toolbar -->
          {{--<div class="card">
            <div class="card-body d-flex justify-content-end align-items-center py-2">
              <span class="mr-auto bold">Latest Blog</span>
              <div class="dropdown dropdown-hover">
                <button class="btn btn-light btn-sm border rounded-pill dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Newest <i data-feather="chevron-down"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right shadow-sm">
                  <button class="dropdown-item" type="button">Newest</button>
                  <button class="dropdown-item" type="button">Oldest</button>
                  <button class="dropdown-item" type="button">Popular</button>
                </div>
              </div>
              
            </div>
          </div>--}}
          <!-- /Blog Toolbar -->

          <!-- Blog List -->
          @if($posts->count() > 0)

          @foreach($posts as $post)
          <div class="card card-blog card-blog-list mt-3">
            <a href="{{ route('blog.show', $post->slug) }}" class="zoom-hover"><img style="width:100%; height:100%;" data-height="100%" src="{{ productImage($post->image) }}"></a>
            <div class="card-body">
              <a href="{{ route('blog.show', $post->slug) }}" class="title h4">{!! $post->title !!}</a>
              <p class="d-none d-sm-block">{!! str_limit($post->body, 150) !!}<a href="{{ route('blog.show', $post->slug) }}">Read more...</a></p>
              <div class="small text-muted counter">
                <i data-feather="" class="fa fa-comment"></i> {{countComment($post->id)}}
              </div>
            </div>
          </div>

          @endforeach

          @else
          <p>No Post yet!</p>
          @endif
         
          <!-- /Blog List -->

          <!-- Pagination -->
          <div class="card card-pagination mt-3">
            <div class="card-body">
              <a href="javascript:void(0)" class="btn btn-link btn-icon"><i data-feather="chevron-left"></i></a>
              <div class="d-inline-flex">
                {{ $posts->appends(request()->input())->links() }}

              </div>
              <a href="javascript:void(0)" class="btn btn-link btn-icon"><i data-feather="chevron-right"></i></a>
            </div>
          </div>
          <!-- /Pagination -->

        </div>

        <!-- Blog Sidebar -->
        <div class="col-md-4 col-lg-4 mt-3 mt-md-0">
          <div class="card">
            <div class="card-header bg-white border-bottom bold roboto-condensed">
              <h5 class="bold mb-0">POPULAR THIS <span class="text-primary">WEEK</span></h5>
            </div>
            <div class="card-body">

              <div class="row">
                
                @if($populars->count() > 0)
                @foreach($populars as $popular)
                <div class="col-12 col-sm-6 col-md-12">
                  <div class="card card-blog shadow-none">
                    <a href="{{ route('blog.show', $popular->slug) }}" class="zoom-hover"><img style="width: 100%; height: 100%;" src="{{ productImage($popular->image) }}" alt="{!!$popular->title!!}"></a>
                    <div class="card-body p-0 text-center">
                      <a href="{{ route('blog.show', $popular->slug) }}" class="title h5 mt-3">{!!$popular->title!!}</a>
                      <div class="small text-muted">
                        <i data-feather="message-square" class="ml-3"></i> {{countComment($popular->id)}} Comments
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                @else
                <p>No Popular Post this week</p>
                @endif
              </div>

            </div>
          </div>

        </div>
        <!-- /Blog Sidebar -->

      </div>
    </div>
    <!-- /Main Content -->
@endsection

@section('required-js')
    <!-- REQUIRED JS  -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../plugins/feather-icons/feather.min.js"></script>
    <script src="../plugins/metismenu/metisMenu.min.js"></script>
    <script src="../plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>
@endsection