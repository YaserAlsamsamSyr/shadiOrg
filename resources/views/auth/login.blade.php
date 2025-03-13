<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @include('layouts.title')
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    @include('layouts.spiner')
    
    @include('layouts.nav')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">تسجيل الدخول</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    {{-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> --}}
                    <li class="breadcrumb-item"><a class="text-white" href="#">تسجيل الدخول</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">الرئيسية</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeIn text-center" data-wow-delay="0.1s">
                    <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">التنمية والتطوير للخير</div>
                    <h1 class="display-6 mb-5">تسجيل الدخول</h1>
                    
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <!-- Page Header End -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row g-3 m-2">
                            <div class="col-md-3 col-sm-1"></div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control block mt-1 w-full" style="border-color:#ff6f0f" id="email" name="email" :value="old('email')" required autocomplete="username" />
                                    <label for="email">الحساب</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-3 m-2">
                            <div class="col-md-3 col-sm-1"></div>
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="password" class="form-control block mt-1 w-full" id="password" style="border-color:#ff6f0f"
                                           name="password" required autocomplete="current-password" />
                                    <label for="subject">كلمة سر</label>
                                </div>
                            </div>
                        </div>
                        <!-- Remember Me -->
                        
                        <div class="row g-3 m-2">
                            
                            <div class="col-md-3 col-sm-1"></div>
                            <div class="col-6">
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('حفظ تسجيل الدخول') }}</span>
                                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            </label>
                        </div>
                            </div></div>
                        <div class="row g-3 m-2">
                            
                            <div class="col-md-3 col-sm-1"></div>
                            <div class="col-6">
                                <button class="btn btn-primary py-2 px-3 me-3">
                                    تسجيل الدخول
                                    <div class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


   @include('layouts.footer')

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/parallax/parallax.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>