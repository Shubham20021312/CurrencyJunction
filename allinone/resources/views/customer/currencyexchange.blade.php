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
  <style>
    .response-content {
    background-color: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 20px;
}

.response-content p {
    margin: 0 0 10px;
}

.response-content strong {
    font-weight: bold;
}

.request-btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.request-btn:hover {
    background-color: #0056b3;
}

    .offcanvas {
    position: fixed;
    left: -300px; /* Initially hide offcanvas menu */
    top: 0;
    bottom: 0;
    width: 300px;
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    transition: left 0.3s ease;
    z-index: 1000;
}

.offcanvas-content {
    padding: 20px;
}

.offcanvas.open {
    left: 0;
}

    /* Custom styling for the table */
.styled-table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.styled-table th,
.styled-table td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #f0f0f0;
}

.styled-table th {
    background: linear-gradient(180deg, #f9f9f9 0%, #e6e6e6 100%);
    color: #333;
    font-weight: bold;
}

.styled-table tbody tr:nth-child(even) {
    background-color: #fafafa;
}

.styled-table tbody tr:hover {
    background-color: #f0f0f0;
}

.styled-table tbody td {
    color: #444;
}

.styled-table tbody td:first-child,
.styled-table tbody th:first-child {
    border-left: none;
}

.styled-table tbody td:last-child,
.styled-table tbody th:last-child {
    border-right: none;
}

/* Custom styling for the table */
.styled-table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    border: 1px solid #ddd;
}

.styled-table th,
.styled-table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.styled-table th {
    background-color: #f2f2f2;
    font-weight: bold;
    color: #333;
}

.styled-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.styled-table tbody tr:hover {
    background-color: #ddd;
}

.styled-table tbody td {
    color: #555;
}

.styled-table tbody td:first-child,
.styled-table tbody th:first-child {
    border-left: 1px solid #ddd;
}

.styled-table tbody td:last-child,
.styled-table tbody th:last-child {
    border-right: 1px solid #ddd;
}

.exchange-input {
    padding: 10px;
    margin: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.exchange-button {
    padding: 10px 20px;
    margin: 5px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.exchange-button:hover {
    background-color: #45a049;
}

   <style>
   .swal2-container {
    z-index: 999999 !important;
    }

.modal {
    display: none; 
    position: fixed; 
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgba(0,0,0,0.4); 
}

.modal-content {
    background-color: #fff; 
    margin: 10% auto; 
    padding: 30px;
    border-radius: 10px; 
    position: relative; 
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); 
    max-width: 400px; 
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    color: #aaa;
    font-size: 20px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Modal title styles */
.modal-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.btn-success {
    background-color: #28a745;
    color: #fff;
    border-color: #28a745;
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
}

.btn-success:hover {
    background-color: #218838;
    border-color: #1e7e34;
}
    #currencyInput {
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group input[type="text"] {
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 8px 12px;
        width: 100%;
        margin-top: 5px;
    }
</style>

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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{route('currency-exchange')}}">CURRENCY EXCHANGE</a>
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
           <div>
           <div class="card-body">
           <div class="text-center">
            <!-- Button for Fixed Exchange Rate -->
            <button type="button" class="btn btn-primary" onclick="toggleInput('fixed')">
                <i class="fas fa-lock"></i> Fixed Exchange Rate
            </button>
            <!-- Button for Floating Exchange Rate with a different icon -->
            <button type="button" class="btn btn-primary" onclick="toggleExchangeFields()">
                <i class="fas fa-shipping-fast"></i> Floating Exchange Rate
            </button>
        </div>
        <div id="exchangeFields" style="display: none;" style="margin-left:90px;">
          <input type="text" id="currencyFrom" class="exchange-input" placeholder="Currency From" style="width:40%;">
          <input type="text" id="currencyTo" class="exchange-input" placeholder="Currency To" style="width:40%;">
          <button type="button" class="exchange-button" onclick="calculateExchangeRate()" style="width:10%;">Go</button>
      </div>
      <div id="offcanvas" class="offcanvas">
    <div id="responseContainer" class="offcanvas-content"></div>
</div>

      <div id="resultContainer" style="display: none;">
    <table id="shopTable" class="styled-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Shop Name</th>
                <th>Location</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

        <!-- Input fields for currency exchange -->
        <div id="currencyInput" class="text-center mt-3" style="display: none;">
            <div class="form-group">
                <label for="fromCurrency"><i class="fas fa-exchange-alt"></i> From Currency:</label>
                <input type="text" class="form-control" id="fromCurrency" placeholder="From Currency">
            </div>
            <div class="form-group">
                <label for="toCurrency"><i class="fas fa-exchange-alt"></i> To Currency:</label>
                <input type="text" class="form-control" id="toCurrency" placeholder="To Currency">
            </div>
            <div class="form-group">
                <label for="amount"><i class="fas fa-money-bill-wave"></i> Amount:</label>
                <input type="text" class="form-control" id="amount" placeholder="Amount">
            </div>
            <!-- Submit button -->
            <button type="button" class="btn btn-primary" onclick="submitForm()">Submit</button>
        </div>
    </div>

    </div>
          </div>
          </div>
        </div>
      </div>
     <!-- Modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p id="rate"></p>
        <p id="exchangeRate"></p>
        <p id="fee"></p>
        <button type="button" class="btn btn-success" onclick="approve()">Approve</button>
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
  <!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
      function toggleInput(rate) {
            var inputDiv = document.getElementById('currencyInput');
            if (rate === 'fixed') {
                if (inputDiv.style.display === 'block') {
                    inputDiv.style.display = 'none';
                } else {
                    inputDiv.style.display = 'block';
                }
            } else {
                inputDiv.style.display = 'none';
            }
        }

function submitForm() {
    // Get form data
    var fromCurrency = document.getElementById('fromCurrency').value;
    var toCurrency = document.getElementById('toCurrency').value;
    var amount = document.getElementById('amount').value;

    // Create data object
    var data = {
            fromCurrency: fromCurrency,
            toCurrency: toCurrency,
            amount: amount,
            _token: "{{ csrf_token() }}",
        };


    // Send data to server using AJAX
    $.ajax({
        type: 'POST',
        url: '{{ route('currency-exchange.data') }}',
        data: data,
        success: function(response) {
            // Handle success response
            console.log('Data sent successfully');
            // Show popup modal with exchange rate and options for approval
            showPopup(response.exchange_rate,response.exchanged_amount,response.fee);
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error('Error:', error);
        }
    });
}

function showPopup(rate, exchangeRate, fee) {
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the elements for rate, exchange rate, and fee display
    var rateElement = document.getElementById("rate");
    rateElement.textContent = "Rate: " + rate;

    var exchangeRateElement = document.getElementById("exchangeRate");
    exchangeRateElement.textContent = "Exchange Rate: " + exchangeRate;

    var feeElement = document.getElementById("fee");
    feeElement.textContent = "Fee: " + fee;

    // Display the modal
    modal.style.display = "block";

    // Close the modal when the close button is clicked
    document.getElementsByClassName("close")[0].onclick = function() {
        modal.style.display = "none";
    };
}

// Close the modal when the user clicks outside of it
window.onclick = function(event) {
    var modal = document.getElementById("myModal");
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function approve() {
    // Get form data
    var fromCurrency = document.getElementById('fromCurrency').value;
    var toCurrency = document.getElementById('toCurrency').value;
    var amount = document.getElementById('amount').value;

    // Create data object
    var data = {
        fromCurrency: fromCurrency,
        toCurrency: toCurrency,
        amount: amount,
        approval: true,
        _token: "{{ csrf_token() }}"
    };

    // Send data to server using AJAX
    $.ajax({
        type: 'POST',
        url: '{{ route('currency-exchange.data') }}',
        data: data,
        success: function(response) {
            Swal.fire({
                icon: 'success',
                title: 'Transaction Approved',
                text: 'Your transaction request has been approved. Please check your transaction request section',
                confirmButtonText: 'OK'
            }).then((result) => {
                var modal = document.getElementById("myModal");
                modal.style.display = "none";
                window.location.reload();
            });
        },
        error: function(xhr, status, error) {
            // Handle error
            console.error('Error:', error);
            // Display SweetAlert error message
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while approving the transaction.'
            });
        }
    });
}

function toggleExchangeFields() {
    var exchangeFields = document.getElementById('exchangeFields');
    if (exchangeFields.style.display === 'none') {
        exchangeFields.style.display = 'block';
    } else {
        exchangeFields.style.display = 'none';
    }
}

function calculateExchangeRate() {
    var currencyFrom = $('#currencyFrom').val();
    var currencyTo = $('#currencyTo').val();
    var data = {
        currencyFrom: currencyFrom,
        currencyTo: currencyTo,
        _token: "{{ csrf_token() }}" 
    };
    $.ajax({
        type: "POST",
        url: "{{ route('floating_exchange') }}",
        data: JSON.stringify(data),
        contentType: "application/json",
        success: function(response) {
            // Display the response in the UI
            showResponse(response);
            $('#resultContainer').show(); // Show the result container
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

function showResponse(response) {
    var shopTable = $('#shopTable tbody');
    shopTable.empty(); // Clear previous results

    // Iterate through the response and append rows to the table
    response.forEach(function(item) {
        var rowHtml = '<tr>' +
            '<td>' + item.id + '</td>' +
            '<td>' + item.name + '</td>' +
            '<td>' + item.location + '</td>' +
            '<td><button class="detail-btn btn btn-info" data-user-id="' + item.user_id + '">Details</button></td>' +
            '</tr>';
        shopTable.append(rowHtml);
    });

    // Add event listener for the detail buttons
    $('.detail-btn').click(function() {
    var userId = $(this).data('user-id');
    sendUserIdToController(userId);
    $('#offcanvas').toggleClass('open'); // Toggle offcanvas menu

});
}

function sendUserIdToController(userId) {
    var currencyTo = $('#currencyTo').val();
    $.ajax({
        type: "POST",
        url: "{{ route('floating_exchange_user_id') }}",
        data: { user_id: userId, currencyTo: currencyTo, _token: "{{ csrf_token() }}" },
        success: function(response) {
            // Handle success response
            displayResponse(response);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

function displayResponse(response) {
    var html = '<div class="response-content">';
    html += '<p><strong>Buying Rate:</strong> ' + response.buying_rate + '</p>';
    html += '<p><strong>Currency Code:</strong> ' + response.currency_code + '</p>';
    html += '<p><strong>Currency Name:</strong> ' + response.currency_name + '</p>';
    html += '<p><strong>Fee:</strong> ' + response.fee + '</p>';
    html += '<p><strong>Maximum Transaction:</strong> ' + response.maximum_transaction + '</p>';
    html += '<p><strong>Minimum Transaction:</strong> ' + response.minimum_transaction + '</p>';
    html += '<p><strong>Selling Rate:</strong> ' + response.selling_rate + '</p>';
    html += '<button class="request-btn">Request</button>';
    html += '<div class="amount-input" style="display: none;">';
    html += '<input type="number" class="form-control" id="amountInput" placeholder="Enter amount" style="margin-top:5px;">';
    html += '<select id="optionSelect" class="form-control" style="margin-top:5px;">';
    html += '<option value="buy">Buy</option>';
    html += '<option value="sell">Sell</option>';
    html += '</select>';
    html += '<button class="submit-btn btn btn-primary" style ="width:40%; margin-top:5px;">Submit</button>';
    html += '</div>';
    html += '</div>';

    $('#responseContainer').html(html);
    $('.request-btn').click(function() {
        $('.amount-input').toggle(); // Show/hide amount input field
    });
    // Add click event handler for the Submit button
    $('.submit-btn').click(function() {
        var amount = $('#amountInput').val();
        var option = $('#optionSelect').val();
        var currencyCode = response.currency_code;
        var userId = response.user_id;
        sendRequest(amount, option, currencyCode, userId);
    });
}

function sendRequest(amount, option, currencyCode, userId) {
    $.ajax({
        type: "POST",
        url: "{{ route('floating_exchange_request') }}",
        data: {
            amount: amount,
            option: option,
            currencyCode: currencyCode,
            userId: userId,
            _token: "{{ csrf_token() }}"
        },
        success: function(response) {
            // Handle success response
            console.log(response);
            // Show SweetAlert notification
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Request submitted successfully.',
                showConfirmButton: false,
                timer: 2000
            }).then(function() {
                // Reload the page after 1.5 seconds
                location.reload();
            });
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}

  </script>
</body>

</html>