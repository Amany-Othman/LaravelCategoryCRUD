<!doctype html>
<html class="no-js" lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Medi</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Medi favicon --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/medi/img/favicon.png') }}">

    {{-- Medi CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/medi/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/medi/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/medi/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/medi/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/medi/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/medi/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/medi/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/medi/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/medi/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/medi/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/medi/css/style.css') }}">
</head>

<body>

    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo-img">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('assets/medi/img/logo.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="menu_wrap d-none d-lg-block">
                                <div class="menu_wrap_inner d-flex align-items-center justify-content-end">
                                    <div class="main-menu">
                                        <nav>
                                            <ul id="navigation">
                                                <li>
                                                    <a href="{{ url('/') }}">Home</a>
                                                </li>

                                                <li>
                                                    <a href="about.html">About</a>
                                                </li>

                                                <li>
                                                    <a href="#">Blog <i class="ti-angle-down"></i></a>

                                                    <ul class="submenu">
                                                        <li><a href="blog.html">Blog</a></li>
                                                        <li><a href="single-blog.html">Single Blog</a></li>
                                                    </ul>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        Pages
                                                        <i class="ti-angle-down"></i>
                                                    </a>

                                                    <ul class="submenu">
                                                        <li>
                                                            <a href="department.html">
                                                                Department
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="elements.html">
                                                                Elements
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </li>
                                                @if (app()->getLocale() === 'en')
                                                <li>
                                                    <a href="{{ url('/ar') }}">العربية</a>
                                                </li>
                                                @else
                                                <li>
                                                    <a href="{{ url('/') }}">English</a>
                                                </li>
                                                @endif
                                                <a href="{{ route('login') }}" style="color: #fff;">Login</a>
                                                <li>
                                                    <a href="contact.html">
                                                        Contact
                                                    </a>
                                                </li>

                                                <div class="book_room">
                                                    <div class="book_btn">
                                                        <a class="popup-with-form" href="#test-form">
                                                            Book Appointment
                                                        </a>
                                                    </div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>
    <!-- header-end -->

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <div class="single_slider  d-flex align-items-center slider_bg_1 overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="slider_text ">
                                {{--
                                    Hero section is wired to the new HomeContent model.
                                    Expected fields on the HomeContent record (e.g. $homeContents['hero_subtitle'], $homeContents['hero_title']):
                                        - value_en
                                        - value_ar
                                        - link
                                --}}
                                <span>
                                    {{ app()->getLocale() === 'ar'
        ? $homeContents['subtitle']->value_ar
        : $homeContents['subtitle']->value_en }}
                                </span>

                                <h3>
                                    {{ app()->getLocale() === 'ar'
        ? $homeContents['title']->value_ar
        : $homeContents['title']->value_en }}
                                </h3>

                                <a href="{{ $homeContents['button']->link ?? '#' }}" class="boxed-btn5">
                                    {{ app()->getLocale() === 'ar'
        ? $homeContents['button']->value_ar
        : $homeContents['button']->value_en }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- welcome_clicnic_area_start -->
    <div class="welcome_clicnic_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_thumb">
                        <div class="thumb_1">
                            <img src="{{ asset('assets/medi/img/about/1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="welcome_docmed_info">
                        <h3>
                            Welcome to Medi
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore magna aliqua.
                        </p>
                        <ul>
                            <li>
                                <i class="flaticon-verified"></i>
                                Award Winning
                            </li>

                            <li>
                                <i class="flaticon-verified"></i>
                                24/7 Emergency Service
                            </li>

                            <li>
                                <i class="flaticon-verified"></i>
                                Free Medical Consultant
                            </li>
                        </ul>
                        <a href="about.html" class="boxed-btn6">About us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- welcome_clicnic_area_end -->

    <!-- depertment_area_start  -->
    <div class="depertment_area">
        <div class="container">
            <div class="row custom_align align-items-end justify-content-between">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>
                            Departments
                        </h3>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                            ut labore et dolore.
                        </p>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="learn_more_btn text-right">
                        <a href="#" class="boxed-btn">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="depart_ment_tab mb-30">
                        <ul class="nav" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">
                                    <i class="flaticon-teeth"></i>
                                    <h4>Dentistry
                                    </h4>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">
                                    <i class="flaticon-cardiovascular"></i>
                                    <h4>Cardiology
                                    </h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                    aria-controls="contact" aria-selected="false">
                                    <i class="flaticon-ear"></i>
                                    <h4>ENT
                                    </h4>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Astrology-tab" data-toggle="tab" href="#Astrology" role="tab"
                                    aria-controls="contact" aria-selected="false">
                                    <i class="flaticon-bone"></i>
                                    <h4>Astrology
                                    </h4>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Neuroanatomy-tab" data-toggle="tab" href="#Neuroanatomy"
                                    role="tab" aria-controls="contact" aria-selected="false">
                                    <i class="flaticon-lung"></i>
                                    <h4>Neuroanatomy
                                    </h4>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Blood-tab" data-toggle="tab" href="#Blood" role="tab"
                                    aria-controls="contact" aria-selected="false">
                                    <i class="flaticon-cell"></i>
                                    <h4>Blood
                                    </h4>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dept_main_info white-bg">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">

                                </div>
                            </div>

                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="{{ asset('assets/medi/img/department/1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>
                                        Cardiology
                                    </h3>

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.
                                    </p>

                                    <a href="#" class="boxed-btn">
                                        Make Appointment
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="{{ asset('assets/medi/img/department/1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>
                                        ENT
                                    </h3>

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.
                                    </p>

                                    <a href="#" class="boxed-btn">
                                        Make Appointment
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="Astrology" role="tabpanel" aria-labelledby="Astrology-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="{{ asset('assets/medi/img/department/1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>
                                        Astrology
                                    </h3>

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.
                                    </p>

                                    <a href="#" class="boxed-btn">
                                        Make Appointment
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="Neuroanatomy" role="tabpanel" aria-labelledby="Neuroanatomy-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="{{ asset('assets/medi/img/department/1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>
                                        Neuroanatomy
                                    </h3>

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.
                                    </p>

                                    <a href="#" class="boxed-btn">
                                        Make Appointment
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                    <div class="tab-pane fade" id="Blood" role="tabpanel" aria-labelledby="Blood-tab">
                        <!-- single_content  -->
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="dept_thumb">
                                    <img src="{{ asset('assets/medi/img/department/1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="dept_info">
                                    <h3>
                                        Blood
                                    </h3>

                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.
                                    </p>

                                    <a href="#" class="boxed-btn">
                                        Make Appointment
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- single_content  -->
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- depertment_area_end  -->

    <!-- expert_doctors_area_start -->
    <div class="expert_doctors_area">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-6">
                    <div class="section_title mb-55 text-center">
                        <h3>Our Doctors</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">

                @foreach ($doctors as $doctor)

                <div class="col-lg-4 col-md-6">

                    <div class="single_expert">

                        <div class="expert_thumb">
                            <img src="{{ asset($doctor->image) }}" alt="{{ $doctor->name_en }}">
                        </div>

                        <div class="experts_name text-center">

                            <h3>
                                {{ app()->getLocale() === 'ar'
                            ? $doctor->name_ar
                            : $doctor->name_en }}
                            </h3>

                            <span>
                                {{ app()->getLocale() === 'ar'
                            ? $doctor->specialty_ar
                            : $doctor->specialty_en }}
                            </span>

                            <div class="social_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </div>

                </div>

                @endforeach

            </div>
        </div>
    </div>
    <!-- expert_doctors_area_end -->

    <div class="book_apointment_area">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-7">
                    <div class="popup_box ">
                        <div class="popup_inner">
                            <h3>
                                Book an
                                <span>Appointment</span>
                            </h3>
                            <form action="#">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <select class="form-select wide" id="default-select" class="">
                                            <option data-display="Please select doctor to visit">Please select doctor to
                                                visit </option>
                                            <option value="1">Anaf</option>
                                            <option value="2">Nayna Therapy</option>
                                            <option value="3">Nadif</option>
                                        </select>
                                    </div>
                                    <div class="col-xl-9">
                                        <input type="text" placeholder="Your name ">
                                    </div>
                                    <div class="col-xl-3">
                                        <input type="text" placeholder="Your age">
                                    </div>
                                    <div class="col-xl-6">
                                        <input type="text" placeholder="Phone number ">
                                    </div>
                                    <div class="col-xl-6">
                                        <input type="email" placeholder="Email Address">
                                    </div>
                                    <div class="col-xl-6">
                                        <input class="datepicker" placeholder="Appointment Date">
                                    </div>
                                    <div class="col-xl-6">
                                        <input class="timepicker" placeholder="Suitable time">
                                    </div>
                                    <div class="col-xl-12">
                                        <button type="submit" class="boxed-btn3">Make an Appointment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- quality_area_start  -->
    <div class="quality_area">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-6">
                    <div class="section_title mb-55 text-center">
                        <h3>Quality Health</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single_quality">
                        <div class="icon">
                            <i class="flaticon-customer-service"></i>
                        </div>
                        <h3>Health Consultation</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_quality">
                        <div class="icon">
                            <i class="flaticon-find"></i>
                        </div>
                        <h3>Find Health</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single_quality">
                        <div class="icon">
                            <i class="flaticon-doctor"></i>
                        </div>
                        <h3>Search Deoctor</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- quality_areaend  -->

    <!-- Emergency_contact start -->
    <div class="Emergency_contact">
        <div class="Emergency_contact_inner ">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="single_emergency">
                            <div class="info">
                                <span>We are here for you</span>
                                <h3>Book Appointment</h3>
                            </div>
                            <div class="info_button">
                                <a href="#" class="boxed-btn3-white">Book Appointment
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single_emergency align-items-center d-flex justify-content-end">
                            <div class="icon">
                                <i class="flaticon-call"></i>
                            </div>
                            <div class="info">
                                <span>Emergency Medical Care</span>
                                <h3>+1-465 4545</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Emergency_contact end -->

    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-md-6 col-lg-4 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="{{ asset('assets/medi/img/logo.png') }}" alt="">
                                </a>
                            </div>
                            <p class="address_text">Lorem ipsum dolor sit amet, <br> consectetur adipiscing elit, sed do
                                <br> eiusmod tempor incididunt ut labore.
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-twitter-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-dribbble"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Our Departments
                            </h3>
                            <ul class="links">
                                <li><a href="#">Births</a></li>
                                <li><a href="#">Pulmonary</a></li>
                                <li><a href="#">Cardiology</a></li>
                                <li><a href="#">Neurology</a></li>
                                <li><a href="#">Traumatology</a></li>
                                <li><a href="#">Dental</a></li>
                                <li><a href="#">Nuclear</a></li>
                                <li><a href="#">magnetic</a></li>
                                <li><a href="#">Pregnancy</a></li>
                                <li><a href="#">For disabled</a></li>
                                <li><a href="#">X-ray</a></li>
                                <li><a href="#">Prostheses</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4  col-md-6 col-lg-4">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                We’re Available
                            </h3>
                            <ul class="meting_time">
                                <li class="d-flex justify-content-between "><span>Monday - Friday</span> <span>8.00 -
                                        18.00</span></li>
                                <li class="d-flex justify-content-between "><span>Saturday </span> <span>8.00 -
                                        18.00</span></li>
                                <li class="d-flex justify-content-between "><span>Sunday</span> <span>8.00 -
                                        13.00</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="row">
                    <div class="bordered_1px "></div>
                    <div class="col-xl-12">
                        <p class="copy_right text-center">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="ti-heart"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- link that opens popup -->

    <!-- form itself end-->
    <form id="test-form" class="white-popup-block mfp-hide">
        <div class="popup_box ">
            <div class="popup_inner">
                <h3>
                    Book an
                    <span>Appointment</span>
                </h3>
                <form action="#">
                    <div class="row">
                        <div class="col-xl-12">
                            <select class="form-select wide" id="default-select" class="">
                                <option data-display="Please select doctor to visit">Please select doctor to visit
                                </option>
                                <option value="1">Anaf</option>
                                <option value="2">Nayna Therapy</option>
                                <option value="3">Nadif</option>
                            </select>
                        </div>
                        <div class="col-xl-9">
                            <input type="text" placeholder="Your name ">
                        </div>
                        <div class="col-xl-3">
                            <input type="text" placeholder="Your age">
                        </div>
                        <div class="col-xl-6">
                            <input type="text" placeholder="Phone number ">
                        </div>
                        <div class="col-xl-6">
                            <input type="email" placeholder="Email Address">
                        </div>
                        <div class="col-xl-6">
                            <input class="datepicker" placeholder="Appointment Date">
                        </div>
                        <div class="col-xl-6">
                            <input class="timepicker" placeholder="Suitable time">
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="boxed-btn3">Make an Appointment</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </form>
    <!-- form itself end -->

    <!-- JS here -->
    <!-- JS here -->
    {{-- JS here --}}
    <script src="{{ asset('assets/medi/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/ajax-form.js') }}"></script>
    <script src="{{ asset('assets/medi/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/scrollIt.js') }}"></script>
    <script src="{{ asset('assets/medi/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/medi/js/gijgo.min.js') }}"></script>

    {{-- Contact JS --}}
    <script src="{{ asset('assets/medi/js/contact.js') }}"></script>
    <script src="{{ asset('assets/medi/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/jquery.form.js') }}"></script>
    <script src="{{ asset('assets/medi/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/medi/js/mail-script.js') }}"></script>

    <script src="{{ asset('assets/medi/js/main.js') }}"></script>

    <script>
    $('.datepicker').datepicker({
        iconsLibrary: 'fontawesome',
        icons: {
            rightIcon: '<span class="fa fa-calendar"></span>'
        }
    });

    $('.timepicker').timepicker({
        iconsLibrary: 'fontawesome',
        icons: {
            rightIcon: '<span class="fa fa-clock-o"></span>'
        }
    });

    // Fix: hero slider only has 1 slide right now, and Owl Carousel's
    // loop:true (set in main.js) breaks with a single item, leaving it
    // stuck at opacity:0. Destroy and re-init with loop:false until
    // more slides are added.
    if ($('.slider_active').hasClass('owl-loaded')) {
        $('.slider_active').trigger('destroy.owl.carousel');
    }
    $('.slider_active').owlCarousel({
        loop: false,
        margin: 0,
        items: 1,
        nav: true,
        dots: false,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>']
    });
    </script>

</body>

</html>