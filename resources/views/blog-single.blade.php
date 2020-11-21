@extends('layouts.app')
@section('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="{!! str_limit($post->meta_keywords, 60) !!}">
    <meta name="description" content="{!! str_limit($post->body, 150) !!}">
  

    <!-- FONTS  -->
    <!-- <link rel="stylesheet" href="../fonts/nunito.css"> -->
    <!-- <link rel="stylesheet" href="../fonts/roboto.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700">

    <!-- REQUIRED CSS: BOOTSTRAP, METISMENU, PERFECT-SCROLLBAR  -->
    <link rel="stylesheet" href="../dist/css/vendor.min.css">


    <!-- Mimity CSS  -->
    <link rel="stylesheet" href="../dist/css/style.min.css">

    <title>{!!$post->title!!} | {{config('app.name')}}</title>
  </head>
@endsection  

@section('main-content')
    <!-- Main Content -->
    <div class="container my-3">
      <div class="row">

        <div class="col">
        @include('inc.messages')
          <div class="card">
            <div class="card-body" lang="zxx"> <!-- because 'lorem ipsum' is not english language, so we add lang="zxx" attribute, remove it on production environment -->

              <!-- Blog Info -->
              <ul class="list-inline">
                <li class="list-inline-item"><small><i data-feather="clock"></i>{{$post->created_at}}</small></li>
                <li class="list-inline-item"><small><i data-feather="user"></i> <a href="javascript:void(0)" class="text-muted">Admin</a></small></li>
                
              </ul>

              <!-- Blog Content -->
              <h2 class="bold">{!!$post->title!!}</h2>
              <img src="{{ productImage($post->image) }}" alt="{!!$post->title!!}" class="img-fluid my-3">
              <p>{!!$post->body!!}</p>

              <!-- /Blog Content -->

              <!-- Share Button -->
              <div class="d-flex align-items-center">
                <span class="text-muted">Share post: </span>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}" class="btn btn-light btn-icon rounded-circle border ml-2" data-toggle="tooltip" title="Facebook" target="_blank"><i data-feather="facebook" class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/intent/tweet?text=Check Out {{$post->title.' '.str_limit($post->excerpt, 100).' - Click on the link '}}{{url()->current()}}" class="btn btn-light btn-icon rounded-circle border ml-2" data-toggle="tooltip" title="Twitter"><i data-feather="twitter" class="fa fa-twitter" target="_blank"></i></a>
                <a href="https://wa.me/?text=Check Out {{$post->title.' '.str_limit($post->excerpt, 100).' - Click on the link '}}{{url()->current()}}" class="btn btn-light btn-icon rounded-circle border ml-2" data-toggle="tooltip" title="Whatsapp" target="_blank"><i data-feather="whatsapp" class="fa fa-whatsapp"></i></a>
              </div>
              <!-- /Share Button -->

              <hr>

              <!-- Blog Comments -->
              <h3>Comments</h3>
              @auth
              <div class="media my-4">
                <div class="media-body ml-2 ml-sm-3">
                  <form action="{{ route('blog.store') }}" method="POST">
                    {{ csrf_field() }}
                    <textarea name="body" rows="2" placeholder="Leave a comment" class="form-control border autosize"></textarea>
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                  <button type="submit" class="btn btn-sm btn-success border border-top-0 btn-block">Post</button>
                  </form>
                </div>
              </div>
              @endauth

              @if($comments->count() > 0)
              @foreach($comments as $comment)
              <div class="media">
                <a href="javascript:void(0)"><img src="../img/user.svg" alt="User" width="45" height="45" class="rounded-circle"></a>
                <div class="media-body ml-2 ml-sm-3">
                  <div class="d-flex flex-wrap">
                    <a href="javascript:void(0)" class="mr-2">{{$comment->name}}</a>
                    <span class="text-muted">{{$comment->created_at}}</span>
                  </div>
                  <p>{{$comment->body}}</p>
                  <ul class="list-inline">
                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted" title="vote up"><i data-feather="chevron-up"></i></a></li>
                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-muted" title="vote down"><i data-feather="chevron-down"></i></a></li>
                    
                  </ul>
                  <hr>
                </div>
              </div>
              @endforeach
              @else
              <p>No Comment yet!</p>
              @endif
              <!-- /Blog Comments -->

            </div>
          </div>
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

          <div class="card mt-3">
            <div class="card-header bg-white border-bottom bold roboto-condensed">
              <h5 class="bold mb-0">POST <span class="text-primary">TAGS</span></h5>
            </div>
            <div class="card-body">
              <div class="btn-group-scatter">
                @if(!empty($post->meta_keywords))
                  <?php $keywords = explode(',', $post->meta_keywords) ?>
                  @foreach($keywords as $keyword)
                    <a href="javascript:void(0)" class="btn btn-light rounded-pill">{{$keyword}}</a>
                  @endforeach 
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

    <!-- PLUGINS FOR CURRENT PAGE -->
    <script src="../plugins/autosize/autosize.min.js"></script>

    <!-- Mimity JS  -->
    <script src="../dist/js/script.min.js"></script>

    <script>
    $(function () {

      // Autosize textarea
      autosize($('textarea.autosize'))

    })
    </script>
@endsection