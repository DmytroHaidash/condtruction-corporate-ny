@extends('layouts.admin', ['app_title' => $advantage->title])

@section('content')
    <form action="{{ route('admin.advantages.update', $advantage) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="row">
            <div class="col-md-8">
                <block-editor title="New">
                    @foreach(config('app.locales') as $lang)

                        <fieldset slot="{{ $lang }}">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input id="title"
                                       type="text"
                                       name="{{$lang}}[title]"
                                       class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                       value="{{ old($lang.'.title') ?? $advantage->translate('title', $lang) }}"
                                       required>
                                @if($errors->has('title'))
                                    <div class="mt-1 text-danger">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input id="description"
                                       type="text"
                                       maxlength="200"
                                       name="{{$lang}}[content][description]"
                                       class="form-control"
                                       value="{{ old($lang.'.content') ?? $advantage->translate('content', $lang)['description'] }}"
                                       required>
                            </div>
                        </fieldset>

                    @endforeach
                </block-editor>
                <hr class="my-5">
                @includeIf('partials.admin.meta', ['meta' => $advantage->meta()->first()])
            </div>
            <div class="col-md-4">
                <image-uploader ratio="67%" name="advantage" image-id="{{ optional($advantage->getFirstMedia('advantage'))->id }}"
                                src="{{ $advantage->getFirstMediaUrl('advantage') }}"></image-uploader>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-primary">
                Save
            </button>
        </div>
    </form>

@endsection
