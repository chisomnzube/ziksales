<!doctype html>
<html lang="en">

@yield('head')

<body>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar header -->
    <div class="sidebar-header">
      <a href="{{ route('agent.index') }}" class="logo">
        Agent Portal
      </a>
      <a href="#" class="nav-link nav-icon rounded-circle ml-auto" data-toggle="sidebar">
        <i class="material-icons">close</i>
      </a>
    </div>
    <!-- /Sidebar header -->

    <!-- Sidebar body -->
    <div class="sidebar-body">
      <ul class="nav nav-sub">
        <li class="nav-label">DASHBOARD</li>
        <li class="nav-item">
          <a class="nav-link has-icon active" href="{{ route('agent.index') }}"><i data-feather="bar-chart-2"></i>Agent Statistics</a>
        </li>
        <li class="nav-item">
          <a class="nav-link has-icon" href="{{ route('agent.orders') }}"><i data-feather="database"></i>Agent Order(s)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link has-icon" href="{{ route('agent.wallet') }}"><i data-feather="dollar-sign"></i>My Wallet</a>
        </li>
        <li class="nav-item">
          <a class="nav-link has-icon" href="{{ route('agent.bank') }}"><i data-feather="credit-card"></i>My Bank</a>
        </li>
        {{-- <li class="nav-item">
          <a class="nav-link has-icon" href="index2.html"><i data-feather="shopping-bag"></i>Sales Monitoring</a>
        </li>
        <li class="nav-label">APPLICATION</li>


        <li class="nav-item">
          <a class="nav-link has-icon" href="mail.html"><i class="material-icons">mail_outline</i>Mail<span class="badge badge-warning ml-auto badge-pill">2</span></a>
        </li> --}}
        
      </ul>
    </div>
    <!-- /Sidebar body -->

  </div>
  <!-- /Sidebar -->

  <!-- Main -->
  <div class="main">

    <!-- Main header -->
    <div class="main-header">
      <a class="nav-link nav-link-faded rounded-circle nav-icon" href="#" data-toggle="sidebar"><i class="material-icons">menu</i></a>
      
      {{-- <ul class="nav nav-circle ml-auto">
        <li class="nav-item d-md-none"><a class="nav-link nav-link-faded nav-icon" data-toggle="modal" href="#searchModal"><i class="material-icons">search</i></a></li>
        <li class="nav-item d-none d-sm-block"><a class="nav-link nav-link-faded nav-icon" href="" id="refreshPage"><i class="material-icons">refresh</i></a></li>
        <li class="nav-item dropdown nav-notif">
          <a class="nav-link nav-link-faded nav-icon has-badge dropdown-toggle no-caret" href="#" data-toggle="dropdown" data-display="static">
            <i data-feather="bell"></i>
            <span class="badge badge-pill badge-danger">4</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right p-0">
            <div class="card">
              <div class="card-header bg-primary text-white">
                <i data-feather="bell" class="mr-2"></i>4 notifications
              </div>
              <div class="card-body p-0 pt-1">
                <div class="list-group list-group-sm list-group-flush">
                  <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                    <div class="media">
                      <span class="bg-primary text-white btn-icon rounded-circle"><i data-feather="user-plus"></i></span>
                      <div class="media-body ml-2">
                        <p class="mb-0">5 New members joined today</p>
                        <small class="text-secondary">
                          <i class="material-icons icon-inline mr-1">access_time</i>5 minutes ago
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                    <div class="media">
                      <span class="bg-info text-white btn-icon rounded-circle"><i data-feather="message-square"></i></span>
                      <div class="media-body ml-2">
                        <p class="mb-0">2 New comments</p>
                        <small class="text-secondary">
                          <i class="material-icons icon-inline mr-1">access_time</i>10 minutes ago
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                    <div class="media">
                      <span class="bg-success text-white btn-icon rounded-circle"><i data-feather="shopping-bag"></i></span>
                      <div class="media-body ml-2">
                        <p class="mb-0">10+ New orders</p>
                        <small class="text-secondary">
                          <i class="material-icons icon-inline mr-1">access_time</i>15 minutes ago
                        </small>
                      </div>
                    </div>
                  </a>
                  <a href="javascript:void(0)" class="list-group-item list-group-item-action">
                    <div class="media">
                      <span class="bg-warning text-white btn-icon rounded-circle"><i data-feather="user-check"></i></span>
                      <div class="media-body ml-2">
                        <p class="mb-0">Complete your account details</p>
                        <small class="text-secondary">
                          <i class="material-icons icon-inline mr-1">access_time</i>20 minutes ago
                        </small>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="card-footer justify-content-center">
                <a href="javascript:void(0)">View more &rsaquo;</a>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item dropdown ml-2">
          <a class="nav-link nav-link-faded rounded nav-link-img dropdown-toggle px-2" href="#" data-toggle="dropdown" data-display="static">
            <img src="../img/user.svg" alt="Admin" class="rounded-circle mr-2">
            <span class="d-none d-sm-block">Admin</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right pt-0 overflow-hidden">
            <div class="media align-items-center bg-primary text-white px-4 py-3 mb-2">
              <img src="../img/user.svg" alt="Admin" class="rounded-circle" width="50" height="50">
              <div class="media-body ml-2 text-nowrap">
                <h6 class="mb-0">Admin</h6>
                <span class="text-gray-400 font-size-sm">Administrator</span>
              </div>
            </div>
            <a class="dropdown-item has-icon" href="javascript:void(0)"><i class="mr-2" data-feather="user"></i>Profile</a>
            <a class="dropdown-item has-icon" href="javascript:void(0)"><i class="mr-2" data-feather="settings"></i>Settings</a>
            <a class="dropdown-item has-icon text-danger" href="../html/login.html"><i class="mr-2" data-feather="log-out"></i>Sign out</a>
          </div>
        </li>
      </ul> --}}
    </div>
    <!-- /Main header -->

@yield('main-content')

  </div>
  <!-- /Main -->

  <!-- Search Modal -->
  <div class="modal" id="searchModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body p-1 p-lg-3">
          <form>
            <div class="input-group input-group-lg input-group-search">
              <div class="input-group-prepend">
                <button class="btn text-secondary btn-icon btn-lg" type="button" data-dismiss="modal">
                  <i class="fa fa-chevron-left"></i>
                </button>
              </div>
              <input type="text" class="form-control form-control-lg border-0 mx-1 px-0 px-lg-3" placeholder="Search..." autocomplete="off" required autofocus>
              <div class="input-group-append">
                <button class="btn text-secondary btn-icon btn-lg" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /Search Modal -->

  @yield('script')

</body>

</html>