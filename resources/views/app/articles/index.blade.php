@extends('layouts.app', ['page_title' => trans('breadcrumb.blog')])

@section('content')
    <section id="single-blog" class="page-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">@lang('breadcrumb.main')</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('app.blog') }}">@lang('breadcrumb.blog')</a></li>
                            <li class="breadcrumb-item active">{{$category->title}}</li>
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
                <div class="col">
                    <h1 class="section-title text-center">
                        {{$category->title}}
                    </h1>
                </div>
                <articles-item :lang="{{ json_encode(trans('pages.blog')) }}"></articles-item>
            </div>
        </div>
    </section>


    {{--@include('partials.app.sections.feedback-secondary')--}}
@endsection