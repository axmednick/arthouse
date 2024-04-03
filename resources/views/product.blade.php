@extends('layouts.app')
@section('content')
    <main>

        <!-- page title area start -->
        <section class="page__title p-relative d-flex align-items-center" data-background="{{$product->getFirstMediaUrl('main_image')}}" style="background-image: url(&quot;/assets/img/page-title/page-title-1.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page__title-inner text-center">
                            <h1>{{$product->name}}</h1>
                            <div class="page__title-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{route('index')}}">Əsas səhifə</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> {{$product->name}}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->


        <section class="shop__area pb-65">
            <div class="shop__top grey-bg-6 pt-100 pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="product__modal-box d-flex">
                                <div class="product__modal-nav mr-20">

                                </div>
                                <div class="tab-content mb-20" id="product-detailsContent">
                                    <div class="tab-pane fade active show" id="pro-two" role="tabpanel" aria-labelledby="pro-two-tab">
                                        <div class="product__modal-img product__thumb w-img">
                                            <img src="{{$product->getFirstMediaUrl('main_image')}}" alt="">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="product__modal-content product__modal-content-2">
                                <h4><a >{{$product->name}}</a></h4>

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
                                <div class="product__modal-des mb-30">
                                    <p>{{$product->description}}</p>
                                </div>

                                <div class="product__tag mb-25">
                                    <span>Category:</span>
                                    <span><a href="#">{{$product->category->name}}</a></span>

                                </div>
                                <div class="pro-cart-btn">
                                    <a  class="add-cart-btn mb-20" data-toggle="modal" data-target="#exampleModal">Sifariş et</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- related products area start -->
        <section class="related__product pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section__title-wrapper text-center mb-55">
                            <div class="section__title mb-10">
                                <h2>Oxşar məhsullar</h2>
                            </div>
                            <div class="section__sub-title">
                                <p>Mirum est notare quam littera gothica quam nunc putamus parum claram!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($related_products as $related_product)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 custom-col-10">
                            <div class="product__wrapper mb-60">
                                <div class="product__thumb">
                                    <a href="{{route('product',$related_product->id)}}" class="w-img">
                                        <div class="productImg" style="background-image: url({{$product->getFirstMediaUrl('main_image','thumb')}})"></div>
                                    </a>

                                </div>
                                <div class="product__content p-relative">
                                    <div class="product__content-inner">
                                        <h4><a href="{{route('product',$related_product->id)}}">{{$related_product->name}}</a>
                                        </h4>
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
        </section>
        <!-- related products area end -->

        <!-- shop modal start -->

    </main>



@endsection
@section('footer')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sifariş</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{route('orderCreate')}}" method="POST" class="p-3">
                        @CSRF
                        @method('POST')
                        <div class="row">
                            <div class="col-md-12">

                                <label for="">Adınız, Soyadınız</label>
                                <input type="text" name="name" placeholder="Adınız,Soyadınız" class="form-control">
                                <br>
                                <label for="">Əlaqə nömrəsi</label>
                                <input type="text" name="phone" placeholder="Əlaqə nömrəniz" class="form-control">
                                <br>
                                <label for="">Sifariş olunan məhsul</label>
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <input type="text" disabled name="name" value="{{$product->name}}" class="form-control">

                            </div>



                        </div>

                        <div class="modal-footer">

                            <button type="submit"  class="btn btn-primary">Sifarişi təsdiqlə</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <script>
            $('#myModal').on('shown.bs.modal', function () {
                $('#myInput').trigger('focus')
            })
        </script>
@endsection
