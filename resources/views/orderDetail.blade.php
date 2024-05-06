@extends('layouts.app')
@section('content')
    <main>

        <!-- page title area start -->
        <section class="page__title p-relative d-flex align-items-center" data-background="assets/img/page-title/page-title-1.jpg" style="background-image: url(&quot;assets/img/page-title/page-title-1.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page__title-inner text-center">
                            <h1>Checkout</h1>
                            <div class="page__title-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> Checkout</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- coupon-area start -->
        <section class="coupon-area pt-100 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="coupon-accordion">
                            <!-- ACCORDION START -->
                            @if(!auth()->check())
                            <h3>Siz bizim daimi müştərimizsiz? Hesabınız varsa daxil olun və endirim əldə edin <span id="showlogin"> <a
                                        href="{{route('loginForm')}}"> Daxil olun</a></span></h3>
                            @endif

                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
        </section>
        <!-- coupon-area end -->
        <!-- checkout-area start -->


        <section class="checkout-area pb-70">
            <div class="container">
                <form action="{{route('orderCreate')}}" method="POST">
                    @CSRF
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkbox-form">
                                <h3>Billing Details</h3>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Adınız, Soyadınız <span class="required">*</span></label>
                                            <input name="full_name" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Əlaqə nömrəniz <span class="required">*</span></label>
                                            <input name="phone" type="text" placeholder="">
                                        </div>
                                    </div>
                                    @foreach($products as $product)
                                    <input type="hidden" name="product_id[]" value="{{$product->id}}">
                                    @endforeach


                                </div>
                                <div class="different-address">


                                    <div class="order-notes">
                                        <div class="checkout-form-list">
                                            <label>Əlavə qeyd</label>
                                            <textarea id="checkout-mess" name="note" cols="30" rows="10" placeholder="Sifarişlə bağlı əlavə qeydlərinizi yazın"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="your-order mb-30 ">
                                <h3>Sifariş məlumatları</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="product-name">Məhsul sayı</th>
                                            <th class="product-total">{{count($products)}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                Məhsullar
                                            </td>
                                            <td class="product-total">
                                                @foreach($products as $product)
                                                <div >{{$product->name}} : <strong>{{$product->price}}₼</strong></div>
                                                @endforeach
                                            </td>
                                        </tr>

                                        </tbody>
                                        <tfoot>


                                        <tr class="order-total">
                                            <th>Cəmi</th>
                                            <td><strong><span class="amount">{{$totalPrice}} ₼</span></strong>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="payment-method">

                                    <div class="order-button-payment mt-20">
                                        <button type="submit" class="os-btn os-btn-black">Sifarişi təsdiqlə</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- checkout-area end -->
    </main>
@endsection
