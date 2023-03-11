<!-- Intro -->
<section id="intro">
    <div class="container-fluid h-100 px-sm-0">
        <div class="row h-100 align-items-center">
            <div class="col-sm-9 col-lg-6">
                <div class="intro-item">
                    <div class="intro-item-logo">
                        <img src="../../images/icon/intro-logo-2.png" alt="sensar">
                    </div>
                    <div class="intro-item-content">
                        <h1 class="title">
                            {{app('settings')->title}}
                        </h1>
                        <div class="description">
                            <p>
                                {!! app('settings')->content->description !!}
                            </p>
                            <a href="#contacts" class="btn btn-primary ">
                                @lang('pages.portfolio.more')
                                {{--<svg width="25" height="10">
                                    <use xlink:href="#arrow-next"></use>
                                </svg>--}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 px-0">
                <div class="intro-image ">
                    <img src="../../images/main/intro-image.png" alt="image">
                </div>
            </div>
        </div>
    </div>
     <div class="decor-circle decor-circle--big">
        <svg>
            <use xlink:href="#big-circle"></use>
        </svg>
    </div>
    <div class="decor-circle decor-circle--small">
        <svg>
            <use xlink:href="#small-circle"></use>
        </svg>
    </div>
    <div class="decor-cloud decor-cloud--1">
        <img src="../../images/icon/intro-cloud-1.png" alt="cloud">
    </div>
    {{--<div class="decor-cloud decor-cloud--2">
        <img src="../../images/icon/intro-cloud-1.png" alt="cloud">
    </div>--}}
</section>
