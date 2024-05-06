@extends('layouts.app')
@section('content')
    <main>

        <div class="box-white grey-bg pt-50">
            <div class="container">
                <div class="box-white-inner">

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-md-2  ">
                                    <ul>
                                        @foreach($categories   as $category)
                                            <li class="left-menu"><a href="{{route('products')}}?category={{$category->id}}">{{$category->name}}</a></li>
                                        @endforeach




                                    </ul>
                                </div>

                                <div class="col-md-10 col-sm-12">
                                    <section class="slider__area slider__area-4 p-relative">
                                        <div class="slider-active">

                                            @foreach($sliders as $slider)
                                                <div class="single-slider single-slider-2 slider__height-4 d-flex align-items-center" data-background="{{$slider->getFirstMediaUrl('image')}}">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-xl-7 col-lg-7 col-md-9 col-sm-11 col-12">
                                                                <div class="slider__content slider__content-4">
                                                                    <h2 data-animation="fadeInUp" data-delay=".2s">{{$slider->title}}</h2>
                                                                    <p data-animation="fadeInUp" data-delay=".4s">{{$slider->description}}</p>
                                                                    @if($slider->link)
                                                                        <a href="{{$slider->link}}" class="os-btn os-btn-2" data-animation="fadeInUp" data-delay=".6s">Daha ətraflı</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </section>

                                </div>

                            </div>

                            <!-- slider area start -->




                            <!-- slider area end -->

                            <!-- banner area start -->
                            <div class="banner__area pt-20">
                                <div class="container custom-container">
                                    <div class="row">
                                        @foreach($banners as $banner)
                                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                            <div class="banner__item mb-30 p-relative">
                                                <div class="banner__thumb fix">
                                                    <a href="{{$banner->link}}" class="w-img"><img src="{{$banner->getFirstMediaUrl('image')}}" alt="banner"></a>
                                                </div>
                                                <div class="banner__content p-absolute transition-3">
                                                    <h5><a href="{{$banner->link}}">{{$banner->title}}</a></h5>
                                                    <a href="{{$banner->link}}" class="link-btn">Daha ətraflı</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- banner area end -->

                            <!-- product area start -->
                            <section class="product__area pt-60 pb-100">
                                <div class="container custom-container">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="section__title-wrapper text-center mb-55">
                                                <div class="section__title mb-10">
                                                    <h2>Trenddə olan məhsullarımız</h2>
                                                </div>
                                                <div class="section__sub-title">
                                                    <p>Ən son trendlərə uyğun seçilmiş məhsullarımızla evinizi yeniləyin!</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                                <div class="row">
                                                @foreach($products as $product)
                                                <div class="col-sm-4 col-6">
                                                    <div class="product__wrapper mb-60">
                                                        <div class="product__thumb">
                                                            <a href="{{route('product',$product->id)}}" class="w-img">
                                                                <div class="productImg" style="background-image: url({{ $product->getFirstMediaUrl('main_image', 'thumb') ?? '' }})"></div>
                                                            </a>

                                                        </div>
                                                        <div class="product__content p-relative">
                                                            <div class="product__content-inner">
                                                                <h4><a href="{{route('product',$product->id)}}">{{$product->name}}</a></h4>
                                                                @if(auth()->check() && auth()->user()->discount_percent!=0)

                                                                    <div class="product__price-2 mb-25">
                                                                        <span>{{$product->discounted_price}} ₼</span>
                                                                        <span class="old-price">{{$product->price}} ₼</span>
                                                                    </div>
                                                                @else
                                                                    <div class="product__price-2 mb-25">
                                                                        <span>{{$product->price}} ₼</span>

                                                                    </div>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="product__load-btn text-center mt-25">
                                                <a href="{{route('products')}}" class="os-btn os-btn-3">Bütün məhsullar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- product area end -->





                            <!-- blog area start -->
                            <section class="blog__area pb-70">
                                <div class="container custom-container">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="section__title-wrapper text-center mb-55">
                                                <div class="section__title mb-10">
                                                    <h2>Bloq yazılarımız</h2>
                                                </div>
                                                <div class="section__sub-title">
                                                    <p>Yaradıcı ideyalar və cari tendensiyalarla dolu blog yazılarımızı kəşf edin.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="blog__slider owl-carousel">
                                                @foreach($blogs as $blog)
                                                <div class="blog__item mb-30">
                                                    <div class="blog__thumb fix">
                                                        <a href="{{route('blog',$blog->id)}}" ><div class="productImg" style="background-image: url({{$blog->getFirstMediaUrl('image')}})"></div></a>
                                                    </div>
                                                    <div class="blog__content">
                                                        <h4><a href="{{route('blog',$blog->id)}}">{{$blog->title}}</a></h4>

                                                        <p>{{substr($blog->description,0,150)}}......</p>
                                                        <a href="{{route('blog',$blog->id)}}" class="os-btn">Daha ətraflı</a>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- blog area end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop modal start -->
        <!-- Modal -->
        <div class="modal fade" id="productModalId" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered product-modal" role="document">
                <div class="modal-content">
                    <div class="product__modal-wrapper p-relative">
                        <div class="product__modal-close p-absolute">
                            <button   data-dismiss="modal"><i class="fal fa-times"></i></button>
                        </div>
                        <div class="product__modal-inner">
                            <div class="row">
                                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
                                    <div class="product__modal-box">
                                        <div class="tab-content mb-20" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <div class="product__modal-img w-img">
                                                    <img src="assets/img/shop/product/quick-view/quick-big-1.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <div class="product__modal-img w-img">
                                                    <img src="assets/img/shop/product/quick-view/quick-big-2.jpg" alt="">
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                                <div class="product__modal-img w-img">
                                                    <img src="assets/img/shop/product/quick-view/quick-big-3.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <nav>
                                            <div class="nav nav-tabs justify-content-between" id="nav-tab" role="tablist">
                                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                                                    <div class="product__nav-img w-img">
                                                        <img src="assets/img/shop/product/quick-view/quick-sm-1.jpg" alt="">
                                                    </div>
                                                </a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                                                    <div class="product__nav-img w-img">
                                                        <img src="assets/img/shop/product/quick-view/quick-sm-2.jpg" alt="">
                                                    </div>
                                                </a>
                                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                                                    <div class="product__nav-img w-img">
                                                        <img src="assets/img/shop/product/quick-view/quick-sm-3.jpg" alt="">
                                                    </div>
                                                </a>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12">
                                    <div class="product__modal-content">
                                        <h4><a href="product-details.html">Wooden container Bowl</a></h4>
                                        <div class="rating rating-shop mb-15">
                                            <ul>
                                                <li><span><i class="fas fa-star"></i></span></li>
                                                <li><span><i class="fas fa-star"></i></span></li>
                                                <li><span><i class="fas fa-star"></i></span></li>
                                                <li><span><i class="fas fa-star"></i></span></li>
                                                <li><span><i class="fal fa-star"></i></span></li>
                                            </ul>
                                            <span class="rating-no ml-10">
                                                    3 rating(s)
                                                </span>
                                        </div>
                                        <div class="product__price-2 mb-25">
                                            <span>$96.00</span>
                                            <span class="old-price">$96.00</span>
                                        </div>
                                        <div class="product__modal-des mb-30">
                                            <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
                                        </div>
                                        <div class="product__modal-form">
                                            <form action="#">
                                                <div class="product__modal-input size mb-20">
                                                    <label>Size <i class="fas fa-star-of-life"></i></label>
                                                    <select>
                                                        <option>- Please select -</option>
                                                        <option> S</option>
                                                        <option> M</option>
                                                        <option> L</option>
                                                        <option> XL</option>
                                                        <option> XXL</option>
                                                    </select>
                                                </div>
                                                <div class="product__modal-input color mb-20">
                                                    <label>Color <i class="fas fa-star-of-life"></i></label>
                                                    <select>
                                                        <option>- Please select -</option>
                                                        <option> Black</option>
                                                        <option> Yellow</option>
                                                        <option> Blue</option>
                                                        <option> White</option>
                                                        <option> Ocean Blue</option>
                                                    </select>
                                                </div>
                                                <div class="product__modal-required mb-5">
                                                    <span >Repuired Fiields *</span>
                                                </div>
                                                <div class="pro-quan-area d-lg-flex align-items-center">
                                                    <div class="product-quantity-title">
                                                        <label>Quantity</label>
                                                    </div>
                                                    <div class="product-quantity">
                                                        <div class="cart-plus-minus"><input type="text" value="1" /></div>
                                                    </div>
                                                    <div class="pro-cart-btn ml-20">
                                                        <a href="#" class="os-btn os-btn-black os-btn-3 mr-10">+ Add to Cart</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- shop modal end -->
    </main>
@endsection
