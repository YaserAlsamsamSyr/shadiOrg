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
        td {
            font-size: 22px;
           padding-top: 10px;
           padding-bottom: 20px;
           padding-left: 30px;
           padding-right: 40px;
        }
        #btn{
            font-size: 30px;
            background-color: white;
            color:rgb(255, 166, 0)!important;
        }
        #btn:hover{
            color:rgb(68, 0, 85)!important;
        }
    </style>
</head>

<body>
    @include('layouts.spiner')
    
    @include('layouts.nav')

    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center">
            <h1 class="display-4 text-white animated slideInDown mb-4">حسابات المستخدمين</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    {{-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> --}}
                    <li class="breadcrumb-item"><a class="text-white" href="#">{{ $formType }}</a></li>
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
                <h1 class="display-4 mb-5">{{ $formType }}</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                @forelse ($users as $user)
                    <div class="testimonial-item text-center">
                        <img class="img-fluid bg-light rounded-circle p-2 mx-auto mb-4" src="https://img.icons8.com/badges/96/user.png" style="width: 100px; height: 100px;">
                        @error('password')
                            @if(@session('id')==$user->id)
                                <x-input-error  class="mt-2" messages="{{ $message }}" />
                            @endif
                        @enderror
                        <div class="testimonial-text rounded text-center p-4">
                                 <p style="color:rgb(8, 8, 8)!important">{{ $loop->index+1 }}</p>
                                 <table align="center" style="direction: rtl">
                                        <tr>
                                            <td>الحساب</td><td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>العنوان</td><td>{{ $user->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>رقم الهاتف</td><td>{{ $user->phone }}</td>
                                        </tr>
                                        <form method="post" action="{{ route('user.updatePassword') }}">
                                            <tr>
                                                <td>إعادة تعيين كلمة سر</td><td>
                                                        @csrf
                                                        <input type="hidden" name="user" value="{{ $user->id }}"/>
                                                        <input type="password" name="password" class="form-control block mt-1 w-100" style="width:130%;color:#f39657 !important" required autocomplete="new-password" />
                                                </td>
                                            </tr>
                                            <tr><td colspan="2">
                                                <button class="btn btn-primary py-2 px-3 me-3 w-100" id="btn">
                                                   حفظ
                                                 </button>    
                                            </td></tr>
                                        </form>
                                </table>
                        </div>
                    </div>
                    @empty
                       <h2 style="color:red!important">لايوجد إستمارات</h2> 
                    @endforelse
            </div>
            <div class="row mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="col-md-12">    
                    <br>
                    {{-- <h3>{{ $forms->links() }}</h3> --}}
                    @include('layouts.paginate',['paginator'=>$users])
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