<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ArtHouse</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="/assets/css/preloader.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/slick.css">
    <link rel="stylesheet" href="/assets/css/metisMenu.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="/assets/css/fontAwesome5Pro.css">
    <link rel="stylesheet" href="/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="/assets/css/default.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

<!-- prealoder area start -->
{{--<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="object" id="first_object"></div>
            <div class="object" id="second_object"></div>
            <div class="object" id="third_object"></div>
        </div>
    </div>
</div>--}}
<!-- prealoder area end -->

<!-- header area start -->
<header>
    <div id="header-sticky" class="header__area grey-bg">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
                    <div class="logo">
                        <a href="{{route('index')}}"><img src="/assets/img/logo/logo.png" width="125px" alt="logo"></a>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8">
                    <div class="header__right p-relative d-flex justify-content-between align-items-center">
                        <div class="main-menu d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li class="active "><a href="{{route('index')}}">Əsas səhifə</a></li>

                                    <li class="has-dropdown"><a href="{{route('products')}}">Məhsullar</a>
                                        <ul class="submenu transition-3">
                                            @foreach($categories   as $category)
                                                <li>
                                                    <a href="{{route('products')}}?category={{$category->id}}">{{$category->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="has-dropdown"><a style="color: #323232; cursor:pointer;" >Brendlər</a>
                                        <ul class="submenu transition-3">
                                            @foreach($brands   as $brand)
                                                <li>
                                                    <a  href="{{route('products')}}?brand={{$brand->id}}">{{$brand->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li><a href="{{route('blogs')}}">Bloq</a></li>
                                    <li><a href="{{route('contact')}}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu-btn d-lg-none">
                            <a href="javascript:void(0);" class="mobile-menu-toggle"><i class="fas fa-bars"></i></a>
                        </div>
                        <div class="header__action">

                            @php
                                $cartProductIds = request()->cookie('cart_product_ids');

                                $arrayIds = explode('-',$cartProductIds);

                              $arrayIds = array_filter($arrayIds, function($value) {
                                  return $value !== '';
                              });

                            $cardProducts = \App\Models\Product::whereIn('id',$arrayIds)->get();


                            @endphp


                            <ul>
                                <li><a href="{{route('loginForm')}}" class="fas fa-user"> </a></li>
                                <li><a href="javascript:void(0);" class="cart"><i class="ion-bag"></i> Səbət</a>
                                    <div class="mini-cart">
                                        <div class="mini-cart-inner">


                                            @if($arrayIds)
                                            <ul class="mini-cart-list">

                                                @foreach($cardProducts as $cardProduct)
                                                <li data-product-id="{{$cardProduct->id}}">
                                                    <div class="cart-img f-left">
                                                        <a href="{{route('product',$cardProduct->id)}}">
                                                            <img src="{{$cardProduct->getFirstMediaUrl('main_image','thumb')}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="cart-content f-left text-left">
                                                        <h5>
                                                            <a href="{{route('product',$cardProduct->id)}}">{{$cardProduct->name}}</a>
                                                        </h5>
                                                        <div class="cart-price">
                                                            <span class="ammount">1 <i class="fal fa-times del-icon" data-product-id="{{$cardProduct->id}}"></i></span>
                                                            <span class="price">{{$cardProduct->price}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="del-icon f-right mt-30">
                                                        <a href="#">
                                                            <i class="fal fa-times"></i>
                                                        </a>
                                                    </div>
                                                </li>
                                                @endforeach

                                            </ul>

                                            <div class="checkout-link">

                                                <a class="os-btn os-btn-black" href="{{route('order-detail')}}">Sifariş et</a>
                                            </div>
                                            @else
                                                <div>
                                                  Səbət boşdur
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li><a href="#" class="search-toggle"><i class="ion-ios-search-strong"></i> Search</a>
                                </li>
                                <li><a href="/az"> AZ</a></li>
                                <li><a href="/en">EN</a></li>
                                <li><a href="/ru">RU</a></li>
                            </ul>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header area end -->

<!-- scroll up area start -->
<div class="scroll-up" id="scroll" style="display: none;">
    <a href="javascript:void(0);"><i class="fas fa-level-up-alt"></i></a>
</div>
<!-- scroll up area end -->

<!-- search area start -->
<section class="header__search white-bg transition-3">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="header__search-inner text-center">
                    <form action="{{route('products')}}">
                        <div class="header__search-btn">
                            <a href="javascript:void(0);" class="header__search-btn-close"><i class="fal fa-times"></i></a>
                        </div>
                        <div class="header__search-header">
                            <h3>Search</h3>
                        </div>
                        <div class="header__search-categories">
                            <ul class="search-category">
                                @foreach($categories as $category)
                                    <li>
                                        <a href="{{route('products')}}?category={{$category->id}}">{{$category->name}}</a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>
                        <div class="header__search-input p-relative">
                            <input name="keyword" type="text" placeholder="Search for products... ">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</section>
<div class="body-overlay transition-3"></div>
<!-- search area end -->

<!-- extra info area start -->
<section class="extra__info transition-3">
    <div class="extra__info-inner">
        <div class="extra__info-close text-right">
            <a href="javascript:void(0);" class="extra__info-close-btn"><i class="fal fa-times"></i></a>
        </div>
        <!-- side-mobile-menu start -->
        <nav class="side-mobile-menu d-block d-lg-none">
            <ul id="mobile-menu-active">
                <li class="active "><a href="{{route('index')}}">Əsas səhifə</a></li>


                <li class="mega-menu has-dropdown"><a href="{{route('products')}}">Məhsullar</a>
                    <ul class="submenu transition-3" data-background="/assets/img/bg/mega-menu-bg.jpg">

                        <ul>
                            @foreach($categories   as $category)
                                <li><a href="{{route('products')}}?category={{$category->id}}">{{$category->name}}</a>
                                </li>
                            @endforeach
                        </ul>

                    </ul>
                </li>
                <li><a href="{{route('blogs')}}">Bloq</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </nav>
        <!-- side-mobile-menu end -->
    </div>
</section>
<div class="body-overlay transition-3"></div>
<!-- extra info area end -->
@yield('content')
<!-- footer area start -->
<section class="footer__area grey-bg p-relative">

    <div class="footer__bottom footer__bottom-2">
        <div class="container">
            <div class="footer__bottom-inner footer__bottom-inner-2">
                <div class="row">
                    <div class="col-xl-6 col-lg-7">
                        <div class="footer__copyright footer__copyright-2">
                            <p>Copyright © <a href="https://codemode.az">Codemode</a></p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5">
                        <div class="footer__social footer__social-2 f-right">
                            <ul>
                                @if($contact->facebook)
                                    <li><a href="{{$contact->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                @endif

                                @if($contact->instagram)
                                    <li><a href="{{$contact->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                @endif
                                @if($contact->youtube)
                                    <li><a href="{{$contact->youtube}}"><i class="fab fa-youtube"></i></a></li>
                                @endif
                                @if($contact->whatsapp)
                                    <li><a href="{{$contact->whatsapp}}"><i class="fab fa-whatsapp"></i></a></li>
                                @endif
                                @if($contact->linkedin)
                                    <li><a href="{{$contact->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- footer area end -->
<!-- JS here -->
<script src="/assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="/assets/js/vendor/waypoints.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>
<script src="/assets/js/metisMenu.min.js"></script>
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/jquery.fancybox.min.js"></script>
<script src="/assets/js/isotope.pkgd.min.js"></script>
<script src="/assets/js/owl.carousel.min.js"></script>
<script src="/assets/js/jquery-ui-slider-range.js"></script>
<script src="/assets/js/ajax-form.js"></script>
<script src="/assets/js/wow.min.js"></script>
<script src="/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="/assets/js/main.js"></script>
</body>


<script>
    $(document).ready(function () {
        $('.add-cart').on('click', function (e) {
            e.preventDefault();
            var productId = $(this).data('id');

            $.ajax({
                url: '/api/add-to-cart',
                type: 'POST',
                data: {
                    product_id: productId
                },
                success: function (response) {
                    $.ajax({
                        url: '/api/get-product-details',
                        type: 'POST',
                        data: {
                            product_id: productId
                        },
                        success: function (response) {
                            updateMiniCart(response.product);
                            location.reload(); // Səhifəni yenilə
                        },
                        error: function (xhr, status, error) {
                            console.error(error);
                        }
                    });
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });


        // Sepetten ürünü kaldırmak için işlev
        $(document).on('click', '.del-icon', function (e) {
            e.preventDefault();
            var listItem = $(this).closest('li');
            var productId = listItem.data('product-id');



            listItem.remove();
            removeProductFromCookie(productId);
        });

        function updateMiniCart(product) {
            var listItem = '<li data-product-id="' + product.id + '">' +
                '<div class="cart-img f-left">' +
                '<a href="product-details.html">' +
                '<img src="' + product.image + '" alt="">' +
                '</a>' +
                '</div>' +
                '<div class="cart-content f-left text-left">' +
                '<h5>' +
                '<a href="product-details.html">' + product.name + '</a>' +
                '</h5>' +
                '<div class="cart-price">' +
                '<span class="ammount">1 <i class="fal fa-times"></i></span>' +
                '<span class="price">$' + product.price + '</span>' +
                '</div>' +
                '</div>' +
                '<div class="del-icon f-right mt-30">' +
                '<a href="#">' +
                '<i class="fal fa-times"></i>' +
                '</a>' +
                '</div>' +
                '</li>';

            $('.mini-cart-list').append(listItem);
        }

        function saveProductToCookie(productId) {
            var existingProducts = getProductsFromCookie();
            existingProducts.push(productId);
            var uniqueProducts = [...new Set(existingProducts)];
            document.cookie = "cart_product_ids=" + uniqueProducts.join('-') + "; path=/";
        }

        function removeProductFromCookie(productId) {
            var cartCookie = document.cookie.split(';').find(cookie => cookie.trim().startsWith('cart_product_ids='));

            if (cartCookie) {
                var products = cartCookie.split('=')[1].split('-');
                var updatedProducts = products.filter(id => id !== String(productId)); // productId string formatında olduğundan emin olunmalıdır

                if(updatedProducts.length > 0){
                    document.cookie = "cart_product_ids=" + updatedProducts.join('-') + "; path=/";
                } else {
                    document.cookie = "cart_product_ids=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
                }

                location.reload(); // Səhifəni yenilə
            }
        }





    });
</script>


@yield('footer')

</html>
