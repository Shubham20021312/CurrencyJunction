<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Request</title>
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link href="../assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <style>
    .no-data-container {
    text-align: center;
    margin-top: 50px; /* Adjust margin as needed */
    }

    .no-data-message {
        font-size: 24px;
        color: #333; /* Adjust color as needed */
    }

    .no-data-icon {
        color: #f00; /* Adjust color as needed */
        margin-top: 20px; /* Adjust margin as needed */
    }

     .heading {
        text-align: center;
        margin-top: 50px;
        margin-bottom: 30px;
        color: #007bff; /* Blue color */
        font-size: 2.5rem; /* Adjust the font size */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Add text shadow */
    }

    .heading::after {
        content: '';
        display: block;
        width: 100%;
        height: 4px; /* Adjust the height of the shine */
        background: linear-gradient(to right, transparent, #007bff); /* Gradient shine effect */
        position: relative;
        top: -12px; /* Adjust the position of the shine */
        z-index: 1;
        box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.3); /* Add box shadow to the shine */
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
            <i class="ni ni-notification-70 text-primary"></i>Payment Status
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('Add_account') }}">
            <i class="ni ni-collection text-primary"></i> Add Bank Account
          </a>
        </li>
        @endif
        @if(Auth::user()->account_type == 'admin')
        <li class="nav-item">
          <a class="nav-link" href="{{ route('admin_dashboard') }}">
            <i class="ni ni-single-02 text-primary"></i> Admin Dashboard
          </a>
        </li>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{route('currency-exchange.transaction_request')}}">Transaction Request Payment</a>
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
                <div class="card-body">
                    <div class="container">
                        <h1 class="heading">Payment Details</h1>
                        <div class="alert alert-info mt-3">
                            <p><strong>Proof Upload Disclaimer:</strong> Please note that the proof documents uploaded here are for verification purposes only. By uploading documents, you agree that you have the necessary permissions to share the content. Uploaded documents may be reviewed by administrators for authenticity and compliance with our policies. We recommend uploading clear and legible documents in supported formats such as images (JPEG, PNG) or PDFs. We reserve the right to reject any uploaded documents that do not meet our requirements.</p>
                        </div>
                        @if($data == null || count($data) === 0)
                        <div class="no-data-container">
                            <p class="no-data-message">Oops! No request available</p>
                            <i class="fas fa-exclamation-triangle fa-5x no-data-icon"></i>
                        </div>
                        @endif
                        @foreach($data as $detail)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <h5 class="card-text">Request Id: {{ $detail->request_id }}</h5>
                                    <h5 class="card-title">Payment Amount: {{ $detail->amount }}</h5>
                                  @if($detail->status != null)
                                    @if($detail->proof == null)
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bankDetailModal12345">
                                        <i class="fas fa-university"></i> View Bank Details
                                    </button>
                                        <a href="" target="_blank" class="btn btn-warning">
                                            <i class="fas fa-qrcode"></i> View QR Code
                                        </a>
                                        <div class="form-group mt-3">
                                            <label for="proof{{ $detail->request_id }}">Upload Proof:</label>
                                            <input type="file" class="form-control-file" id="proof{{ $detail->request_id }}" name="proof[]" accept="image/*,application/pdf" required>
                                            <button type="button" class="btn btn-primary" style="margin-top:5px;" onclick="uploadProof('{{ $detail->request_id }}')">Upload</button>
                                        </div>
                                    @else
                                        <span class="badge badge-pill badge-info">{{$detail->after_proof}}</span>
                                    @endif
                                    @else
                                    <span class="badge badge-pill badge-info">Waiting for merchant approval</span>
                                    @endif
                                </div>
                            </div>
                            <div class="modal fade" id="bankDetailModal12345" tabindex="-1" role="dialog" aria-labelledby="bankDetailModalLabel12345" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="bankDetailModalLabel12345">Bank Details</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <!-- Bank details go here -->
                                          <p>Bank Name: ABC Bank</p>
                                          <p>Account Number: 1234567890</p>
                                          <p>IFSC Code: ABCD0123456</p>
                                          <p>Branch: XYZ Branch</p>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                            <div class="modal fade" id="qrCodeModal{{ $detail->request_id }}" tabindex="-1" role="dialog" aria-labelledby="qrCodeModal{{ $detail->request_id }}Label" aria-hidden="true">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
  <!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
      $(document).ready(function() {
        $('#currencyTable').DataTable({
            "searching": false,
            "language": {
                "emptyTable": "No request"
            }
    });
});

function uploadProof(requestId) {
        // Get the file input element
        var fileInput = $('#proof' + requestId)[0];
        // Get the file from the input element
        var file = fileInput.files[0];

        // Create FormData object
        var formData = new FormData();
        formData.append('proof', file);
        formData.append('request_id', requestId);
        formData.append('_token', "{{ csrf_token() }}");

        // Get CSRF token from the page
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Send AJAX request
        $.ajax({
    url: '{{ route("transaction_request") }}',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
        if (response.success) {
            toastr.success('Proof uploaded successfully', 'Success', {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-bottom-right',
                timeOut: 3000, 
                extendedTimeOut: 1000,
                onHidden: function () {
                    location.reload(); 
                }
            });
        } else {
            toastr.error('An error occurred while uploading proof', 'Error', {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-bottom-right',
                timeOut: 5000, 
                extendedTimeOut: 1000,
                onHidden: function () {
                    location.reload(); 
                }
            });
        }
    },
    error: function (xhr, status, error) {
        toastr.error('An error occurred while uploading proof');
    }
});

    }
  </script>
</body>

</html>