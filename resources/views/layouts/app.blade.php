<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <head>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130773828-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());
            
              gtag('config', 'UA-130773828-1');
            </script>
            {{--<link rel="shortcut icon" type="image/icon" href="{{ asset('img/blog/ziksaleslogo.png') }}">--}}
            <meta name="theme-color" content="#ff6600">
            <link rel='shortcut icon' type='image/ico' href='{{ asset('img/blog/ziksaleslogo.ico') }}' /> 
            <script src="//code.jivosite.com/widget/ZJGZ5FlY12" async></script>
   
  @yield('head')
  <body>

    <!--Header -->
    <header class="navbar navbar-expand navbar-light fixed-top">

      <!-- Toggle Menu -->
      <span class="toggle-menu"><i class="fa fa-bars fa-lg"></i></span>

      <!-- Logo -->
      <a class="navbar-brand" href="{{ route('landing-page') }}"><span><img style="width:45px; height:35px;" src="{{ asset('img/blog/ziksaleslogo.png') }}" alt="Ziksales Logo"></span>ZikSales</a>

      <!-- Search Form -->
      <form action="{{ route('search') }}" method="GET" class="form-inline form-search d-none d-sm-inline">
        <div class="input-group">
          <button class="btn btn-light btn-search-back" type="button"><i class="fa fa-arrow-left"></i></button>
          <input type="text" name="item" value="{{ request()->input('item')}}" class="form-control" placeholder="Search ..." aria-label="Search ...">
          <button class="btn btn-light" type="submit"><i class="fa fa-search"></i></button>
        </div>
        {{ csrf_field() }}
      </form>
      <!-- /Search Form -->

      <!-- navbar-nav -->
      <ul class="navbar-nav ml-auto">
        {{--
        <!-- Currency Dropdown -->
        <li class="nav-item dropdown d-none d-md-flex">
          <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownCurrency" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            USD <i class="fa fa-caret-down fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownCurrency">
            <button class="dropdown-item" type="button">USD</button>
            <button class="dropdown-item" type="button">EUR</button>
          </div>
        </li>
        <!-- /Currency Dropdown -->

        <!-- Language Dropdown -->
        <li class="nav-item dropdown d-none d-md-flex">
          <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            English <i class="fa fa-caret-down fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownLanguage">
            <button class="dropdown-item" type="button">English</button>
            <button class="dropdown-item" type="button">Spain</button>
          </div>
        </li>
        <!-- /Language Dropdown -->
        --}}
        <!-- Search Toggle -->
        <li class="nav-item d-sm-none">
          <a href="#" class="nav-link" id="search-toggle"><i class="fa fa-search fa-lg"></i></a>
        </li>
        <!-- /Search Toggle -->

        <!-- Shopping Cart Toggle -->
        <li class="nav-item dropdown ml-1 ml-sm-3">
          <a href="#" class="nav-link" data-toggle="modal" data-target="#cartModal">
            <i class="fa fa-shopping-cart fa-lg"></i>
            @if(Cart::instance('default')->count() > 0)
              <span class="badge badge-pink badge-count">{{ Cart::instance('default')->count() }}</span>
            @endif  
          </a>
        </li>
        <!-- /Shopping Cart Toggle -->

        <!-- Notification Dropdown -->
       {{-- <li class="nav-item dropdown ml-1 ml-sm-3">
          <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownNotif" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell fa-lg"></i>
            <span class="badge badge-info badge-count">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownNotif">
            <a class="dropdown-item has-icon" href="#"><i class="fa fa-envelope"></i> 1 New Message</a>
            <a class="dropdown-item has-icon" href="#"><i class="fa fa-comment"></i> 2 New Comments</a>
          </div>
        </li>--}}
        <!-- /Notification Dropdown -->

        <!-- Login Button -->
        <!-- <li class="nav-item ml-4">
          <a href="login.html" class="nav-link btn btn-light btn-sm"><i class="fa fa-sign-in"></i> Login</a>
        </li> -->
        <!-- /Login Button -->

      </ul>
      <!-- /navbar-nav -->

      <!-- User Dropdown -->
      <div class="dropdown dropdown-user">
        <a class="dropdown-toggle" href="#" role="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{ asset('../img/user.png') }}" alt="User">
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item has-icon" href="{{ route('seller.register') }}"><i class="fa fa-tint fa-fw"></i> Seller's Portal</a>
          <a class="dropdown-item has-icon" href="{{ route('agent.index') }}"><i class="fa fa-money fa-fw"></i> Agent's Portal</a>
          @guest
          <a class="dropdown-item has-icon" href="{{ route('login') }}"><i class="fa fa-sign-in fa-fw"></i> Login</a>
          <a class="dropdown-item has-icon" href="{{ route('register') }}"><i class="fa fa-sign-out fa-fw"></i> Register</a>
          @else
          <a class="dropdown-item has-icon" href="{{ route('users.edit') }}"><i class="fa fa-user fa-fw"></i> My Profile</a>
          <a class="dropdown-item has-icon" href="{{ route('orders.index') }}"><i class="fa fa-shopping-bag fa-fw"></i> My Orders</a>
          <a class="dropdown-item has-icon has-badge" href="{{ route('wishlist.index') }}"><i class="fa fa-heart fa-fw"></i> Wishlist <span class="badge badge-secondary">{{Cart::instance('wishlist')->count()}}</span></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item has-icon " href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Sign out</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          @endguest
        </div>
      </div>
      <!-- /User Dropdown -->

    </header>
    <!-- /Header -->

    <div class="container-fluid" id="main-container">
      <div class="row">

        <!-- Sidebar -->
        <div class="col" id="main-sidebar">
          <div class="list-group list-group-flush">
            <a href="{{ route('landing-page') }}" class="list-group-item list-group-item-action active"><i class="fa fa-home fa-lg fa-fw"></i> Home</a>
            
            <a class="list-group-item list-group-item-action"><i class="fa fa-th fa-lg fa-fw"></i> Categories</a>

            {{--@foreach($categories as $category)
              <a href="{{ route('shop.index', ['category' => $category->slug]) }}" class="list-group-item list-group-item-action sub {{ request()->category == $category->slug ? 'active' : ''}}">{{$category->name}}</a>
            @endforeach--}}

            <div class="panel-group" id="accordion">

              <?php $i = 0; ?>
              @foreach($categories as $category)
              <?php $i++;?>
              <div class="panel panel-default">
                    <a class="list-group-item list-group-item-action {{ request()->category == $category->slug ? 'active' : ''}}" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$i}}">
                    <i class="fa fa-{{$category->icon}} fa-lg"></i> &nbsp;{{$category->name}}</a>                   

                    @foreach($allSubCategories as $allSubCategory)
                      @if($category->id == $allSubCategory->category_id)
                        <a id="collapse{{$i}}" href="{{ route('shop.index', ['subCategory' => $allSubCategory->name]) }}" class="list-group-item list-group-item-action sub panel-collapse collapse in "><i class="fa fa-certificate "></i> &nbsp;{{$allSubCategory->name}}</a>
                      @endif
                    @endforeach
              </div>
               @endforeach

            </div> 

            

            {{--<div class="collapse" id="categoriesx">
              <a href="grid.html" class="list-group-item list-group-item-action sub">iphone</a>
              <a href="grid.html" class="list-group-item list-group-item-action sub">samsung Electronics</a>
              <a href="grid.html" class="list-group-item list-group-item-action sub">lg Supplies</a>
              <a href="grid.html" class="list-group-item list-group-item-action sub">huwei Instruments</a>
            </div>
            <a href="#categoriesx" class="list-group-item list-group-item-action sub toggle" data-toggle="collapse" aria-expanded="false">MORExx &#9662;</a>--}}


            <a href="{{ route('about') }}" class="list-group-item list-group-item-action"><i class="fa fa-list fa-lg fa-fw"></i> Other Pages</a>
            <a href="{{ route('seller.register') }}" class="list-group-item list-group-item-action sub"><i class="fa fa-tint fa-lg fa-fw"></i> Seller's Portal</a>
            <a href="{{ route('agent.index') }}" class="list-group-item list-group-item-action sub"><i class="fa fa-money fa-lg fa-fw"></i> Agent's Portal</a>
            <a href="{{ route('about') }}" class="list-group-item list-group-item-action sub"><i class="fa fa-list-alt fa-lg"></i> &nbsp;About Us</a>
            <a href="{{ route('blog.index') }}" class="list-group-item list-group-item-action sub"><i class="fa fa-file-text fa-lg"></i> &nbsp;Blog</a>
            @if(auth()->user())
            <a href="{{ route('cart.index') }}" class="list-group-item list-group-item-action sub"><i class="fa fa-shopping-cart fa-lg"></i> &nbsp;Cart</a>
            @if(Cart::instance('default')->count() > 1)
            <a href="{{ route('checkout.index') }}" class="list-group-item list-group-item-action sub"><i class="fa fa-certificate "></i> &nbsp;Checkout</a>
            @endif
            @if(Cart::instance('wishlist')->count() > 1)
            <a href="{{ route('wishlist.index') }}" class="list-group-item list-group-item-action sub"><i class="fa fa-certificate "></i> &nbsp;My Wishlist</a>
            @endif
            @if(Cart::instance('compare')->count() > 1)
            <a href="{{ route('compare.index') }}" class="list-group-item list-group-item-action sub"><i class="fa fa-certificate "></i> &nbsp;Compare</a>
            @endif
            @endif
            <a href="{{ route('contact') }}" class="list-group-item list-group-item-action sub"><i class="fa fa-comment fa-lg"></i> &nbsp;Contact Us</a>
            <a href="{{ route('faq') }}" class="list-group-item list-group-item-action sub"><i class="fa fa-question-circle fa-lg"></i> &nbsp;FAQ</a>
            

          </div>
          <div class="small p-3">Copyright © 2019 Ziksales All right reserved</div>
        </div>
        <!-- /Sidebar -->

        @yield('main-content')

          

        </div>

      </div>
    </div>

    <!-- Modal Cart -->
    <div class="modal fade modal-cart" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="cartModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="cartModalLabel">You have {{Cart::instance('default')->count()}} item(s) in your cart</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            @if(Cart::instance('default')->count() > 0)

            @foreach(Cart::content() as $item)
            <div class="media">
              <a href="{{ route('shop.show', $item->model->slug) }}"><img src="{{ productImage($item->model->image) }}" width="50" height="50" alt="{{ $item->model->name}}"></a>
              <div class="media-body">
                <a href="{{ route('shop.show', $item->model->slug) }}" title="{{ $item->model->name}}">{{ $item->model->name}}</a>
                
                <span class="price">&#8358;{{ number_format( totalcash($item->model->price, $item->model->profit) )}}</span>
                
                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button type="submit" class="close" aria-label="Close"><i class="fa fa-trash-o"></i></button>
                  </form>
              </div>
            </div>
            @endforeach

            @endif
            
          </div>
          <div class="modal-footer">
            <div class="box-total">
              <h4>Total: <span class="price">&#8358;{{ session()->has('coupon') ? number_format(session()->get('newTotal')) : number_format(Cart::total()) }}</span></h4>
              <a href="{{ route('cart.index') }}" class="btn" style="background-color: #ff751a; color: white;">VIEW CART</a>
            </div>
          </div>
        </div>
      </div>
    </div>


    @yield('required-js')

  </body>
</html>