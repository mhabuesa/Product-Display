<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Title -->
        <title>Chishti Food Agro</title>

        <!-- Required Meta Tags Always Come First -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Favicon -->
        <link rel="shortcut icon" href="../../favicon.png">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;display=swap" rel="stylesheet">

        <!-- CSS Implementing Plugins -->
        <link rel="stylesheet" href="{{asset('frontend')}}/vendor/font-awesome/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="{{asset('frontend')}}/css/font-electro.css">

        <link rel="stylesheet" href="{{asset('frontend')}}/vendor/animate.css/animate.min.css">
        <link rel="stylesheet" href="{{asset('frontend')}}/vendor/hs-megamenu/src/hs.megamenu.css">
        <link rel="stylesheet" href="{{asset('frontend')}}/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
        <link rel="stylesheet" href="{{asset('frontend')}}/vendor/fancybox/jquery.fancybox.css">
        <link rel="stylesheet" href="{{asset('frontend')}}/vendor/slick-carousel/slick/slick.css">
        <link rel="stylesheet" href="{{asset('frontend')}}/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">

        <!-- CSS Electro Template -->
        <link rel="stylesheet" href="{{asset('frontend')}}/css/theme.css">
        <link rel="stylesheet" href="{{asset('frontend')}}/css/custom.css">
    </head>

    <body>

         <!-- ========== HEADER ========== -->
         <header id="header" class="u-header u-header-left-aligned-nav">
            <div class="u-header__section shadow-none">

                <!-- Logo-Vertical-menu-Search-header-icons -->
                <div class="border-bottom border-lg-down-0 bg-primary bg-xl-transparent min-height-64 flex-horizontal-center">
                    <div class="container">
                        <div class="row align-items-center justify-content-between justify-content-xl-start">
                            <!-- Logo -->
                            <div class="col-auto">
                                <div class="d-inline-flex d-xl-flex align-items-center justify-content-xl-between position-relative">
                                    <!-- Responsive Menu -->
                                    <div id="logoAndNav">
                                        <!-- Nav -->
                                        <nav class="navbar navbar-expand u-header__navbar">
                                            <!-- Fullscreen Toggle Button -->
                                            <button id="sidebarHeaderInvoker" type="button" class="mr-2 pl-0 navbar-toggler d-block d-xl-none btn u-hamburger ml-auto"
                                                aria-controls="sidebarHeader"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                data-unfold-event="click"
                                                data-unfold-hide-on-scroll="false"
                                                data-unfold-target="#sidebarHeader"
                                                data-unfold-type="css-animation"
                                                data-unfold-animation-in="fadeInLeft"
                                                data-unfold-animation-out="fadeOutLeft"
                                                data-unfold-duration="500">
                                                <span id="hamburgerTrigger" class="u-hamburger__box">
                                                    <span class="u-hamburger__inner"></span>
                                                </span>
                                            </button>
                                            <!-- End Fullscreen Toggle Button -->

                                            <!-- Logo -->
                                            <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center ml-1 ml-xl-0" href="{{route('index')}}" aria-label="Electro">
                                                <img src="{{asset('frontend')}}/logo/logo.png" alt="">
                                            </a>
                                            <!-- End Logo -->
                                        </nav>
                                        <!-- End Nav -->
                                    </div>
                                    <!-- End Responsive Menu -->

                                </div>
                            </div>
                            <!-- End Logo -->
                            <!-- Search Bar -->
                            <div class="col d-none d-xl-block">
                                <form class="js-focus-state" action="{{route('search')}}" method="GET">
                                    @csrf
                                    <label class="sr-only" for="searchproduct">Search</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control py-2 pl-5 font-size-15 border-right-0 height-40 border-width-2 rounded-left-pill border-primary" name="q" id="searchproduct-item" placeholder="Search for Products" aria-label="Search for Products" aria-describedby="searchProduct1" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary height-40 py-2 px-3 rounded-right-pill" type="submit" id="searchProduct1">
                                                <span class="ec ec-search font-size-24"></span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Search Bar -->
                            <!-- Header Icons -->
                            <div class="col-auto position-static">
                                <div class="d-flex">
                                    <ul class="d-flex list-unstyled mb-0">
                                        <!-- Search -->
                                        <li class="col d-xl-none px-2 px-sm-3 position-static">
                                            <a id="searchClassicInvoker" class="font-size-22 text-gray-90 text-lh-1 btn-text-secondary" href="javascript:;" role="button"
                                                data-toggle="tooltip"
                                                data-placement="top"
                                                title="Search"
                                                aria-controls="searchClassic"
                                                aria-haspopup="true"
                                                aria-expanded="false"
                                                data-unfold-target="#searchClassic"
                                                data-unfold-type="css-animation"
                                                data-unfold-duration="300"
                                                data-unfold-delay="300"
                                                data-unfold-hide-on-scroll="true"
                                                data-unfold-animation-in="slideInUp"
                                                data-unfold-animation-out="fadeOut">
                                                <span class="ec ec-search"></span>
                                            </a>

                                            <!-- Input -->
                                            <div id="searchClassic" class="dropdown-menu dropdown-unfold dropdown-menu-right left-0 mx-2" aria-labelledby="searchClassicInvoker">
                                                <form class="js-focus-state input-group px-3">
                                                    <input class="form-control" type="search" placeholder="Search Product">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary px-3" type="button"><i class="font-size-18 ec ec-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- End Input -->
                                        </li>
                                        <!-- End Search -->
                                    </ul>
                                </div>
                            </div>
                            <!-- End Header Icons -->
                        </div>
                    </div>
                </div>
                <!-- End Logo-Vertical-menu-Search-header-icons -->

            </div>
        </header>
        <!-- ========== END HEADER ========== -->

        @yield('content')

        <!-- ========== FOOTER ========== -->
        <footer>

            <!-- Footer-bottom-widgets -->
            <div class="pt-8 pb-4 bg-gray-13">
                <div class="container mt-1">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="mb-6">
                                <!-- Logo -->
                                <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center ml-1 ml-xl-0" href="{{route('index')}}" aria-label="Electro">
                                    <img src="{{asset('frontend')}}/logo/logo.png" alt="">
                                </a>
                                <!-- End Logo -->
                            </div>
                            <div class="mb-4">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <i class="ec ec-support text-primary font-size-56"></i>
                                    </div>
                                    <div class="col pl-3">
                                        <div class="font-size-13 font-weight-light">Got questions? Call us 24/7!</div>
                                        <a href="tel:+8801795655655" class="font-size-20 text-gray-90">(+88) 01795-655655</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-12 col-md mb-4 mb-md-0">
                                    <div class="mb-4">
                                        <h6 class="mb-1 font-weight-bold">Contact info</h6>
                                        <address class="">
                                            West Fokonda, Shampur, Patnitala, Naogaon.
                                        </address>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer-bottom-widgets -->
            <!-- Footer-copy-right -->
            <div class="bg-gray-14 py-2">
                <div class="container">
                    <div class="flex-center-between d-block d-md-flex">
                        <div class="mb-3 mb-md-0">© <a href="#" class="font-weight-bold text-gray-90">CHISHTI</a> - All rights Reserved</div>
                    </div>
                </div>
            </div>
            <!-- End Footer-copy-right -->
        </footer>
        <!-- ========== END FOOTER ========== -->

        <!-- ========== SECONDARY CONTENTS ========== -->

        <!-- ========== HEADER SIDEBAR ========== -->
        <aside id="sidebarHeader" class="u-sidebar u-sidebar--left" aria-labelledby="sidebarHeaderInvoker">
            <div class="u-sidebar__scroller">
                <div class="u-sidebar__container">
                    <div class="u-header-sidebar__footer-offset">
                        <!-- Toggle Button -->
                        <div class="d-sm-none position-absolute top-0 right-0 z-index-2 pt-4 pr-4 bg-white">
                            <button type="button" class="close ml-auto"
                                aria-controls="sidebarHeader"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-unfold-event="click"
                                data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarHeader"
                                data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInLeft"
                                data-unfold-animation-out="fadeOutLeft"
                                data-unfold-duration="500">
                                <span aria-hidden="true"><i class="ec ec-close-remove text-gray-90 font-size-20"></i></span>
                            </button>
                        </div>
                        <!-- End Toggle Button -->

                        <!-- Content -->
                        <div class="js-scrollbar u-sidebar__body">
                            <div id="headerSidebarContent" class="u-sidebar__content u-header-sidebar__content">
                                <!-- Logo -->
                                <a class="navbar-brand u-header__navbar-brand u-header__navbar-brand-center mb-3" href="index.html" aria-label="Electro">
                                    <svg version="1.1" x="0px" y="0px" width="175.748px" height="42.52px" viewBox="0 0 175.748 42.52" enable-background="new 0 0 175.748 42.52" style="margin-bottom: 0;">
                                        <ellipse class="ellipse-bg" fill-rule="evenodd" clip-rule="evenodd" fill="#FDD700" cx="170.05" cy="36.341" rx="5.32" ry="5.367"></ellipse>
                                        <path fill-rule="evenodd" clip-rule="evenodd" fill="#333E48" d="M30.514,0.71c-0.034,0.003-0.066,0.008-0.056,0.056
                                            C30.263,0.995,29.876,1.181,29.79,1.5c-0.148,0.548,0,1.568,0,2.427v36.459c0.265,0.221,0.506,0.465,0.725,0.734h6.187
                                            c0.2-0.25,0.423-0.477,0.669-0.678V1.387C37.124,1.185,36.9,0.959,36.701,0.71H30.514z M117.517,12.731
                                            c-0.232-0.189-0.439-0.64-0.781-0.734c-0.754-0.209-2.039,0-3.121,0h-3.176V4.435c-0.232-0.189-0.439-0.639-0.781-0.733
                                            c-0.719-0.2-1.969,0-3.01,0h-3.01c-0.238,0.273-0.625,0.431-0.725,0.847c-0.203,0.852,0,2.399,0,3.725
                                            c0,1.393,0.045,2.748-0.055,3.725h-6.41c-0.184,0.237-0.629,0.434-0.725,0.791c-0.178,0.654,0,1.813,0,2.765v2.766
                                            c0.232,0.188,0.439,0.64,0.779,0.733c0.777,0.216,2.109,0,3.234,0c1.154,0,2.291-0.045,3.176,0.057v21.277
                                            c0.232,0.189,0.439,0.639,0.781,0.734c0.719,0.199,1.969,0,3.01,0h3.01c1.008-0.451,0.725-1.889,0.725-3.443
                                            c-0.002-6.164-0.047-12.867,0.055-18.625h6.299c0.182-0.236,0.627-0.434,0.725-0.79c0.176-0.653,0-1.813,0-2.765V12.731z
                                            M135.851,18.262c0.201-0.746,0-2.029,0-3.104v-3.104c-0.287-0.245-0.434-0.637-0.781-0.733c-0.824-0.229-1.992-0.044-2.898,0
                                            c-2.158,0.104-4.506,0.675-5.74,1.411c-0.146-0.362-0.451-0.853-0.893-0.96c-0.693-0.169-1.859,0-2.842,0h-2.842
                                            c-0.258,0.319-0.625,0.42-0.725,0.79c-0.223,0.82,0,2.338,0,3.443c0,8.109-0.002,16.635,0,24.381
                                            c0.232,0.189,0.439,0.639,0.779,0.734c0.707,0.195,1.93,0,2.955,0h3.01c0.918-0.463,0.725-1.352,0.725-2.822V36.21
                                            c-0.002-3.902-0.242-9.117,0-12.473c0.297-4.142,3.836-4.877,8.527-4.686C135.312,18.816,135.757,18.606,135.851,18.262z
                                            M14.796,11.376c-5.472,0.262-9.443,3.178-11.76,7.056c-2.435,4.075-2.789,10.62-0.501,15.126c2.043,4.023,5.91,7.115,10.701,7.9
                                            c6.051,0.992,10.992-1.219,14.324-3.838c-0.687-1.1-1.419-2.664-2.118-3.951c-0.398-0.734-0.652-1.486-1.616-1.467
                                            c-1.942,0.787-4.272,2.262-7.134,2.145c-3.791-0.154-6.659-1.842-7.524-4.91h19.452c0.146-2.793,0.22-5.338-0.279-7.563
                                            C26.961,15.728,22.503,11.008,14.796,11.376z M9,23.284c0.921-2.508,3.033-4.514,6.298-4.627c3.083-0.107,4.994,1.976,5.685,4.627
                                            C17.119,23.38,12.865,23.38,9,23.284z M52.418,11.376c-5.551,0.266-9.395,3.142-11.76,7.056
                                            c-2.476,4.097-2.829,10.493-0.557,15.069c1.997,4.021,5.895,7.156,10.646,7.957c6.068,1.023,11-1.227,14.379-3.781
                                            c-0.479-0.896-0.875-1.742-1.393-2.709c-0.312-0.582-1.024-2.234-1.561-2.539c-0.912-0.52-1.428,0.135-2.23,0.508
                                            c-0.564,0.262-1.223,0.523-1.672,0.676c-4.768,1.621-10.372,0.268-11.537-4.176h19.451c0.668-5.443-0.419-9.953-2.73-13.037
                                            C61.197,13.388,57.774,11.12,52.418,11.376z M46.622,23.343c0.708-2.553,3.161-4.578,6.242-4.686
                                            c3.08-0.107,5.08,1.953,5.686,4.686H46.622z M160.371,15.497c-2.455-2.453-6.143-4.291-10.869-4.064
                                            c-2.268,0.109-4.297,0.65-6.02,1.524c-1.719,0.873-3.092,1.957-4.234,3.217c-2.287,2.519-4.164,6.004-3.902,11.007
                                            c0.248,4.736,1.979,7.813,4.627,10.326c2.568,2.439,6.148,4.254,10.867,4.064c4.457-0.18,7.889-2.115,10.199-4.684
                                            c2.469-2.746,4.012-5.971,3.959-11.063C164.949,21.134,162.732,17.854,160.371,15.497z M149.558,33.952
                                            c-3.246-0.221-5.701-2.615-6.41-5.418c-0.174-0.689-0.26-1.25-0.4-2.166c-0.035-0.234,0.072-0.523-0.045-0.77
                                            c0.682-3.698,2.912-6.257,6.799-6.547c2.543-0.189,4.258,0.735,5.52,1.863c1.322,1.182,2.303,2.715,2.451,4.967
                                            C157.789,30.669,154.185,34.267,149.558,33.952z M88.812,29.55c-1.232,2.363-2.9,4.307-6.13,4.402
                                            c-4.729,0.141-8.038-3.16-8.025-7.563c0.004-1.412,0.324-2.65,0.947-3.726c1.197-2.061,3.507-3.688,6.633-3.612
                                            c3.222,0.079,4.966,1.708,6.632,3.668c1.328-1.059,2.529-1.948,3.9-2.99c0.416-0.315,1.076-0.688,1.227-1.072
                                            c0.404-1.031-0.365-1.502-0.891-2.088c-2.543-2.835-6.66-5.377-11.704-5.137c-6.02,0.288-10.218,3.697-12.484,7.846
                                            c-1.293,2.365-1.951,5.158-1.729,8.408c0.209,3.053,1.191,5.496,2.619,7.508c2.842,4.004,7.385,6.973,13.656,6.377
                                            c5.976-0.568,9.574-3.936,11.816-8.354c-0.141-0.271-0.221-0.604-0.336-0.902C92.929,31.364,90.843,30.485,88.812,29.55z">
                                        </path>
                                    </svg>
                                </a>
                                <!-- End Logo -->

                                <!-- List -->
                                <ul id="headerSidebarList" class="u-header-collapse__nav">
                                    <!-- Value of the Day -->
                                    <li class="">
                                        <a class="u-header-collapse__nav-link font-weight-bold" href="#">Value of the Day</a>
                                    </li>
                                    <!-- End Value of the Day -->

                                    <!-- Top 100 Offers -->
                                    <li class="">
                                        <a class="u-header-collapse__nav-link font-weight-bold" href="#">Top 100 Offers</a>
                                    </li>
                                    <!-- End Top 100 Offers -->

                                    <!-- New Arrivals -->
                                    <li class="">
                                        <a class="u-header-collapse__nav-link font-weight-bold" href="#">New Arrivals</a>
                                    </li>
                                    <!-- End New Arrivals -->

                                    <!-- Computers & Accessories -->
                                    <li class="u-has-submenu u-header-collapse__submenu">
                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarComputersCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarComputersCollapse">
                                            Computers & Accessories
                                        </a>

                                        <div id="headerSidebarComputersCollapse" class="collapse" data-parent="#headerSidebarContent">
                                            <ul class="u-header-collapse__nav-list">
                                                <li><span class="u-header-sidebar__sub-menu-title">Computers &amp; Accessories</span></li>
                                                <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">All Computers & Accessories</a></li>
                                                <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Laptops, Desktops & Monitors</a></li>
                                                <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Printers & Ink</a></li>
                                                <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Networking & Internet Devices</a></li>
                                                <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Computer Accessories</a></li>
                                                <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Software</a></li>
                                                <li><span class="u-header-sidebar__sub-menu-title">Office & Stationery</span></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Office & Stationery</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Electronics</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- End Computers & Accessories -->

                                    <!-- Cameras, Audio & Video -->
                                    <li class="u-has-submenu u-header-collapse__submenu">
                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarCamerasCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarCamerasCollapse">
                                            Cameras, Audio & Video
                                        </a>

                                        <div id="headerSidebarCamerasCollapse" class="collapse" data-parent="#headerSidebarContent">
                                            <ul class="u-header-collapse__nav-list">
                                                <li><span class="u-header-sidebar__sub-menu-title">Cameras & Photography</span></li>
                                                <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Lenses</a></li>
                                                <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Camera Accessories</a></li>
                                                <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Security & Surveillance</a></li>
                                                <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Binoculars & Telescopes</a></li>
                                                <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Camcorders</a></li>
                                                <li class=""><a class="u-header-collapse__submenu-nav-link" href="#">Software</a></li>
                                                <li><span class="u-header-sidebar__sub-menu-title">Audio & Video</span></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Audio & Video</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Headphones & Speakers</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Electronics</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- End Cameras, Audio & Video -->

                                    <!-- Mobiles & Tablets -->
                                    <li class="u-has-submenu u-header-collapse__submenu">
                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarMobilesCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarMobilesCollapse">
                                            Mobiles & Tablets
                                        </a>

                                        <div id="headerSidebarMobilesCollapse" class="collapse" data-parent="#headerSidebarContent">
                                            <ul class="u-header-collapse__nav-list">
                                                <li><span class="u-header-sidebar__sub-menu-title">Mobiles & Tablets</span></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Mobile Phones</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Smartphones</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Refurbished Mobiles</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Cases & Covers</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Mobile Accessories</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Cases & Covers</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Tablets</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Tablet Accessories</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Electronics</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- End Mobiles & Tablets -->

                                    <!-- Movies, Music & Video -->
                                    <li class="u-has-submenu u-header-collapse__submenu">
                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarMoviesCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarMoviesCollapse">
                                            Movies, Music & Video
                                        </a>

                                        <div id="headerSidebarMoviesCollapse" class="collapse" data-parent="#headerSidebarContent">
                                            <ul class="u-header-collapse__nav-list">
                                                <li><span class="u-header-sidebar__sub-menu-title">Movies & TV Shows</span></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Movies & TV Shows</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All English</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Hindi</a></li>
                                                <li><span class="u-header-sidebar__sub-menu-title">Video Games</span></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">PC Games</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Consoles</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Accessories</a></li>
                                                <li><span class="u-header-sidebar__sub-menu-title">Music</span></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Music</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Indian Classical</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Musical Instruments</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- End Movies, Music & Video -->

                                    <!-- TV & Audio -->
                                    <li class="u-has-submenu u-header-collapse__submenu">
                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarTvCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarTvCollapse">
                                            TV & Audio
                                        </a>

                                        <div id="headerSidebarTvCollapse" class="collapse" data-parent="#headerSidebarContent">
                                            <ul class="u-header-collapse__nav-list">
                                                <li><span class="u-header-sidebar__sub-menu-title">Audio & Video</span></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Audio & Video</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Televisions</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Headphones</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Speakers</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Audio & Video Accessories</a></li>
                                                <li><span class="u-header-sidebar__sub-menu-title">Music</span></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Televisions</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Headphones</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Electro Home Appliances</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- End TV & Audio -->

                                    <!-- Watches & Eyewear -->
                                    <li class="u-has-submenu u-header-collapse__submenu">
                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarWatchesCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarWatchesCollapse">
                                            Watches & Eyewear
                                        </a>

                                        <div id="headerSidebarWatchesCollapse" class="collapse" data-parent="#headerSidebarContent">
                                            <ul class="u-header-collapse__nav-list">
                                                <li><span class="u-header-sidebar__sub-menu-title">Watches</span></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Watches</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Men's Watches</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Women's Watches</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Premium Watches</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Deals on Watches</a></li>
                                                <li><span class="u-header-sidebar__sub-menu-title">Eyewear</span></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Men's Sunglasses</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- End Watches & Eyewear -->

                                    <!-- Car, Motorbike & Industrial -->
                                    <li class="u-has-submenu u-header-collapse__submenu">
                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarCarCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarCarCollapse">
                                            Car, Motorbike & Industrial
                                        </a>

                                        <div id="headerSidebarCarCollapse" class="collapse" data-parent="#headerSidebarContent">
                                            <ul class="u-header-collapse__nav-list">
                                                <li><span class="u-header-sidebar__sub-menu-title">Car & Motorbike</span></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Cars & Bikes</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Car & Bike Care</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Lubricants</a></li>
                                                <li><span class="u-header-sidebar__sub-menu-title">Shop for Bike</span></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Helmets & Gloves</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Bike Parts</a></li>
                                                <li><span class="u-header-sidebar__sub-menu-title">Industrial Supplies</span></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Industrial Supplies</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Lab & Scientific</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- End Car, Motorbike & Industrial -->

                                    <!-- Accessories -->
                                    <li class="u-has-submenu u-header-collapse__submenu">
                                        <a class="u-header-collapse__nav-link u-header-collapse__nav-pointer" href="javascript:;" data-target="#headerSidebarAccessoriesCollapse" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="headerSidebarAccessoriesCollapse">
                                            Accessories
                                        </a>

                                        <div id="headerSidebarAccessoriesCollapse" class="collapse" data-parent="#headerSidebarContent">
                                            <ul class="u-header-collapse__nav-list">
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Cases</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Chargers</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Headphone Accessories</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Headphone Cases</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Headphones</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">All Industrial Supplies</a></li>
                                                <li><a class="u-header-collapse__submenu-nav-link" href="#">Lab & Scientific</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <!-- End Accessories -->
                                </ul>
                                <!-- End List -->
                            </div>
                        </div>
                        <!-- End Content -->
                    </div>
                    <!-- Footer -->
                    <footer id="SVGwaveWithDots" class="svg-preloader u-header-sidebar__footer">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item pr-3">
                                <a class="u-header-sidebar__footer-link text-gray-90" href="#">Privacy</a>
                            </li>
                            <li class="list-inline-item pr-3">
                                <a class="u-header-sidebar__footer-link text-gray-90" href="#">Terms</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="u-header-sidebar__footer-link text-gray-90" href="#">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </li>
                        </ul>

                        <!-- SVG Background Shape -->
                        <div class="position-absolute right-0 bottom-0 left-0 z-index-n1">
                            <img class="js-svg-injector" src="https://transvelo.github.io/electro-html/2.0/assets/svg/components/wave-bottom-with-dots.svg" alt="Image Description"
                            data-parent="#SVGwaveWithDots">
                        </div>
                        <!-- End SVG Background Shape -->
                    </footer>
                    <!-- End Footer -->
                </div>
            </div>
        </aside>
        <!-- ========== END HEADER SIDEBAR ========== -->

        <!-- Account Sidebar Navigation -->
        <aside id="sidebarContent" class="u-sidebar" aria-labelledby="sidebarNavToggler">
            <div class="u-sidebar__scroller">
                <div class="u-sidebar__container">
                    <div class="js-scrollbar u-header-sidebar__footer-offset pb-3">
                        <!-- Toggle Button -->
                        <div class="d-flex align-items-center pt-4 px-7">
                            <button type="button" class="close ml-auto"
                                aria-controls="sidebarContent"
                                aria-haspopup="true"
                                aria-expanded="false"
                                data-unfold-event="click"
                                data-unfold-hide-on-scroll="false"
                                data-unfold-target="#sidebarContent"
                                data-unfold-type="css-animation"
                                data-unfold-animation-in="fadeInRight"
                                data-unfold-animation-out="fadeOutRight"
                                data-unfold-duration="500">
                                <i class="ec ec-close-remove"></i>
                            </button>
                        </div>
                        <!-- End Toggle Button -->

                        <!-- Content -->
                        <div class="js-scrollbar u-sidebar__body">
                            <div class="u-sidebar__content u-header-sidebar__content">
                                <form class="js-validate">
                                    <!-- Login -->
                                    <div id="login" data-target-group="idForm">
                                        <!-- Title -->
                                        <header class="text-center mb-7">
                                        <h2 class="h4 mb-0">Welcome Back!</h2>
                                        <p>Login to manage your account.</p>
                                        </header>
                                        <!-- End Title -->

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <div class="js-form-message js-focus-state">
                                                <label class="sr-only" for="signinEmail">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="signinEmailLabel">
                                                            <span class="fas fa-user"></span>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" id="signinEmail" placeholder="Email" aria-label="Email" aria-describedby="signinEmailLabel" required
                                                    data-msg="Please enter a valid email address."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <div class="js-form-message js-focus-state">
                                              <label class="sr-only" for="signinPassword">Password</label>
                                              <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signinPasswordLabel">
                                                        <span class="fas fa-lock"></span>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" name="password" id="signinPassword" placeholder="Password" aria-label="Password" aria-describedby="signinPasswordLabel" required
                                                   data-msg="Your password is invalid. Please try again."
                                                   data-error-class="u-has-error"
                                                   data-success-class="u-has-success">
                                              </div>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->

                                        <div class="d-flex justify-content-end mb-4">
                                            <a class="js-animation-link small link-muted" href="javascript:;"
                                               data-target="#forgotPassword"
                                               data-link-group="idForm"
                                               data-animation-in="slideInUp">Forgot Password?</a>
                                        </div>

                                        <div class="mb-2">
                                            <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover">Login</button>
                                        </div>

                                        <div class="text-center mb-4">
                                            <span class="small text-muted">Do not have an account?</span>
                                            <a class="js-animation-link small" href="javascript:;"
                                               data-target="#signup"
                                               data-link-group="idForm"
                                               data-animation-in="slideInUp">Signup
                                            </a>
                                        </div>

                                        <div class="text-center">
                                            <span class="u-divider u-divider--xs u-divider--text mb-4">OR</span>
                                        </div>

                                        <!-- Login Buttons -->
                                        <div class="d-flex">
                                            <a class="btn btn-block btn-sm btn-soft-facebook transition-3d-hover mr-1" href="#">
                                              <span class="fab fa-facebook-square mr-1"></span>
                                              Facebook
                                            </a>
                                            <a class="btn btn-block btn-sm btn-soft-google transition-3d-hover ml-1 mt-0" href="#">
                                              <span class="fab fa-google mr-1"></span>
                                              Google
                                            </a>
                                        </div>
                                        <!-- End Login Buttons -->
                                    </div>

                                    <!-- Signup -->
                                    <div id="signup" style="display: none; opacity: 0;" data-target-group="idForm">
                                        <!-- Title -->
                                        <header class="text-center mb-7">
                                        <h2 class="h4 mb-0">Welcome to Electro.</h2>
                                        <p>Fill out the form to get started.</p>
                                        </header>
                                        <!-- End Title -->

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <div class="js-form-message js-focus-state">
                                                <label class="sr-only" for="signupEmail">Email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="signupEmailLabel">
                                                            <span class="fas fa-user"></span>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" id="signupEmail" placeholder="Email" aria-label="Email" aria-describedby="signupEmailLabel" required
                                                    data-msg="Please enter a valid email address."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Input -->

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <div class="js-form-message js-focus-state">
                                                <label class="sr-only" for="signupPassword">Password</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="signupPasswordLabel">
                                                            <span class="fas fa-lock"></span>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control" name="password" id="signupPassword" placeholder="Password" aria-label="Password" aria-describedby="signupPasswordLabel" required
                                                    data-msg="Your password is invalid. Please try again."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Input -->

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <div class="js-form-message js-focus-state">
                                            <label class="sr-only" for="signupConfirmPassword">Confirm Password</label>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="signupConfirmPasswordLabel">
                                                        <span class="fas fa-key"></span>
                                                    </span>
                                                </div>
                                                <input type="password" class="form-control" name="confirmPassword" id="signupConfirmPassword" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="signupConfirmPasswordLabel" required
                                                data-msg="Password does not match the confirm password."
                                                data-error-class="u-has-error"
                                                data-success-class="u-has-success">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Input -->

                                        <div class="mb-2">
                                            <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover">Get Started</button>
                                        </div>

                                        <div class="text-center mb-4">
                                            <span class="small text-muted">Already have an account?</span>
                                            <a class="js-animation-link small" href="javascript:;"
                                                data-target="#login"
                                                data-link-group="idForm"
                                                data-animation-in="slideInUp">Login
                                            </a>
                                        </div>

                                        <div class="text-center">
                                            <span class="u-divider u-divider--xs u-divider--text mb-4">OR</span>
                                        </div>

                                        <!-- Login Buttons -->
                                        <div class="d-flex">
                                            <a class="btn btn-block btn-sm btn-soft-facebook transition-3d-hover mr-1" href="#">
                                                <span class="fab fa-facebook-square mr-1"></span>
                                                Facebook
                                            </a>
                                            <a class="btn btn-block btn-sm btn-soft-google transition-3d-hover ml-1 mt-0" href="#">
                                                <span class="fab fa-google mr-1"></span>
                                                Google
                                            </a>
                                        </div>
                                        <!-- End Login Buttons -->
                                    </div>
                                    <!-- End Signup -->

                                    <!-- Forgot Password -->
                                    <div id="forgotPassword" style="display: none; opacity: 0;" data-target-group="idForm">
                                        <!-- Title -->
                                        <header class="text-center mb-7">
                                            <h2 class="h4 mb-0">Recover Password.</h2>
                                            <p>Enter your email address and an email with instructions will be sent to you.</p>
                                        </header>
                                        <!-- End Title -->

                                        <!-- Form Group -->
                                        <div class="form-group">
                                            <div class="js-form-message js-focus-state">
                                                <label class="sr-only" for="recoverEmail">Your email</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="recoverEmailLabel">
                                                            <span class="fas fa-user"></span>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" id="recoverEmail" placeholder="Your email" aria-label="Your email" aria-describedby="recoverEmailLabel" required
                                                    data-msg="Please enter a valid email address."
                                                    data-error-class="u-has-error"
                                                    data-success-class="u-has-success">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Form Group -->

                                        <div class="mb-2">
                                            <button type="submit" class="btn btn-block btn-sm btn-primary transition-3d-hover">Recover Password</button>
                                        </div>

                                        <div class="text-center mb-4">
                                            <span class="small text-muted">Remember your password?</span>
                                            <a class="js-animation-link small" href="javascript:;"
                                               data-target="#login"
                                               data-link-group="idForm"
                                               data-animation-in="slideInUp">Login
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Forgot Password -->
                                </form>
                            </div>
                        </div>
                        <!-- End Content -->
                    </div>
                </div>
            </div>
        </aside>
        <!-- End Account Sidebar Navigation -->
        <!-- ========== END SECONDARY CONTENTS ========== -->

        <!-- Go to Top -->
        <a class="js-go-to u-go-to" href="#"
            data-position='{"bottom": 15, "right": 15 }'
            data-type="fixed"
            data-offset-top="400"
            data-compensation="#header"
            data-show-effect="slideInUp"
            data-hide-effect="slideOutDown">
            <span class="fas fa-arrow-up u-go-to__inner"></span>
        </a>
        <!-- End Go to Top -->

        <!-- JS Global Compulsory -->
        <script src="{{asset('frontend')}}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{asset('frontend')}}/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
        <script src="{{asset('frontend')}}/vendor/popper.js/dist/umd/popper.min.js"></script>
        <script src="{{asset('frontend')}}/vendor/bootstrap/bootstrap.min.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="{{asset('frontend')}}/vendor/appear.js"></script>
        <script src="{{asset('frontend')}}/vendor/jquery.countdown.min.js"></script>
        <script src="{{asset('frontend')}}/vendor/hs-megamenu/src/hs.megamenu.js"></script>
        <script src="{{asset('frontend')}}/vendor/svg-injector/dist/svg-injector.min.js"></script>
        <script src="{{asset('frontend')}}/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="{{asset('frontend')}}/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="{{asset('frontend')}}/vendor/fancybox/jquery.fancybox.min.js"></script>
        <script src="{{asset('frontend')}}/vendor/typed.js/lib/typed.min.js"></script>
        <script src="{{asset('frontend')}}/vendor/slick-carousel/slick/slick.js"></script>
        <script src="{{asset('frontend')}}/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

        <!-- JS Electro -->
        <script src="{{asset('frontend')}}/js/hs.core.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.countdown.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.header.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.hamburgers.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.unfold.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.focus-state.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.malihu-scrollbar.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.validation.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.fancybox.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.onscroll-animation.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.slick-carousel.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.show-animation.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.svg-injector.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.go-to.js"></script>
        <script src="{{asset('frontend')}}/js/components/hs.selectpicker.js"></script>

        <!-- JS Plugins Init. -->
        <script>
            $(window).on('load', function () {
                // initialization of HSMegaMenu component
                $('.js-mega-menu').HSMegaMenu({
                    event: 'hover',
                    direction: 'horizontal',
                    pageContainer: $('.container'),
                    breakpoint: 767.98,
                    hideTimeOut: 0
                });
            });

            $(document).on('ready', function () {
                // initialization of header
                $.HSCore.components.HSHeader.init($('#header'));

                // initialization of animation
                $.HSCore.components.HSOnScrollAnimation.init('[data-animation]');

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                    afterOpen: function () {
                        $(this).find('input[type="search"]').focus();
                    }
                });

                // initialization of popups
                $.HSCore.components.HSFancyBox.init('.js-fancybox');

                // initialization of countdowns
                var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
                    yearsElSelector: '.js-cd-years',
                    monthsElSelector: '.js-cd-months',
                    daysElSelector: '.js-cd-days',
                    hoursElSelector: '.js-cd-hours',
                    minutesElSelector: '.js-cd-minutes',
                    secondsElSelector: '.js-cd-seconds'
                });

                // initialization of malihu scrollbar
                $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));

                // initialization of forms
                $.HSCore.components.HSFocusState.init();

                // initialization of form validation
                $.HSCore.components.HSValidation.init('.js-validate', {
                    rules: {
                        confirmPassword: {
                            equalTo: '#signupPassword'
                        }
                    }
                });

                // initialization of show animations
                $.HSCore.components.HSShowAnimation.init('.js-animation-link');

                // initialization of fancybox
                $.HSCore.components.HSFancyBox.init('.js-fancybox');

                // initialization of slick carousel
                $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

                // initialization of go to
                $.HSCore.components.HSGoTo.init('.js-go-to');

                // initialization of hamburgers
                $.HSCore.components.HSHamburgers.init('#hamburgerTrigger');

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'), {
                    beforeClose: function () {
                        $('#hamburgerTrigger').removeClass('is-active');
                    },
                    afterClose: function() {
                        $('#headerSidebarList .collapse.show').collapse('hide');
                    }
                });

                $('#headerSidebarList [data-toggle="collapse"]').on('click', function (e) {
                    e.preventDefault();

                    var target = $(this).data('target');

                    if($(this).attr('aria-expanded') === "true") {
                        $(target).collapse('hide');
                    } else {
                        $(target).collapse('show');
                    }
                });

                // initialization of unfold component
                $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

                // initialization of select picker
                $.HSCore.components.HSSelectPicker.init('.js-select');
            });
        </script>
        @stack('script')
    </body>
</html>
