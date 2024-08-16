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
  <link href="https://cdn.datatables.net/1.11.6/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  <style>
    .response-container {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.response-container ul {
    list-style-type: none;
    padding: 0;
}

.response-container li {
    margin-bottom: 5px;
}

.response-container li strong {
    font-weight: bold;
    margin-right: 5px;
}

  /* Custom DataTable CSS */
.dataTables_wrapper {
    padding: 15px;
}

.dataTables_filter label {
    font-weight: bold;
}

.dataTables_length select {
    width: 75px;
}

.dataTables_paginate {
    margin-top: 15px;
}

.table thead th {
    border-top: none;
    border-bottom: 1px solid #dee2e6;
}

.table td {
    vertical-align: middle;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f8f9fa;
}

.table-hover tbody tr:hover {
    background-color: #e2e6ea;
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
      <a class="navbar-brand pt-0" href="{{route('admin_dashboard')}}">
      <img src="/logo.png" class="navbar-brand-img" alt="...">
      </a>
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{route('admin.merchant_payment_request')}}">Merchant Transaction Request</a>
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
    <div class="container">
        <div class="table-responsive">
            <table id="userTable" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Id</th>
                        <th>User Name</th>
                        <th>Request Id</th>
                        <th>Status</th>
                        <th>Proof</th>
                        <th>Detail</th>
                        <th>Action</th> <!-- New column for action buttons -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($merchant_request as $requests)
                    <tr>
                        <td>{{ $requests->id }}</td>
                        <td>{{ $requests->user_id }}</td>
                        <td>{{ $requests->user->name }}</td>
                        <td>{{ $requests->request_id }}</td>
                        <?php
                        $badgeClass = '';
                        switch ($requests->payment_process) {
                            case 'Processing':
                                $badgeClass = 'badge-warning';
                                break;
                            case 'completed':
                                $badgeClass = 'badge-success';
                                break;
                            case 'cancelled':
                                $badgeClass = 'badge-danger';
                                break;
                            default:
                                $badgeClass = 'badge-secondary';
                                break;
                        }
                        ?>
                        <th>
                            <span class="badge <?php echo $badgeClass; ?>">
                                {{ $requests->payment_process }}
                            </span>
                        </th>
                        <td>
                            @if ($requests->merchant_proof)
                            <a href="{{ Storage::url($requests->merchant_proof)}}" target="_blank" class="btn btn-primary">View</a>
                            @else
                            No proof yet
                            @endif
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="sendRequestToController('{{$requests->request_id}}')">Send Request</button>
                        </td>
                        <td>
                            @if ($requests->payment_process != 'Processing')
                                <button type="button" class="btn btn-success" onclick="changeStatus('completed', '{{$requests->request_id}}')" disabled>Completed</button>
                                <button type="button" class="btn btn-danger" onclick="changeStatus('cancelled', '{{$requests->request_id}}')" disabled>Cancelled</button>
                            @else
                                <button type="button" class="btn btn-success" onclick="changeStatus('completed', '{{$requests->request_id}}')">Completed</button>
                                <button type="button" class="btn btn-danger" onclick="changeStatus('cancelled', '{{$requests->request_id}}')">Cancelled</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

          </div>
          </div>
        </div>
      </div>
     <!-- Modal -->
<!-- Offcanvas Left Container -->
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-slideout modal-dialog-start">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="responseModalLabel">Response</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="responseBody">
        <!-- Response content will be populated here -->
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
  <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.6/js/dataTables.bootstrap4.min.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
      $(document).ready(function() {
        $('#userTable').DataTable();
    });
    $(document).ready(function() {
        // Manually handle modal close event
        $('#responseModal').on('click', '.btn-close', function() {
            $('#responseModal').modal('hide');
        });
    });
    function sendRequestToController(requestId) {
        $.ajax({
            url: '{{route('admin_action')}}',
            type: 'POST',
            data: { requestId: requestId ,_token: "{{ csrf_token() }}" },
            success: function(response) {
              console.log(response);
              response.details.created_at = formatDate(response.details.created_at);
                response.details.updated_at = formatDate(response.details.updated_at);
                // Populate the response content in the modal body
                $('#responseBody').html(formatResponse(response));
                // Show the modal
                $('#responseModal').modal('show');
            },
            error: function(xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
                // Populate the error message in the modal body
                $('#responseBody').html('Error: ' + xhr.responseText);
                // Show the modal
                $('#responseModal').modal('show');
            }
        });
    }

    // Function to format the response for display
    function formatResponse(response) {
        var formattedResponse = '<div class="response-container">';
        formattedResponse += '<h4>Response Details:</h4>';
        formattedResponse += '<ul>';
        for (var key in response.details) {
            formattedResponse += '<li><strong>' + key + ':</strong> ' + (key === 'created_at' || key === 'updated_at' ? response.details[key] : response.details[key]) + '</li>';
        }
        formattedResponse += '</ul>';
        formattedResponse += '</div>';
        return formattedResponse;
    }

    // Function to format the date
    function formatDate(dateString) {
        var date = new Date(dateString);
        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();
        var hours = date.getHours();
        var minutes = date.getMinutes();

        // Pad single digit day/month/hours/minutes with leading zero
        day = day < 10 ? '0' + day : day;
        month = month < 10 ? '0' + month : month;
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;

        return day + '-' + month + '-' + year + ' ' + hours + ':' + minutes;
    }

    function changeStatus(status, requestId) {
        // Show SweetAlert confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to change the status to '" + status + "'.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, ' + status
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms, send status to controller function
                sendStatusToController(status, requestId);
            }
        });
    }

    function sendStatusToController(status, requestId) {
        // Send status to controller function using AJAX or form submission
        // Example AJAX request
        $.ajax({
            url: '{{route('status_change')}}',
            type: 'POST',
            data: {
                status: status,
                requestId: requestId,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                // Handle success response
                // You can show another SweetAlert to inform the user about the successful update if needed
                Swal.fire({
                    title: 'Success!',
                    text: 'Status updated to ' + status + '.',
                    icon: 'success'
                }).then(function() {
            // Reload the page after the user closes the SweetAlert dialog
            window.location.reload();
        });
            },
            error: function(xhr, status, error) {
                // Handle error response
                Swal.fire({
                    title: 'Error!',
                    text: 'Failed to update status.',
                    icon: 'error'
                });
            }
        });
    }
</script>

  </script>
</body>

</html>