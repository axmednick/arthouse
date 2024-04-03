@extends('layouts.app')
@section('content')
    <main>

        <!-- page title area start -->
        <section class="page__title p-relative d-flex align-items-center"
                 data-background="/assets/img/page-title/page-title-2.jpg"
                 style="background-image: url(&quot;assets/img/page-title/page-title-2.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page__title-inner text-center">
                            <h1>Bizimlə əlaqə</h1>
                            <div class="page__title-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Əlaqə</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- contact area start -->
        <section class="contact__area pb-100 pt-95">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact__info">
                            <h3>Bizimlə əlaqə</h3>
                            <ul class="mb-55">
                                <li class="d-flex mb-35">
                                    <div class="contact__info-icon mr-20">
                                        <i class="fal fa-map-marker-alt"></i>
                                    </div>
                                    <div class="contact__info-content">
                                        <h6>Ünvan:</h6>
                                        <span>{{$contact->address}}</span>
                                    </div>
                                </li>
                                <li class="d-flex mb-35">
                                    <div class="contact__info-icon mr-20">
                                        <i class="fal fa-envelope-open-text"></i>
                                    </div>
                                    <div class="contact__info-content">
                                        <h6>Email:</h6>
                                        <span><a href="mailto:{{$contact->email}}" class="__cf_email__"
                                                 data-cfemail="36755958425755427653445358425e535b531855595b">{{$contact->email}}</a></span>
                                    </div>
                                </li>
                                <li class="d-flex mb-35">
                                    <div class="contact__info-icon mr-20">
                                        <i class="fal fa-phone-alt"></i>
                                    </div>
                                    <div class="contact__info-content">
                                        <h6>Telefon</h6>
                                        <span>{{$contact->phone}}</span>
                                    </div>
                                </li>
                            </ul>


                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <p>Outstock is a premium Templates theme with advanced admin module. It’s extremely
                            customizable, easy to use and fully responsive and retina ready. Vel illum dolore eu feugiat
                            nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                            luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>

                        <hr>
                        <div class="contact__social">
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
                                @if($contact->linkedin)
                                    <li><a href="{{$contact->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                                @endif
                                @if($contact->whatsapp)
                                    <li><a href="{{$contact->whatsapp}}"><i class="fab fa-whatsapp"></i></a></li>
                                @endif


                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- contact area end -->

        <!-- contact map area start -->
        <section class="contact__map">
            <div class="container-fluid p-0">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="contact__map-wrapper p-relative">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3038.884081348799!2d49.85654291146607!3d40.389261671324974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40307d138167b411%3A0xfc6828a1dc7fd658!2zRW1pbGlhbmEgUGFyYXRpIERpdmFyIEthxJ_EsXrEsQ!5e0!3m2!1saz!2saz!4v1710804930282!5m2!1saz!2saz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact map area end -->

        <!-- subscribe area end -->
    </main>
@endsection
