<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{url('')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{url('')}}/css/style.css" type="text/css">
    <!-- bs3 -->
    <link rel="stylesheet" href="{{url('')}}/css/bootstrap3.min.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
                            <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">0</div>
                            </a></li>
                            <li><a href="{{ route('cart.view') }}"><span class="icon_bag_alt"></span>
                                <div class="tip">{{$cart->totalQuantity}}</div>
                            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="{{route('home.index')}}"><img src="{{url('')}}/img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="{{route('home.index')}}"><img src="{{url('')}}/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="{{route('home.index')}}">Home</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('home.shop-cart')}}">Shop Cart</a></li>
                                    <li><a href="{{route('home.checkout')}}">Checkout</a></li>
                                    <li><a href="{{route('home.blog-details')}}">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('home.blog')}}">Blog</a></li>
                            <li><a href="{{route('home.contact')}}">Contact</a></li>
                            <li><a href="#">Category</a>
                                <ul class="dropdown">
                                @foreach($globalCats as $cat)
                    <li><a href="{{route('home.category', ['category'=> $cat->id, 'slug' => Str::slug($cat->name)])}}">{{$cat->name}}</a></li>
                                @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                    @if (!auth('cus')->check())
                            <a href="{{route('home.login')}}">Login</a>
                            <a href="{{route('home.register')}}">Register</a>

                    @else
                            <a>Hi: {{auth('cus')->user()->name}}</a>
                            <a href="{{ route('home.logout') }}">Logout</a>
                    @endif
                        </div>
                        <ul class="header__right__widget">
                            <!-- <li><span class="icon_search search-switch"></span></li> -->
                            <li><a href="#"><span class="icon_heart_alt"></span>
                                <div class="tip">0</div>
                            </a></li>
                            <li><a href="{{ route('cart.view') }}"><span class="icon_bag_alt"></span>
                                <div class="tip">{{$cart->totalQuantity}}</div>
                            </a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
<!-- Services Section End -->
<div class="container">
    <br>
        @if (Session::has('no'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('no')}}!</strong>
        </div>
        @endif
        @if (Session::has('yes'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{Session::get('yes')}}!</strong>
        </div>
        @endif
    </div>
@yield('main')
<!-- Instagram Begin -->
<div class="instagram">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{url('')}}/img/instagram/insta-1.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{url('')}}/img/instagram/insta-2.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{url('')}}/img/instagram/insta-3.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{url('')}}/img/instagram/insta-4.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{url('')}}/img/instagram/insta-5.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{url('')}}/img/instagram/insta-6.jpg">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Instagram End -->

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="./index.html"><img src="{{url('')}}/img/logo.png" alt=""></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    cilisis.</p>
                    <div class="footer__payment">
                        <a href="#"><img src="{{url('')}}/img/payment/payment-1.png" alt=""></a>
                        <a href="#"><img src="{{url('')}}/img/payment/payment-2.png" alt=""></a>
                        <a href="#"><img src="{{url('')}}/img/payment/payment-3.png" alt=""></a>
                        <a href="#"><img src="{{url('')}}/img/payment/payment-4.png" alt=""></a>
                        <a href="#"><img src="{{url('')}}/img/payment/payment-5.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h6>Quick links</h6>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h6>Account</h6>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Orders Tracking</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Wishlist</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8">
                <div class="footer__newslatter">
                    <h6>NEWSLETTER</h6>
                    <form action="#">
                        <input type="text" placeholder="Email">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <div class="footer__copyright__text">
                    <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
                </div>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="{{url('')}}/js/jquery-3.3.1.min.js"></script>
<script src="{{url('')}}/js/bootstrap.min.js"></script>
<script src="{{url('')}}/js/jquery.magnific-popup.min.js"></script>
<script src="{{url('')}}/js/jquery-ui.min.js"></script>
<script src="{{url('')}}/js/mixitup.min.js"></script>
<script src="{{url('')}}/js/jquery.countdown.min.js"></script>
<script src="{{url('')}}/js/jquery.slicknav.js"></script>
<script src="{{url('')}}/js/owl.carousel.min.js"></script>
<script src="{{url('')}}/js/jquery.nicescroll.min.js"></script>
<script src="{{url('')}}/js/main.js"></script>
<!-- jQuery -->
<script src="{{url('')}}/js/jquery.min.js"></script>
<!-- Bootstrap Js -->
<script src="{{url('')}}/js/bootstrap3.min.js"></script>
</html>