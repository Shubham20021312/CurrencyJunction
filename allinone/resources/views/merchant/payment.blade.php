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
     .no-data-container {
        text-align: center;
        margin-top: 50px; 
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
        color: #007bff; 
        font-size: 2.5rem; 
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); 
    }

    .heading::after {
        content: '';
        display: block;
        width: 100%;
        height: 4px; 
        background: linear-gradient(to right, transparent, #007bff); 
        position: relative;
        top: -12px; 
        z-index: 1;
        box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.3); 
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
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{route('merchant.request')}}">Transaction Request</a>
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
          </div>
        </form>
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
           @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

      <h1 class="heading">Merchant Payment Details</h1>
        <div class="card-deck">
                <div class="alert alert-info mt-3">
                    <p><strong>Proof Upload Disclaimer:</strong> Please note that the proof documents uploaded here are for verification purposes only. By uploading documents, you agree that you have the necessary permissions to share the content. Uploaded documents may be reviewed by administrators for authenticity and compliance with our policies. We recommend uploading clear and legible documents in supported formats such as images (JPEG, PNG) or PDFs. We reserve the right to reject any uploaded documents that do not meet our requirements.</p>
                </div>
                @if($data == null || count($data) === 0)
                        <div class="no-data-container">
                            <p class="no-data-message">Oops! No request available</p>
                            <i class="fas fa-exclamation-triangle fa-5x no-data-icon"></i>
                        </div>
                        @endif
    @foreach($details as $detail)
    @php
        $request = $data->where('request_id', $detail->request_id)->first();
        $proof_for_request = $proof->where('request_id', $detail->request_id);
        $has_merchant_proof = $proof_for_request->isNotEmpty() && $proof_for_request->whereNotNull('merchant_proof')->isNotEmpty();
        $hide_elements = ($has_merchant_proof) ? true : false;
    @endphp

    <div class="container mb-3">
        <div class="card">
            <div class="card-body">
                @if($hide_elements)
                    <div class="badge badge-info" style="position: absolute; top: 0; left: 0;">
                        Under Process
                    </div>
                @endif
                <h5 class="card-text">Request Id: {{ $detail->request_id }}</h5>
                <h5 class="card-title">Payment Amount:{{ $request->amount }}</h5>

                @if (!$hide_elements)
                    @if ($detail->bank_name && $detail->account_number)
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bankDetailModal{{ $detail->request_id }}">
                            <i class="fas fa-university"></i> View Bank Details
                        </button>
                    @endif
                    
                    @if ($detail->qr_code)
                        <!-- Button to view QR code -->
                        <a href="{{ Storage::url($detail->qr_code) }}" target="_blank" class="btn btn-warning">
                            <i class="fas fa-qrcode"></i> View QR Code
                        </a>
                    @endif

                    <div class="form-group mt-3">
                        <form action="{{ route('merchant.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="request_id" value="{{ $detail->request_id }}">
                            <label for="proof{{ $detail->request_id }}">Upload Proof:</label>
                            <input type="file" class="form-control-file" id="proof{{ $detail->request_id }}" name="proof[]" accept="image/*,application/pdf">
                            <button type="submit" class="btn btn-primary" style="margin-top:5px;">Upload</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>

        <!-- Bank detail modal -->
        <div class="modal fade" id="bankDetailModal{{ $detail->request_id }}" tabindex="-1" role="dialog" aria-labelledby="bankDetailModal{{ $detail->request_id }}Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="bankDetailModal{{ $detail->request_id }}Label">Bank Details for Request ID: {{ $detail->request_id }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="text-muted">Bank Name</h6>
                                <p>{{ $detail->bank_name }}</p>
                                <h6 class="text-muted">Account Holder Name</h6>
                                <p>{{ $detail->account_holder_name }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="text-muted">Account Number</h6>
                                <p>{{ $detail->account_number }}</p>
                                <h6 class="text-muted">IFSC Code</h6>
                                <p>{{ $detail->ifsc_code }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

        </div>
    </div>
    </div>

    </div>
          </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
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
      $(document).ready(function() {
        $('#currencyTable').DataTable({
            "searching": false,
            "language": {
                "emptyTable": "No request"
            }
    });
});
function approve(itemId) {
    // Show the approval modal
    $('#approvalModal').modal('show');
    // Set the value of the hidden input field
    $('#itemId').val(itemId);

    $(document).ready(function() {
    $('#approvalForm').submit(function(e) {
        // Prevent the default form submission
        e.preventDefault(); 
        
        // Create FormData object to handle form data including files
        var formData = new FormData();

        // Retrieve form field values
        var bankName = $('#bankName').val();
        var accountHolderName = $('#accountHolderName').val();
        var accountNumber = $('#accountNumber').val();
        var ifscCode = $('#ifscCode').val();
        var remarks = $('#remarks').val();

        // Retrieve file data
        var qrCodeFile = $('#qrCode').prop('files')[0];
        // Append form field values to FormData
        formData.append('bankName', bankName);
        formData.append('accountHolderName', accountHolderName);
        formData.append('accountNumber', accountNumber);
        formData.append('ifscCode', ifscCode);
        formData.append('remarks', remarks);
        // Append file data to FormData
        formData.append('qrCode', qrCodeFile);

        // Append itemId to FormData
        formData.append('itemId', itemId);

        // Append CSRF token to FormData
        formData.append('_token', '{{ csrf_token() }}');

        // Validate the form data
        var bankDetailsFilled = bankName && accountHolderName && accountNumber && ifscCode;
        var qrCodeUploaded = qrCodeFile ? true : false;

        if (!bankDetailsFilled && !qrCodeUploaded) {
            alert('Please enter bank details or upload a QR code image.');
            return; 
        }
        // If validation passes, submit the form via AJAX
        $.ajax({
            url: '{{ route('merchant.bankdetails') }}',
            type: 'POST',
            data: formData,
            processData: false,  
            contentType: false, 
            success: function(response) {
                console.log('Form submitted successfully:', response);
                $('#approvalModal').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Form Submitted Successfully!',
                    text: 'Your data has been submitted successfully.',
                    confirmButtonText: 'OK'
                });
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'There was an error submitting the form. Please try again later.',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
}


function reject(itemId) {
    Swal.fire({
        title: 'Are you sure you want to reject this item?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, reject it!',
        html: '<input id="remark" class="swal2-input" placeholder="Enter your remark" type="text">',
        preConfirm: () => {
            const remark = document.getElementById('remark').value;
            if (!remark) {
                Swal.showValidationMessage('Remark is required');
            }
            return remark;
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const remark = result.value;
            // Make AJAX request using Laravel route helper
            $.ajax({
                url: '{{ route('merchant.request.delete') }}',
                type: 'POST',
                data: {
                    itemId: itemId,
                    remark: remark,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Handle success response
                    $('tr[data-item-id="' + itemId + '"]').remove();
                    Swal.fire(
                        'Rejected!',
                        'The item has been rejected with remark: ' + remark,
                        'success'
                    );
                },
                error: function(xhr, status, error) {
                    // Handle error
                    Swal.fire(
                        'Error!',
                        'There was an error rejecting the item. Please try again later.',
                        'error'
                    );
                }
            });
        }
    });
}







  </script>
</body>

</html>