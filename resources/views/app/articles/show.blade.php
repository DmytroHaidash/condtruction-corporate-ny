@extends('layouts.app')

@section('content')
    <section id="single-article" class="page-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">@lang('breadcrumb.main')</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('app.articles.index') }}">@lang('breadcrumb.blog')</a></li>
                            <li class="breadcrumb-item active">{{ $article->title }}</li>
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
            <div class="row position-relative">
                <div class="decor-bg"></div>
                <div class="col-sm-10 mx-auto">
                    <div class="article-blog">
                        <div class="image">
                            <div>
                                <img src="{{ asset('images/single/Frame 4.png') }}" alt="image article">
                            </div>
                        </div>
                        <h1 class="title">
                            {{ $article->title }}
                        </h1>
                        <div class="description">
                            {!! $article->content->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{--@include('partials.app.sections.feedback-secondary')--}}
@endsection

@section('meta')
    @includeIf('partials.app.layout.meta', ['meta' => $article->meta()->first()])
    <meta property="og:type" content="article">
    <meta property="og:image" content="{{ $article->preview }}">
    <meta property="article:author" content="Green estate">
@endsection