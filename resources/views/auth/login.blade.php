@extends('layouts.app')

@section('content')
    <div class="container auth">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-auth my-5">
                    <div class="card-header">
                       <h3>@lang('auth.login')</h3>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}" class="form-auth">
                            @csrf
                            <div class="form-column">
                                <div class="form-group">
                                    <label for="email">@lang('auth.email')</label>

                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="@lang('auth.email')">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">@lang('auth.password')</label>

                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password" placeholder="@lang('auth.password')">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    @lang('auth.login')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
