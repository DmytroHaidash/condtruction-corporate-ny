<!-- Portfolio -->
<section id="portfolio-main">
    <div class="container-fluid">
        <div class="row">
            <div class="col mx-auto">
                <div class="portfolio-slider portfolio-slider--end portfolio-slider--main">
                   @foreach($portfolios as $portfolio)
                    <div class="portfolio-item">
                        <div class="place">{{$portfolio->content->address}}</div>
                        <div class="image" style="background-image: url('{{$portfolio->getFirstMediaUrl('uploads')}}');"></div>
                        <div class="description">
                            <div class="logo">
                                <img src="{{$portfolio->getFirstMediaUrl('portfolio')}}" alt="logo">
                            </div>
                            <div class="content">
                                <div class="subtitle">
                                    @lang('pages.header.portfolio')
                                </div>
                                <h3 class="title">
                                   {{ $portfolio->title }}
                                </h3>

                                <p>
                                    {!! remove_tags($portfolio->content->body, 200) !!}
                                </p>
                                <a href="{{route('app.portfolios.show', $portfolio)}}" class="link-more">
                                    @lang('pages.portfolio.more')
                                    <svg width="25" height="10">
                                        <use xlink:href="#arrow-next"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="decor-title decor-title--white">{{ $portfolio->title }}</div>
                        <div class="decor-title decor-title--transparent">{!! $portfolio->title  !!}</div>
                    </div>
                    @endforeach
                </div>
                <div class="slider-nav">
                    <div class="slider-nav-counter">
                        <div class="slider-preloader">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <ul class="slider-count">
                            <li class="slider-count-index slider-count-index--portfolioMain">01</li>
                            <li class="separator">/</li>
                            <li class="slider-count-last slider-count-last--portfolioMain">01</li>
                        </ul>
                        <div class="decor-line"></div>
                    </div>
                    <div class="slider-nav-arrow">
                        <div class="slider-nav-arrow-item slider-nav-arrow-item--prev slider-nav-arrow-item--prev--portfolioMain">
                            @lang('pages.portfolio.previous')
                            <svg width="16" height="12" class="ml-3">
                                <use xlink:href="#slider-arrow-prev"></use>
                            </svg>
                        </div>
                        <div class="slider-nav-arrow-item slider-nav-arrow-item--next slider-nav-arrow-item--next--portfolioMain">
                            <svg width="16" height="12" class="mr-3">
                                <use xlink:href="#slider-arrow-next"></use>
                            </svg>
                            @lang('pages.portfolio.next')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>