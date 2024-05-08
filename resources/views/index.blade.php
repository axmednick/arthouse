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
                                                    <a href="{{$banner->link}}" class="link-btn">{{@trans('content.readMore')}}</a>
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
                                                    <h2>{{@trans('content.trendProducts')}}</h2>
                                                </div>
                                                <div class="section__sub-title">
                                                    <p>{{@trans('content.trendProductsDescription')}}</p>
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
                                                <a href="{{route('products')}}" class="os-btn os-btn-3">{{@trans('content.allProducts')}}</a>
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
                                                    <h2>{{@trans('content.blogsTitle')}}</h2>
                                                </div>
                                                <div class="section__sub-title">
                                                    <p>{{@trans('content.blogsDescription')}}</p>
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
                                                        <a href="{{route('blog',$blog->id)}}" class="os-btn">{{@trans('content.readMore')}}</a>
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

    </main>
@endsection
