<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CurrencyJunction</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700&display=swap" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/country-flag-icons/3.0.0/css/country-flag-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 px-4 px-lg-5">
        <a href="index.html" class="navbar-brand d-flex align-items-center">
            <h2 class="m-0 text-primary"><img class="img-fluid me-2" src="img/icon-1.png" alt="" style="width: 45px;">CurrencyJunction</h2>
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-4 py-lg-0">
                <a href="{{ route('home')}}" class="nav-item nav-link active">Home</a>
                <a href="{{ route('aboutus')}}" class="nav-item nav-link">About</a>
                <a href="{{ route('service')}}" class="nav-item nav-link">Service</a>
                <a href="{{route('roadmap')}}" class="nav-item nav-link">Roadmap</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu shadow-sm m-0">
                        <a href="{{route('feature')}}" class="dropdown-item">Feature</a>
                        <a href="{{route('faq')}}" class="dropdown-item">FAQs</a>
                    </div>
                </div>
                <a href="{{route('contact')}}" class="nav-item nav-link">Contact</a>
            </div>
            <div class="h-100 d-lg-inline-flex align-items-center d-none">
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-2" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square rounded-circle bg-light text-primary me-0" href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </nav>
    <!-- Header Start -->
    <div class="container-fluid hero-header bg-light py-5 mb-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 mb-3 animated slideInDown">Make Better Life With Trusted CurrencyBridge</h1>
                    <p class="animated slideInDown">Experience seamless currency exchange with our intuitive platform, offering real-time rates and secure transactions.</p>
                    <a href="{{ route('register_page')}}" class="btn btn-primary">Login/Signup</a>
                </div>
                <div class="col-lg-6 animated fadeIn">
                    <img class="img-fluid animated pulse infinite" style="animation-duration: 3s;" src="img/hero-1.png" alt="">
                </div>
            </div>
        </div>
    </div>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <div class="text-center mt-3">
                    <a href="#" class="forgot-password-link">Forgot Password?</a>
                </div>
                <div class="text-center mt-3">
                <p>Don't have an account? <a href="#" id="registerLink">Register</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Bootstrap modal -->
<script>
    document.getElementById('loginSignupBtn').addEventListener('click', function() {
        var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
    });
</script>


<!-- Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <img class="img-fluid" src="img/about.png" alt="">
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="h-100">
                    <h1 class="display-6">About Us</h1>
                    <p class="text-primary fs-5 mb-4">The Most Trusted Currency Exchange Platform</p>
                    <p>Discover the essence of seamless currency exchange at our platform. With a commitment to reliability and security, we facilitate smooth transactions for our users.</p>
                    <p class="mb-4">Our mission is to provide unparalleled service, ensuring convenience and efficiency in every exchange. Join us in navigating the global market with confidence.</p>
                    <div class="d-flex align-items-center mb-2">
                        <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span>Reliable and Secure Transactions</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span>Global Market Navigation</span>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fa fa-check bg-light text-primary btn-sm-square rounded-circle me-3 fw-bold"></i>
                        <span>Commitment to Excellence</span>
                    </div>
                    <a class="btn btn-primary py-3 px-4" href="#">Read More</a>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Facts Start -->
    <div class="container-xxl bg-light py-5 my-5">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.1s">
                    <img class="img-fluid mb-4" src="img/icon-9.png" alt="">
                    <h1 class="display-4" data-toggle="counter-up">123456</h1>
                    <p class="fs-5 text-primary mb-0">Today Transactions</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.3s">
                    <img class="img-fluid mb-4" src="img/icon-10.png" alt="">
                    <h1 class="display-4" data-toggle="counter-up">123456</h1>
                    <p class="fs-5 text-primary mb-0">Monthly Transactions</p>
                </div>
                <div class="col-lg-4 col-md-6 text-center wow fadeIn" data-wow-delay="0.5s">
                    <img class="img-fluid mb-4" src="img/icon-2.png" alt="">
                    <h1 class="display-4" data-toggle="counter-up">123456</h1>
                    <p class="fs-5 text-primary mb-0">Total Transactions</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->

    <!-- Features Start -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Why Choose Us?</h1>
            <p class="text-primary fs-5 mb-5">The Best in the Currency Exchange Industry</p>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" src="img/icon-7.png" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">Easy To Get Started</h5>
                        <span>Experience a hassle-free onboarding process to start exchanging currencies effortlessly.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" src="img/icon-6.png" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">Safe & Secure Transactions</h5>
                        <span>Rest assured with our robust security measures ensuring the safety of your transactions.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" src="img/icon-5.png" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">Affordable Plans</h5>
                        <span>Explore budget-friendly plans tailored to your currency exchange needs.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" src="img/icon-4.png" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">Secure Storage</h5>
                        <span>Your funds are securely stored using advanced encryption techniques.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" src="img/icon-3.png" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">Protected By Insurance</h5>
                        <span>Benefit from additional protection through insurance coverage for your transactions.</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="d-flex align-items-start">
                    <img class="img-fluid flex-shrink-0" src="img/icon-8.png" alt="">
                    <div class="ps-4">
                        <h5 class="mb-3">24/7 Customer Support</h5>
                        <span>Get assistance round the clock from our dedicated customer support team.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Features End -->

    <!-- Service Start -->
    <div class="container-xxl bg-light py-5 my-5">
    <div class="container py-5">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Our Services</h1>
            <p class="text-primary fs-5 mb-5">Buy, Sell, and Exchange Currency</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-white p-5">
                    <img class="img-fluid mb-4" src="img/icon-7.png" alt="">
                    <h5 class="mb-3">Currency Wallet</h5>
                    <p>Store your cryptocurrency securely in our advanced digital wallets, ensuring peace of mind for your investments.</p>
                    <a href="#">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item bg-white p-5">
                    <img class="img-fluid mb-4" src="img/icon-3.png" alt="">
                    <h5 class="mb-3">Currency Transaction</h5>
                    <p>Execute seamless transactions with our secure platform, ensuring fast and reliable transfers of your digital assets.</p>
                    <a href="#">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item bg-white p-5">
                    <img class="img-fluid mb-4" src="img/icon-9.png" alt="">
                    <h5 class="mb-3">Bitcoin Investment</h5>
                    <p>Dive into the world of cryptocurrency investment with our expert guidance and secure investment options.</p>
                    <a href="#">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item bg-white p-5">
                    <img class="img-fluid mb-4" src="img/icon-5.png" alt="">
                    <h5 class="mb-3">Currency Exchange</h5>
                    <p>Exchange your digital currencies effortlessly with our user-friendly and secure exchange platform.</p>
                    <a href="#">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item bg-white p-5">
                    <img class="img-fluid mb-4" src="img/icon-2.png" alt="">
                    <h5 class="mb-3">Bitcoin Escrow</h5>
                    <p>Ensure the safety of your transactions with our trusted Bitcoin escrow services, providing security and peace of mind.</p>
                    <a href="#">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item bg-white p-5">
                    <img class="img-fluid mb-4" src="img/icon-8.png" alt="">
                    <h5 class="mb-3">Token Sale</h5>
                    <p>Participate in token sales and explore new investment opportunities with our platform's comprehensive token sale offerings.</p>
                    <a href="#">Read More <i class="fa fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Roadmap Start -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Our Journey</h1>
            <p class="text-primary fs-5 mb-5">Turning Dreams into Achievements</p>
        </div>
        <div class="owl-carousel roadmap-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>Phase 1: Inception</h5>
                <span>Embarking on our journey to revolutionize the currency exchange industry.</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>Phase 2: Innovation</h5>
                <span>Introducing cutting-edge technologies for seamless transactions and security.</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>Phase 3: Expansion</h5>
                <span>Expanding our reach globally, connecting users across borders.</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>Phase 4: Evolution</h5>
                <span>Adapting and evolving to meet the dynamic needs of our users and the market.</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>Phase 5: Success</h5>
                <span>Celebrating milestones and accomplishments as we continue to thrive.</span>
            </div>
            <div class="roadmap-item">
                <div class="roadmap-point"><span></span></div>
                <h5>Phase 6: Future</h5>
                <span>Envisioning a future where currency exchange is seamless and accessible to all.</span>
            </div>
        </div>
    </div>
</div>


    <!-- Token Sale Start -->
    <div class="container-xxl bg-light py-5 my-5">
    <div class="container py-5">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Currency Exchange</h1>
            <p class="text-primary fs-5 mb-5">Seamless Currency Conversion Services</p>
        </div>
        <div class="row g-3">
            <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="bg-white text-center p-3">
                    <h1 class="mb-0">50+</h1>
                    <span class="text-primary fs-5">Supported Currencies</span>
                </div>
            </div>
            <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="bg-white text-center p-3">
                    <h1 class="mb-0">24/7</h1>
                    <span class="text-primary fs-5">Customer Support</span>
                </div>
            </div>
            <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="bg-white text-center p-3">
                    <h1 class="mb-0">Instant</h1>
                    <span class="text-primary fs-5">Currency Conversion</span>
                </div>
            </div>
            <div class="col-6 col-md-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="bg-white text-center p-3">
                    <h1 class="mb-0">Secure</h1>
                    <span class="text-primary fs-5">Transactions</span>
                </div>
            </div>
            <div class="col-12 text-center py-4">
                <a class="btn btn-primary py-3 px-4" href="#">Start Exchanging</a>
            </div>
            <div class="col-12 text-center">
                <img class="img-fluid m-1" src="img/payment-1.png" alt="" style="width: 50px;">
                <img class="img-fluid m-1" src="img/payment-2.png" alt="" style="width: 50px;">
                <img class="img-fluid m-1" src="img/payment-3.png" alt="" style="width: 50px;">
                <img class="img-fluid m-1" src="img/payment-4.png" alt="" style="width: 50px;">
            </div>
        </div>
    </div>
</div>

    <!-- Token Sale Start -->


    <!-- FAQs Start -->
    <div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Currency Exchange FAQs</h1>
            <p class="text-primary fs-5 mb-5">Answers to Common Questions</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.1s">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                How do I start trading on your currency exchange platform?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                To start trading on our platform, simply sign up for an account, complete the
                                verification process, deposit funds into your account, and you're ready to begin
                                exchanging currencies.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                What currencies can I trade on your platform?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                You can trade a wide range of currencies on our platform, including major currencies
                                like USD, EUR, GBP, as well as various cryptocurrencies such as Bitcoin, Ethereum,
                                and more.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.3s">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Are there any fees associated with currency exchange transactions?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Yes, there are transaction fees associated with currency exchanges. The fees vary
                                depending on the type of currency pair and the size of the transaction. Please refer
                                to our fee schedule for more information.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                How secure are my transactions on your platform?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                We prioritize the security of our platform and implement industry-leading security
                                measures to safeguard your transactions and personal information. Our platform
                                utilizes encryption protocols, multi-factor authentication, and regular security
                                audits to ensure the highest level of security.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item wow fadeInUp" data-wow-delay="0.5s">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Can I set alerts for currency exchange rate changes?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Yes, our platform allows you to set up personalized alerts for currency exchange rate
                                changes. You can receive notifications via email or mobile push notifications to
                                stay informed about market movements and make timely trading decisions.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- FAQs Start -->

    <!-- Footer Start -->
    <div class="container-fluid bg-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-md-6">
                    <h1 class="text-primary mb-4"><img class="img-fluid me-2" src="img/icon-1.png" alt="" style="width: 45px;">CurrencyBridge</h1>
                    <span>Welcome to CurrencyBridge, your trusted platform for seamless currency exchange and transactions. With our user-friendly interface and secure technology, we ensure a hassle-free experience for all your financial needs. Whether you're a seasoned investor or just getting started, our platform offers a range of services to suit your requirements. Join us today and experience the convenience of modern currency exchange.</span>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-4">Customer Support</h5>
                    <p>Our customer support team is available 24/7 to assist you with any inquiries or issues you may have.</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone-alt me-3"></i>Customer Support: +91 9660713961</li>
                        <li><i class="fa fa-envelope me-3"></i>Email: support@currencybridge.com</li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Get In Touch</h5>
                    <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New Delhi, India</p>
                    <p><i class="fa fa-phone-alt me-3"></i>+91 9660713961</p>
                    <p><i class="fa fa-envelope me-3"></i>currencybridge@gmial.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Our Services</h5>
                    <a class="btn btn-link" href="">Currency Wallet</a>
                    <a class="btn btn-link" href="">Currency Transaction</a>
                    <a class="btn btn-link" href="">Bitcoin Investment</a>
                    <a class="btn btn-link" href="">Currency Exchange</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Quick Links</h5>
                    <a class="btn btn-link" href="">About Us</a>
                    <a class="btn btn-link" href="">Contact Us</a>
                    <a class="btn btn-link" href="">Our Services</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="mb-4">Follow Us</h5>
                    <div class="d-flex">
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square rounded-circle me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">CurrencyBridge</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a href="https://htmlcodex.com">CurrencyBridge</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
 
</body>

</html>