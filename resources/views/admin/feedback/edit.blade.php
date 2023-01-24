@extends('layouts.admin', ['app_title' => $feedback->name])

@section('content')
    <form action="{{ route('admin.feedback.update', $feedback) }}" method="post">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md">
                <p class="font-weight-bold mb-2">Имя</p>
                <p class="mb-1">
                    {{ $feedback->name }}
                </p>
                <p class="font-weight-bold mb-2">Телефон</p>
                <p class="mb-1">{{ $feedback->phone }}</p>
                <p class="font-weight-bold mb-2">Заявка отправлена</p>
                <p class="mb-1">{{ $feedback->created_at->format(('d.m.Y \в H:i')) }}</p>
            </div>

            <div class="col-md">
                <select name="status" class="form-control w-auto">
                    @foreach(\App\Models\Feedback::$STATUSES as $status)
                        <option value="{{ $status }}"
                                {{ $feedback->status == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>

@endsection