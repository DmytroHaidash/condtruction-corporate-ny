@extends('layouts.admin', ['page_title' => 'Settings'])

@section('content')

    <section id="content">
        <div class="d-flex align-items-center mb-5">
            <h1 class="mb-0 h2">Settings</h1>
        </div>
        <form action="{{ route('admin.settings.update') }}" method="post">
            @csrf
            @method('patch')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                               value="{{ old('phone') ?? $setting->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="phone_additional">Additional phone</label>
                        <input type="text" class="form-control" id="phone_additional" name="phone_additional"
                               value="{{ old('phone_additional') ?? $setting->phone_additional }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{ old('email') ?? $setting->email }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook"
                               value="{{ old('facebook') ?? $setting->facebook }}">
                    </div>
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram"
                               value="{{ old('instagram') ?? $setting->instagram }}">
                    </div>
                    <div class="form-group">
                        <label for="linked_in">LinkedIn</label>
                        <input type="text" class="form-control" id="linked_in" name="linked_in"
                               value="{{ old('linked_in') ?? $setting->linked_in }}">
                    </div>
                </div>
            </div>

            <block-editor title="">
                @foreach(config('app.locales') as $lang)

                    <fieldset slot="{{ $lang }}">
                        <div class="form-group">
                            <label for="title">Title home page</label>
                            <input id="title"
                                   type="text"
                                   name="{{$lang}}[title]"
                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                   value="{{ old($lang.'.title') ?? $setting->translate('title', $lang) }}"
                                   required>
                            @if($errors->has('title'))
                                <div class="mt-1 text-danger">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="description">Description home page</label>
                            <input id="description"
                                   type="text"
                                   name="{{$lang}}[content][description]"
                                   class="form-control"
                                   value="{{ old($lang.'.content') ?? $setting->translate('content', $lang)['description'] }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input id="address"
                                   type="text"
                                   name="{{$lang}}[content][address]"
                                   class="form-control"
                                   value="{{ old($lang.'.content') ?? $setting->translate('content', $lang)['address'] }}"
                                   required>
                        </div>
                    </fieldset>
                @endforeach
            </block-editor>

            <h2 class="mt-2">Maps settings</h2>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input id="latitude"
                       type="text"
                       name="latitude"
                       class="form-control"
                       value="{{ old('latitude') ?? $setting->latitude }}"
                       required>
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input id="address"
                       type="text"
                       name="longitude"
                       class="form-control"
                       value="{{ old('longitude') ?? $setting->longitude }}"
                       required>
            </div>
            <button class="btn btn-primary mt-2">Save</button>
        </form>
    </section>
@endsection