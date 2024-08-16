<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    my_profile
  </title>
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link href="../assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="#">
      <img src="/logo.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="../assets/img/theme/team-1-800x800.jpg">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6><span>#{{Auth::user()->id}}</span>
            </div>
            <a href="../examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="../index.html">
                <img src="../assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
        @if(Auth::user()->account_type == 'merchant')
        <li class="nav-item active">
          <a class="nav-link active" href="{{ route('dashboard') }}">
            <i class="ni ni-tv-2 text-primary"></i> Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('add_shop') }}">
            <i class="ni ni-shop text-blue"></i>Add Shop
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('currency_detail') }}">
          <i class="ni ni-chart-bar-32 text-blue"></i>Currency Detail
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('merchant.request') }}">
            <i class="ni ni-money-coins text-primary"></i>Transaction Request
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('merchant.payment') }}">
            <i class="ni ni-credit-card text-primary"></i>Payment
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('status') }}">
            <i class="ni ni-diamond text-primary"></i>Payment Status
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('suppot_ticket') }}">
            <i class="ni ni-support-16 text-primary"></i> Support Ticket
          </a>
        </li>
        @endif
      @if(Auth::user()->account_type == 'customer')
      <li class="nav-item active">
          <a class="nav-link active" href="{{ route('customer_dashboard') }}">
            <i class="ni ni-tv-2 text-primary"></i>Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('currency-exchange') }}">
            <i class="ni ni-world-2 text-primary"></i>Currency Exchange
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('currency-exchange.transaction_request') }}">
            <i class="ni ni-money-coins text-primary"></i>Transaction Request Payment
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('fixed_status') }}">
            <i class="ni ni-notification-70 text-primary"></i>Payment status
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('suppot_ticket') }}">
            <i class="ni ni-support-16 text-primary"></i> Support Ticket
          </a>
        </li>
        @endif
        @if(Auth::user()->account_type == 'admin')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin_dashboard') }}">
            <i class="ni ni-single-02 text-primary"></i>Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.list') }}">
            <i class="ni ni-single-02 text-primary"></i> User list
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.merchant_payment_request') }}">
            <i class="ni ni-money-coins text-primary"></i>Merchant request
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.user_payment_request') }}">
            <i class="ni ni-money-coins text-primary"></i>User request
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('show_ticket') }}">
            <i class="ni ni-money-coins text-primary"></i>Support Ticket
          </a>
        </li>
        @endif
      </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{route('profile')}}">User Profile</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name}}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!   <span style ="color:red;">#{{Auth::user()->id}}</span></h6>
              </div>
              <a href="{{route('profile')}}" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{route('logout')}}" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello {{Auth::user()->name}}</h1>
            @if(Auth::user()->account_type == 'merchant')
            <p class="text-white mt-0 mb-5">Welcome to our Merchant Currency Exchange Profile. Here, you can see your profile.</p>
            @elseif(Auth::user()->account_type == 'customer')
            <p class="text-white mt-0 mb-5">Welcome to our Customer Currency Exchange Profile. Here, you can see your profile.</p>
            @else
            <p class="text-white mt-0 mb-5">Welcome to our Admin Currency Exchange Profile. Here, you can see your profile.</p>
            @endif
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading"></span>
                      <span class="description"></span>
                    </div>
                    <div>
                      <span class="heading"></span>
                      <span class="description"></span>
                    </div>
                    <div>
                      <span class="heading"></span>
                      <span class="description"></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center">
                <h3>{{Auth::user()->name}}</h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i> {{Auth::user()->country}}
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i> {{Auth::user()->account_type}}
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i> {{Auth::user()->address}}
                </div>
                <hr class="my-4" />
                <p>Currency Exchange</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="{{ Auth::check() ? Auth::user()->username : old('username') }}" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com" value="{{ Auth::check() ? Auth::user()->email : old('email') }}" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="{{ Auth::check() ? Auth::user()->name : old('name') }}" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Account type</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="{{ Auth::check() ? Auth::user()->account_type : old('account_type') }}" disabled>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Address</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="{{ Auth::check() ? Auth::user()->address : old('address') }}" type="text" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Country" value="{{ Auth::check() ? Auth::user()->country : old('country') }}" disabled>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" placeholder="Postal code" value="{{ Auth::check() ? Auth::user()->postalcode : old('postalcode') }}" disabled>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2024 <a href="" class="font-weight-bold ml-1" target="_blank">CurrencyJunction</a>
            </div>
          </div>
          <div class="col-xl-6">
            <ul class="nav nav-footer justify-content-center justify-content-xl-end">
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">CurrencyJunction</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">About Us</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link" target="_blank">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>