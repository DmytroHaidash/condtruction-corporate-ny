<!-- Advantages -->
<section id="advantages" style="background-image:url({{$advantages_banner->getFirstMediaUrl('banner')}});">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="section-title text-center">
                    @lang('pages.advantages.title')
                </h2>
            </div>
            @foreach($advantages as $advantage)

            <div class="col-lg-6">
                <div class="advantages-item">
                    <div class="image">
                        <div class="image-bg-dark">
                            <img src="{{$advantage->getFirstMediaUrl('advantage')}}" alt="advantages image">
                        </div>
                    </div>
                    <div class="content">
                        <h3 class="title">
                            {{ $advantage->title }}
                        </h3>
                        {{$advantage->content->description}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>