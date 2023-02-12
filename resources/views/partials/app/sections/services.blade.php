<!-- Services -->
<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title text-center">
                    @lang('pages.header.service')
                </h2>
            </div>
            @foreach($services as $service)
            <div class="col-sm-6 col-lg-4">
                <a href="{{route('app.services.show', $service)}}" class="services-item">
                    <figure style="background-image:url({{ $service->getFirstMediaUrl('service') }});">
                        <h5 class="title">
                            {{ $service->title }}
                        </h5>
                    </figure>
                </a>
            </div>
            @endforeach
        </div>
        {{--<div class="d-flex justify-content-center mb-4">
            <a href="{{route('app.services.index')}}" class="btn btn-primary">@lang('pages.blog.read')</a>
        </div>--}}
    </div>
</section>