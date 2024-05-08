@extends('layouts.app')
@section('content')
    <main>

        <!-- page title area start -->
        <section class="page__title p-relative d-flex align-items-center" data-background="assets/img/page-title/page-title-1.jpg" style="background-image: url(&quot;assets/img/page-title/page-title-1.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page__title-inner text-center">
                            <h1>{{@trans('content.blog')}}</h1>
                            <div class="page__title-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{route('index')}}">{{@trans('content.home')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{@trans('content.blog')}}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- blog area start -->
        <section class="blog__area pt-100 pb-100">
            <div class="container">
                <div class="row">

                    @foreach($blogs as $blog)
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="blog__wrapper">
                            <div class="blog__item mb-60">
                                <div class="blog__thumb fix">
                                    <a href="{{route('blog',$blog->id)}}" class="w-img"><img src="{{$blog->getFirstMediaUrl('image')}}" alt="blog"></a>
                                </div>
                                <div class="blog__content">
                                    <h4><a href="{{route('blog',$blog->id)}}">{{$blog->title}}</a></h4>
                                    <div class="blog__meta">

                                        <span>{{$blog->created_at->format('Y-m-d')}}</span>
                                    </div>
                                    <p>
                                        {{$blog->description}}
                                    </p>
                                    <a href="{{route('blog',$blog->id)}}" class="os-btn">{{@trans('content.readMore')}}</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    @endforeach


                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="shop-pagination-wrapper">
                            <div class="basic-pagination">
                                <ul>
                                    <li><a href="#"><i class="fal fa-angle-left"></i></a></li>
                                    <li><a href="#">01</a></li>
                                    <li class="active"><a href="#">02</a></li>
                                    <li><a href="#">03</a></li>
                                    <li><a href="#"><i class="fas fa-ellipsis-h"></i></a></li>
                                    <li><a href="#"><i class="fal fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog area end -->
    </main>
@endsection
