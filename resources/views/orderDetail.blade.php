@extends('layouts.app')
@section('content')
    <main>

        <!-- page title area start -->
        <section class="page__title p-relative d-flex align-items-center" data-background="assets/img/page-title/page-title-1.jpg" style="background-image: url(&quot;assets/img/page-title/page-title-1.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page__title-inner text-center">
                            <h1>{{@trans('content.order')}}</h1>
                            <div class="page__title-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{route('index')}}">{{@trans('home.content')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> {{@trans('content.order')}}</li>
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
                            <h3>{{@trans('content.discountText')}}<span id="showlogin"> <a
                                        href="{{route('loginForm')}}"> {{@trans('content.login')}}</a></span></h3>
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
                                            <label>{{@trans('content.nameSurname')}} <span class="required">*</span></label>
                                            <input name="full_name" type="text" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>{{@trans('content.phone')}} <span class="required">*</span></label>
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
                                            <label>{{trans('content.note')}}</label>
                                            <textarea id="checkout-mess" name="note" cols="30" rows="10" placeholder="{{@trans('content.noteDescription')}}"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="your-order mb-30 ">
                                <h3>{{@trans('content.orderInformation')}}</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="product-name">{{@trans('content.productCount')}}</th>
                                            <th class="product-total">{{count($products)}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{@trans('content.products')}}
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
                                            <th>{{@trans('content.total')}}</th>
                                            <td><strong><span class="amount">{{$totalPrice}} ₼</span></strong>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="payment-method">

                                    <div class="order-button-payment mt-20">
                                        <button type="submit" class="os-btn os-btn-black">{{@trans('content.orderConfirmation')}}</button>
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
