<!-- Blog -->
<section id="blog">
    <div class="container">
        <div class="row justify-content-center justify-content-xl-between">
            <div class="col-sm-10 col-lg-6">
                <h2 class="section-title">
                    @lang('pages.blog.title')
                </h2>
            </div>
            <div class="col-sm-10 col-lg-6">
                <div class="description-section">
                    <p>@lang('pages.blog.description')</p>
                    <a href="{{ route('app.articles.index') }}" class="btn btn-primary">@lang('pages.blog.button')</a>
                </div>
            </div>
            @foreach($blog as $item)
                <div class="col-sm-7 col-xl-4">
                    <a href="{{ route('app.articles.show', $item)}}" class="blog-card">
                        <h4 class="title">
                            {{ $item->title }}
                        </h4>
                        <div class="image" style="background-image: url({{ $item->getFirstMediaUrl('article') }});"></div>
                        <div class="mask"></div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>