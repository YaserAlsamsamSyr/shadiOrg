
    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
                <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@example.com</small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <a class="text-white-50 ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="text-white-50 ms-3" href=""><i class="fab fa-instagram"></i></a>
                <small> : تابعونا</small>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="fw-bold text-primary m-0" >جمعية<span class="text-white"> التنمية و التطوير للخير </span></h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                                                    <!---->
                    {{-- <div class="col-12" style="direction:rtl"> --}}

                        {{--  --}}
                    {{-- </div> --}}
                    <a href="{{ route("index") }}" class="nav-item nav-link active">الرئيسية</a>
                    @if(Route::current()->getName() == 'index')
                        <a href="#iamhere" class="nav-item nav-link">إنضم إلينا</a>
                    @endif
                    @auth
                        @if(Auth::user()->role=="addmin*")
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">admin</a>
                                <div class="dropdown-menu m-0">
                                    <a href="{{ route('form.wait') }}" class="dropdown-item">استمارات قيد لإنتظار</a>
                                    <a href="{{ route('form.true') }}" class="dropdown-item">الإستمارات المقبولة</a>
                                    <a href="{{ route('form.false') }}" class="dropdown-item">الإستمارات المرفوضة</a>
                                    <a href="{{ route('users') }}" class="dropdown-item">حسابات المستخدمين</a>
                                    {{-- <a href="404.html" class="dropdown-item">404 Page</a> --}}
                                </div>
                            </div>
                        @endif
                        <a href="{{ route('getMyForms') }}" class="nav-item nav-link">استماراتي</a>
                        <a href="{{ route('profile.edit') }}" class="nav-item nav-link">ملفي شخصي</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="about.html" class="nav-item nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">تسجيل الخروج</a>
                        </form>
                    @endauth
                    @guest
                        <a href="{{ route('register') }}" class="nav-item nav-link">إنشاء حساب</a>
                        <a href="{{ route('login') }}" class="nav-item nav-link">تسجيل الدخول</a>
                    @endguest
                </div>  
            </div>
        </nav>

{{--  --}}
    <div class="row"><div class="col-1"></div><div class="col-11 display-6">
        @if(@session('created'))
            <p  class="nav-item nav-link" style="color: rgb(95, 240, 95) !important;">
                تم إرسال الطلب بنجاح
                {{ Session::put('created', false) }}
            </p>
        @endif
        @if(@session('repassword'))
            <p  class="nav-item nav-link" style="color: rgb(95, 240, 95) !important;">
                تم تعديل كلمة سر
                {{ Session::put('repassword', false) }}
            </p>
        @endif
        @if(Route::current()->getName() == 'index')
            @if($errors->has('firstName'))
            <p  class="nav-item nav-link" style="color:red!important;">{{ $errors->first('firstName') }}</p>
            @elseif($errors->has('lastName'))
            <p  class="nav-item nav-link" style="color:red!important;">{{ $errors->first('lastName') }}</p>
            @elseif($errors->has('motherName'))
            <p  class="nav-item nav-link" style="color:red!important;">{{ $errors->first('motherName') }}</p>
            @elseif($errors->has('fatherName'))
            <p  class="nav-item nav-link" style="color:red!important;">{{ $errors->first('fatherName') }}</p>
            @elseif($errors->has('birthDateArea'))
            <p  class="nav-item nav-link" style="color:red!important;">{{ $errors->first('birthDateArea') }}</p>
            @elseif($errors->has('birthDate'))
            <p  class="nav-item nav-link" style="color:red!important;">{{ $errors->first('birthDate') }}</p>
            @elseif ($errors->has('iss'))
            <p  class="nav-item nav-link" style="color:red!important;">{{ $errors->first('iss') }}</p>
            @elseif($errors->has('joinType'))
                 <p  class="nav-item nav-link" style="color:red!important;">{{ $errors->first('joinType') }}</p>
            @endif
        @endif
    </div></div>
</div>
    <!-- Navbar End -->
