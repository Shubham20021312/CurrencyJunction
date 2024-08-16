<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add-Shop</title>
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link href="../assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
  <style>
        .edit-button {
            position: absolute;
            top: 20px;
            right: 20px;
        }
        .sliding-panel {
            position: fixed;
            top: 0;
            right: -50%;
            width: 50%;
            height: 100%;
            background-color: white;
            box-shadow: -2px 0 5px rgba(0,0,0,0.5);
            transition: right 0.3s ease;
            z-index: 1050;
            padding: 20px;
            overflow-y: auto;
        }
        .sliding-panel.active {
            right: 0;
        }
    </style>
</head>
<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand pt-0" href="{{route('dashboard')}}">
      <img src="/logo.png" class="navbar-brand-img" alt="...">
      </a>
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
              <h6 class="text-overflow m-0">Welcome!</h6>
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
              <a href="{{route('dashboard')}}">
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
        <li class="nav-item active">
          <a class="nav-link active" href="{{ route('dashboard') }}">
            <i class="ni ni-tv-2 text-primary"></i> Dashboard
          </a>
        </li>
        @if(Auth::user()->account_type == 'merchant')
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
        @endif
      @if(Auth::user()->account_type == 'customer')
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
        @endif
        @if(Auth::user()->account_type == 'admin')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.list') }}">
            <i class="ni ni-single-02 text-primary"></i> User list
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.merchant_payment_request') }}">
            <i class="ni ni-money-coins text-primary"></i> Admin Merchant request
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.user_payment_request') }}">
            <i class="ni ni-money-coins text-primary"></i> Admin user request
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('show_ticket') }}">
            <i class="ni ni-money-coins text-primary"></i> Admin Support Ticket
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ route('suppot_ticket') }}">
            <i class="ni ni-support-16 text-primary"></i> Support Ticket
          </a>
        </li>
      </ul>
    </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{route('add_shop')}}">ADD SHOP</a>
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
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
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="{{route('profile')}}" class="dropdown-item">
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
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Request Count</h5>
                      <span class="h2 font-weight-bold mb-0">{{$totalCount}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Buy Amount</h5>
                      <span class="h2 font-weight-bold mb-0">{{$total_amount_buy}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Sell Amount</h5>
                      <span class="h2 font-weight-bold mb-0">{{$total_amount_sell}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Performance</h5>
                      <span class="h2 font-weight-bold mb-0">{{$performance}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col">
          <div class="card shadow border-0">
          <div class="container" style="max-width: 1100px; margin: 0 auto; position: relative;">
          <button class="btn btn-secondary edit-button" id="editButton">Edit</button>
          <form id="addShopForm" action="{{ route('store_shop') }}" method="POST">
            @csrf
              <h3 class="text-muted mb-4" style="margin:20px;">Add Shop</h3>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="name">{{ __('Shop Name') }}</label><span style="color:red;">*</span>
                                <input type="text" id="input-username" class="form-control form-control-alternative @error('name') is-invalid @enderror" name="name" placeholder="Enter the Shop Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="location">{{ __('Location') }}</label><span style="color:red;">*</span>
                                <input type="text" id="input-location" class="form-control form-control-alternative @error('location') is-invalid @enderror" name="location" placeholder="Enter the Shop Location" value="{{ old('location') }}" required>
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="contact">{{ __('Phone Number') }}</label><span style="color:red;">*</span>
                                <input type="nember" id="input-contact" class="form-control form-control-alternative @error('contact') is-invalid @enderror" name="contact" placeholder="Enter the Phone Number" value="{{ old('contact') }}" required>
                                @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="operating_hours">{{ __('Operating Hours(in 24 hours)') }}</label><span style="color:red;">*</span>
                                <input type="text" id="input-operating-hours" class="form-control form-control-alternative @error('operating_hours') is-invalid @enderror" name="operating_hours" placeholder="8:00AM to 8:00PM" value="{{ old('operating_hours') }}" required>
                                @error('operating_hours')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            
                        </div>
                        <div class="col-lg-6">
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                                <label class="form-control-label" for="country">{{ __('Country') }}</label><span style="color:red;">*</span>
                                <input type="text" id="input-country" class="form-control form-control-alternative @error('country') is-invalid @enderror" name="country" placeholder="India" value="{{ old('country') }}" required>
                                @error('counrty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                                <label class="form-control-label" for="additional_services">{{ __('Additional Services') }}</label>
                                <input type="text" id="input-additional-services" class="form-control form-control-alternative @error('additional_services') is-invalid @enderror" name="additional_services" placeholder="" value="{{ old('additional_services') }}" >
                                @error('additional_services')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-lg-6">
                        <div class="form-group">
                                <label class="form-control-label" for="special_instructions">{{ __('Special Instructions/Notes') }}</label>
                                <textarea id="input-special-instructions" class="form-control form-control-alternative @error('special_instructions') is-invalid @enderror" name="special_instructions" placeholder="">{{ old('special_instructions') }}</textarea>
                                @error('special_instructions')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                              <button type="button" id="addShopButton" class="btn btn-primary">{{ __('Add Shop') }}</button>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </form>
          </div>
          <!-- Sliding panel -->
<div class="sliding-panel" id="slidingPanel">
<button type="button" class="close" aria-label="Close" id="closePanel">
        <span aria-hidden="true">&times;</span>
    </button>
    <h3 class="text-muted mb-4" style="margin:20px;">Edit Shop</h3>
    <form id="editShopForm" action="{{ route('update_shop') }}" method="POST">
        @csrf
        <!-- Include the same form fields as above -->
        <div class="pl-lg-4">
            <!-- Form fields replicated -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="edit-name">{{ __('Shop Name') }}</label><span style="color:red;">*</span>
                        <input type="text" id="edit-name" class="form-control form-control-alternative @error('edit-name') is-invalid @enderror" name="name" placeholder="Enter the Shop Name" value="{{ isset($added_shop) ? $added_shop->name : '' }}" required>
                       @error('edit-name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="edit-location">{{ __('Location') }}</label><span style="color:red;">*</span>
                        <input type="text" id="edit-location" class="form-control form-control-alternative @error('edit-location') is-invalid @enderror" name="location" placeholder="Enter the Shop Location" value="{{ isset($added_shop) ? $added_shop->location : '' }}" required>
                        @error('edit-location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <!-- Add more form fields here -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="edit-contact">{{ __('Phone Number') }}</label><span style="color:red;">*</span>
                        <input type="number" id="edit-contact" class="form-control form-control-alternative @error('edit-contact') is-invalid @enderror" name="contact" placeholder="Enter the Phone Number" value="{{ isset($added_shop) ? $added_shop->contact : '' }}" required>
                        @error('edit-contact')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="edit-operating-hours">{{ __('Operating Hours(in 24 hours)') }}</label><span style="color:red;">*</span>
                        <input type="text" id="edit-operating-hours" class="form-control form-control-alternative @error('edit-operating_hours') is-invalid @enderror" name="operating_hours" placeholder="8:00AM to 8:00PM" value="{{ isset($added_shop) ? $added_shop->operating_hours : '' }}" required>
                        @error('edit-operating_hours')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <button type="submit" id="updateShopButton" class="btn btn-primary">{{ __('Update') }}</button>
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
  <!--   Core   -->
  <script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!--   Argon JS   -->
  <script src="../assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
      $(document).ready(function() {
        $('#editButton').click(function() {
            $('#slidingPanel').toggleClass('active');
        });

        $('#closePanel').click(function() {
            $('#slidingPanel').removeClass('active');
        });
    });

      document.addEventListener("DOMContentLoaded", function() {
        // Add event listener to the "Add Shop" button
        document.getElementById("addShopButton").addEventListener("click", function() {
            // Show SweetAlert confirmation dialog
            swal({
                title: "Are you sure?",
                text: "Once added, you won't be able to undo this action!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willAdd) => {
                if (willAdd) {
                    // If user confirms, submit the form via AJAX
                    var formData = new FormData(document.getElementById("addShopForm"));
                    formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token
                    fetch("{{ route('store_shop') }}", {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Show success message
                        swal("Success!", "Shop added successfully!", "success")
                        .then(() => {
                            // Optionally redirect the user to another page
                            window.location.href = "{{ route('add_shop') }}"; // Replace with your desired URL
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Show error message if needed
                        swal("Error!", "An error occurred while adding the shop. Please try again later.", "error");
                    });
                } else {
                    // If user cancels, do nothing
                }
            });
        });
    });
  </script>
</body>

</html>