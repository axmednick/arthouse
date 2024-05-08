@extends('layouts.app')
@section('content')
    <main>

        <!-- page title area start -->
        <section class="page__title p-relative d-flex align-items-center" data-background="assets/img/page-title/page-title-1.jpg" style="background-image: url(&quot;assets/img/page-title/page-title-1.jpg&quot;);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page__title-inner text-center">
                            <h1>Login</h1>
                            <div class="page__title-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb justify-content-center">
                                        <li class="breadcrumb-item"><a href="{{route('index')}}">{{@trans('content.home')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page"> {{@trans('content.login')}}</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- page title area end -->

        <!-- login Area Strat-->
        <section class="login-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="basic-login">
                            <h3 class="text-center mb-60">{{@trans('content.login')}}</h3>
                            <form action="{{route('login')}}" method="POST">
                                @csrf
                                <label for="email">{{@trans('content.email')}} <span>**</span></label>
                                <input id="email" name="email" type="text" placeholder="Email address...">
                                <label for="pass">{{@trans('content.password')}} <span>**</span></label>
                                <input id="pass" name="password" type="password" placeholder="Enter password...">

                                <button class="os-btn w-100">{{@trans('content.login')}}</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- login Area End-->
    </main>
@endsection
