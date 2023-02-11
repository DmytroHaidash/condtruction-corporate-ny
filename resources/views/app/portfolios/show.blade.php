<!-- Single Portfolio -->
@extends('layouts.app', ['page_title'=> $portfolio->title])

@section('content')
    <section id="single-portfolio" class="page-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">@lang('breadcrumb.main')</a></li>
                            <li class="breadcrumb-item"><a
                                        href="{{route('app.portfolios.index')}}">@lang('breadcrumb.portfolio')</a></li>
                            <li class="breadcrumb-item active">{{$portfolio->title}}</li>
                        </ol>
                    </nav>
                    <div class="logo">
                        <svg width="865" height="120">
                            <use xlink:href="#page-logo"></use>
                        </svg>
                    </div>
                    <a href="{{url()->previous()}}" class="back-navigation">
                        @lang('breadcrumb.back')
                    </a>
                </div>
            </div>
            <div class="row position-relative align-items-start">
                <div class="decor-bg"></div>
                <div class="col-sm-11 mx-auto">
                    <div class="portfolio-description">
                        <h1 class="title">
                            {{ $portfolio->title }}
                        </h1>
                        <div class="content">
                            <div class="logo">
                                <img src="{{$portfolio->getFirstMediaUrl('portfolio')}}" alt="logo">
                            </div>
                            <div class="description">
                                <div class="place">
                                    {{ $portfolio->content->address }}
                                </div>
                                {!! $portfolio->content->body !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <h3 class="section-title mb-4">
                        @lang('pages.portfolio.photo')
                    </h3>
                </div>

                @foreach($portfolio->getMedia('uploads') as $item )
                <div class="col-sm-4 px-0">
                    <a href="{{$item->getFullUrl()}}" data-fancybox="images" class="portfolio-gallery-item">
                        <div style="background-image: url({{$item->getFullUrl()}});"></div>
                    </a>
                </div>
                @endforeach

                @if($portfolio->video)
                <div class="col-12">
                    <h3 class="section-title mt-5 mb-4">
                        @lang('pages.portfolio.video')
                    </h3>
                </div>

                <div class="col-sm-4 px-0">
                    <a href="https://www.youtube.com/embed/{{ $portfolio->video_id }}" data-fancybox="video" class="portfolio-gallery-item">
                        <div style="background-image:url({{ $portfolio->videoImage }});"></div>
                    </a>
                </div>
                @endif
            </div>
        </div>
    </section>
    {{--@include('partials.app.sections.feedback-secondary')--}}
@endsection

@section('meta')
    @includeIf('partials.app.layout.meta', ['meta' => $portfolio->meta()->first()])
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ $portfolio->preview }}">
    <meta property="article:author" content="Green estate">
@endsection