<div id="feedback" class="feedback">
    <div class="image">
        @if($feedback->hasMedia('banner'))
            <img src="{{$feedback->getFirstMediaUrl('banner')}}" alt="feedback image">
        @else
            <img src="/images/main/feedback-image.png" alt="feedback image">
        @endif
    </div>
    <div class="content">
        <h2 class="title">@lang('pages.feedback.title')</h2>
        <div class="description">
            <p> @lang('pages.feedback.description')</p>
        </div>
        <form method="post" action="{{ route('app.feedback.store') }}" class="feedback-form">
            @csrf
            <div class="form-column">
                <div class="form-group">
                    <label for="user-name">@lang('pages.feedback.name')</label>
                    <input type="text" name="name" class="form-control"
                           id="user-name" placeholder="@lang('pages.feedback.placeholder.name')" required>
                </div>
                <div class="form-group">
                    <label for="user-phone">@lang('pages.feedback.phone')</label>
                    <input type="tel" name="phone" class="form-control"
                           id="user-phone" placeholder="@lang('pages.feedback.placeholder.phone')" required>
                </div>
                <div class="form-group">
                    <label for="user-phone">@lang('pages.feedback.email')</label>
                    <input type="email" name="email" class="form-control"
                           id="user-phone" placeholder="@lang('pages.feedback.placeholder.email')" required>
                </div>
                <div class="form-group">
                    <label for="user-phone">@lang('pages.feedback.message')</label>
                    <input type="text" name="message" class="form-control"
                           id="user-phone" placeholder="@lang('pages.feedback.placeholder.message')" required>
                </div>
                <button type="submit" class="btn btn-primary">@lang('pages.feedback.button')</button>
            </div>
        </form>
    </div>
</div>

