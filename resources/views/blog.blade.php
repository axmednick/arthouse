@extends('layouts.app')
@section('content')
    <main>

        <!-- blog area start -->
        <section class="blog__area pt-55">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="postbox__title mb-55">
                            <h1><a href="{{route('blog',$blog->id)}}">{{$blog->title}}</a></h1>
                            <div class="blog__meta">

                                <span>{{$blog->created_at->format('Y-m-md')}}</span>
                            </div>
                        </div>
                        <div class="postbox__thumb w-img">
                            <img src="{{$blog->getFirstMediaUrl('image')}}" alt="">
                        </div>
                        <div class="postbox__wrapper mb-70">
                            <div class="postbox__text mt-65">
                                <p>
                                    {{$blog->description}}
                                </p>
                            </div>

                            <article class="postbox format-quote mt-45 mb-50">
                                <div class="postbox__text">
                                {!! $blog->content !!}
                                </div>
                            </article>

                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- blog area end -->
    </main>
@endsection
