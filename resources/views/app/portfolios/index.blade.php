<!-- Page Portfolio -->
@extends('layouts.app', ['page_title' => trans('breadcrumb.portfolio')])

@section('content')
    <section id="page-portfolio" class="page-section page-section-portfolio">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">@lang('breadcrumb.main') </a></li>
                            <li class="breadcrumb-item active">@lang('breadcrumb.portfolio')</li>
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
            <div class="row justify-content-center">
                <div class="col-xl-10 offset-xl-2">
                    <h1 class="section-title mt-4 mt-sm-0 mb-0">
                        @lang('pages.portfolio.title')
                    </h1>
                </div>
            </div>

            <portfolio-item :lang="{{ json_encode(trans('pages.portfolio')) }}"></portfolio-item>
        </div>
    </section>
    {{--@include('partials.app.sections.feedback-secondary')--}}
@endsection