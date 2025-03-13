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
    <style>
        #bttnn:hover{
           font-size: 20px;
        }
    </style>
</head>

<body>
    @include('layouts.spiner')
    
    @include('layouts.nav')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">ملفي شخصي</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    {{-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> --}}
                    <li class="breadcrumb-item"><a class="text-white" href="#">ملفي شخصي</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">الرئيسية</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Testimonial Start -->
        <div class="container-xxl py-5">
         <div class="container">
             <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                 <div class="d-inline-block rounded-pill bg-secondary text-primary py-1 px-3 mb-3">التنمية و التطوير للخير</div>
                 <h1 class="display-4 mb-5">الملف شخصي</h1>

             </div>
             <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                {{-- update info --}}
                 <div class="testimonial-item text-center">
                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')
                     {{-- <img width="64" height="64" src="https://img.icons8.com/wired/64/installing-updates.png" alt="installing-updates"/> --}}
                     <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="https://img.icons8.com/color/96/synchronize--v1.png" style="width: 100px; height: 100px; background-color:white!important;">
                     @if($errors->get('email'))
                         <x-input-error :messages="$errors->get('email')" class="mt-2" />
                     @elseif ($errors->get('address'))
                         <x-input-error :messages="$errors->get('address')" class="mt-2" />
                     @elseif($errors->get('phone'))
                         <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                     @endif
                     @if (session('status') === 'profile-updated')
                         <h1 style="text-align:center;color:green">تم التعديل</h1>
                     @endif
                     <div class="testimonial-text rounded text-center p-4">
                         <h5 class="mb-1 display-5">تعديل معلومات الحساب</h5>
                         <div class="row g-3 m-2">
                             <div class="col-md-2 col-sm-1"></div>
                             <div class="col-sm-6">
                                 <div class="form-floating">
                                     <input type="email" class="form-control block mt-1 w-full" style="width:130%;color:#f39657 !important" id="email" name="email" required />
                                     <label for="email" style="color:#f39657 !important">{{ Auth::user()->email }}</label>
                                 </div>
                             </div>
                         </div>
                         <div class="row g-3 m-2">
                             <div class="col-md-2 col-sm-1"></div>
                             <div class="col-sm-6">
                                 <div class="form-floating">
                                     <input type="number"  class="form-control block mt-1" style="width:130%;color:#f39657 !important" id="phone" name="phone" required />
                                     <label for="phone" style="color:#f39657 !important">{{ Auth::user()->phone }}</label>
                                 </div>
                             </div>
                         </div>
                         <div class="row g-3 m-2">
                             <div class="col-md-2 col-sm-1"></div>
                             <div class="col-sm-6">
                                 <div class="form-floating">
                                     <input type="text" class="form-control block mt-1 w-full" style="width:130%;color:#f39657 !important" id="address" name="address" required />
                                     <label for="address" style="color:#f39657 !important">{{ Auth::user()->address }}</label>
                                 </div>
                             </div>
                         </div>
                         <div class="row g-3 m-2">
                             <div class="col-md-3 col-sm-1"></div>
                             <div class="col-6">
                                 <button class="btn btn-primary py-2 px-3 me-3" style="width:90%;background-color:#dda96e !important;color:black !important" id="bttnn">
                                    تعديل
                                 </button>
                             </div>
                         </div>
                     </div>
                    </form>
                 </div>
                {{-- update password --}}
                <div class="testimonial-item text-center">
                    <form method="post" action="{{ route('password.update') }}" >
                        @csrf
                        @method('put')
                     {{-- <img width="64" height="64" src="https://img.icons8.com/wired/64/installing-updates.png" alt="installing-updates"/> --}}
                     <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="https://img.icons8.com/3d-fluency/94/lock--v2.png" style="width: 100px; height: 100px; background-color:white!important;">
                     @if($errors->updatePassword->get('current_password'))
                         <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                     @elseif ($errors->updatePassword->get('password'))
                         <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                     @elseif($errors->updatePassword->get('password_confirmation'))
                         <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                     @endif
                     @if (session('status') === 'password-updated')
                         <h1 style="text-align:center;color:green">تم التعديل</h1>
                     @endif
                     <div class="testimonial-text rounded text-center p-4">
                         <h5 class="mb-1 display-5">تعديل كلمة سر الحساب</h5>
                         <div class="row g-3 m-2">
                             <div class="col-md-2 col-sm-1"></div>
                             <div class="col-sm-6">
                                 <div class="form-floating">
                                     <input name="current_password" type="password" class="form-control block mt-1 w-full" style="width:130%;color:#f39657 !important" id="email" required  autocomplete="current-password" />
                                     <label for="email" style="color:#f39657 !important">كلمة سر الحالية</label>
                                 </div>
                             </div>
                         </div>
                         <div class="row g-3 m-2">
                             <div class="col-md-2 col-sm-1"></div>
                             <div class="col-sm-6">
                                 <div class="form-floating">
                                     <input name="password" type="password" class="form-control block mt-1" style="width:130%;color:#f39657 !important" id="phone" required  autocomplete="new-password" />
                                     <label for="phone" style="color:#f39657 !important">كلمة سر الجديدة</label>
                                 </div>
                             </div>
                         </div>
                         <div class="row g-3 m-2">
                             <div class="col-md-2 col-sm-1"></div>
                             <div class="col-sm-6">
                                 <div class="form-floating">
                                     <input name="password_confirmation" type="password" class="form-control block mt-1 w-full" style="width:130%;color:#f39657 !important" id="address" required autocomplete="new-password" />
                                     <label for="address" style="color:#f39657 !important">أعد كتابة كلمة سر الجديدة</label>
                                 </div>
                             </div>
                         </div>
                         <div class="row g-3 m-2">
                             <div class="col-md-3 col-sm-1"></div>
                             <div class="col-6">
                                 <button class="btn btn-primary py-2 px-3 me-3" style="width:90%;background-color:#dda96e !important;color:black !important" id="bttnn">
                                    تعديل
                                 </button>
                             </div>
                         </div>
                     </div>
                    </form>
                 </div>

                  {{-- delete account --}}
                <div class="testimonial-item text-center">

                     {{-- <img width="64" height="64" src="https://img.icons8.com/wired/64/installing-updates.png" alt="installing-updates"/> --}}
                    <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="https://img.icons8.com/matisse/100/cancel.png" style="width: 100px; height: 100px; background-color:white!important;">
                    @if($errors->userDeletion->get('password'))
                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    @endif
                    <div class="testimonial-text rounded text-center p-4">
                        <h5 class="mb-1 display-5">حذف الحساب</h5>
                        <p>عندما تقوم بحذف الحساب جميع بياناتك سيتم حذفها</p>
                        <p>نهائيا ولن يتم استعادها لذا تأكد من انك ترغب بذلك </p>
                        <form method="post" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('delete')
                            <div class="row g-3 m-2">
                                <div class="col-md-2 col-sm-1"></div>
                                <div class="col-6">
                                       <div class="form-floating">
                                           <input name="password" type="password" class="form-control block mt-1 w-full" style="width:130%;color:#f39657 !important" id="address" required autocomplete="current-password" />
                                           <label for="address" style="color:#f39657 !important">ادخل كلمة سر الحالية</label>
                                       </div>
                                </div>
                            </div>
                            <div class="row g-3 m-2">
                                <div class="col-md-3 col-sm-1"></div>
                                <div class="col-6">
                                    <button class="btn btn-primary py-2 px-3 me-3" style="width:90%;background-color:#380342 !important;color:red !important" id="bttnn">
                                       حذف
                                    </button>
                                </div>
                            </div>
                        </form>
                     </div>
                 </div>

             </div>
          </div>
        </div>
    <!-- Testimonial End -->



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