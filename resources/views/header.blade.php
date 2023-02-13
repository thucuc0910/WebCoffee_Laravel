<header class="header-v2">
    @php $menusHtml = \App\Helpers\Helper::menus($menus); @endphp


    <!-- Header desktop -->
    <div class="container-menu-desktop trans-03">
        <div class="wrap-menu-desktop" style="top: -10px;">
            <nav class="limiter-menu-desktop p-l-45">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <img src="/template/admin/dist/img/logo_coffee.png" alt="" value="">
                    <p>Coffee & Tea </p>

                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="/">TRANG CHỦ</a>

                        </li>

                        {!! $menusHtml !!}

                        <li>
                            <a href="{{asset('/discount')}}">KHUYẾN MÃI</a>
                        </li>

                        <!-- <li>
                            <a href="{{asset('/contact')}}#">LIÊN HỆ</a>
                        </li> -->
                    </ul>
                </div>

                <!-- Icon header -->


                <div class="wrap-icon-header flex-w flex-r-m ">
                    <!-- <div class=" p-r-24">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>
                    </div> -->

                    <div class="searchbox">
                        <form action="/search" method="POST">
                        @csrf

                            <input type="" name="keywords" placeholder="Tìm kiếm..." />
                            <button class="submit"></button>

                            <div class="line"></div>
                        </form>

                    </div>


                    <!-- <form class="wrap-search-header flex-w p-l-15" action="/search" method="POST">
                        @csrf
                        <button class="flex-c-m trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                        <input class="ltext-102" style="color: gray; font-size: 20px" type="text" name="keywords" placeholder="Tìm kiếm...">
                    </form> -->


                    <!-- 
                    <div class="navbar navbar-expand-sm navbar-dark">
                        <form class="form-inline" method="" action="">
                            <input class="form-control mr-sm-2" type="text" placeholder="Tìm mã hoặc tên..." name="search" >
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search" id="search-icon"></i></button>
                        </form>
                    </div> -->






                    <div class="flex-c-m h-full p-l-18 p-r-25 bor5">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                    </div>

                    <div class="flex-c-m h-full p-l-18 p-r-25 bor5">

                        <div class="icons row d-inline-flex right ">
                            <i class="zmdi zmdi-account icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-toggle="dropdown"></i>
                            <div class="dropdown-menu">
                                @if(Auth::check())
                                <a class="dropdown-item" href="#">{{Auth::user()->full_name}}</a>
                                <a class="dropdown-item" href="/history/{{Auth::user()->id}}">Đơn mua</a>

                                <a class="dropdown-item" href="/logout">Đăng xuất</a>

                                <!-- <a class="dropdown-item" href="/register">Đăng ký</a> -->
                                @else
                                <a class="dropdown-item" href="/login" style="font-weight: bold;">Đăng nhập</a>
                                <a class="dropdown-item" href="/register" style="font-weight: bold;">Đăng ký</a>

                                @endif



                            </div>

                        </div>

                    </div>



                    <!-- <div class="flex-c-m h-full p-lr-19">
                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-sidebar">
                            <i class="zmdi zmdi-menu"></i>
                        </div>
                    </div> -->
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="">
                <img src="/template/admin/dist/img/logo_coffee.png" alt="" value="">
                <p style="font-size: 25px ; font-weight:bold ; color: rgb(13,89,40) ; font-style:oblique; font-family: Arial Black; padding-left:30px">Coffee & Tea </p>
            </a>
        </div>


        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m  m-r-15">
            <div class="flex-c-m h-full p-r-10">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>
            </div>

            <div class="flex-c-m h-full p-lr-10 bor5">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                    <i class="zmdi zmdi-shopping-cart"></i>
                </div>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="main-menu-m">
            <li class="active-menu">
                <a href="/">TRANG CHỦ</a>

            </li>

            {!! $menusHtml !!}

            <!-- <li>
                <a href="#">LIÊN HỆ</a>
            </li> -->

            <li>

                @if(Auth::check())
                <a href="#">{{Auth::user()->full_name}}</a>
                <a href="/history/{{Auth::user()->id}}">Đơn mua</a>

                <a href="/logout">Đăng xuất</a>

                <!-- <a class="dropdown-item" href="/register">Đăng ký</a> -->
                @else
                <a href="/login" style="font-weight: bold;">Đăng nhập</a>
                <a href="/register" style="font-weight: bold;">Đăng ký</a>

                @endif



    </div>

    </div>
    </li>
    </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-02 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-01 js-hide-modal-search">
                <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15" action="/search" method="POST">
                @csrf
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="ltext-102" style="color: gray; font-size: 20px" type="text" name="keywords" placeholder="Tìm kiếm...">
            </form>
        </div>
    </div>

    <!-- <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="/template/images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div> -->
</header>