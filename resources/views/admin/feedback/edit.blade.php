@extends('layouts.admin', ['app_title' => $feedback->name])

@section('content')
    <form action="{{ route('admin.feedback.update', $feedback) }}" method="post">
        @csrf
        @method('patch')
        <div class="row">
            <div class="col-md">
                <p class="font-weight-bold mb-2">Name</p>
                <p class="mb-1">
                    {{ $feedback->name }}
                </p>
                <p class="font-weight-bold mb-2">Phone</p>
                <p class="mb-1">{{ $feedback->phone }}</p>
                <p class="font-weight-bold mb-2">Email</p>
                <p class="mb-1">{{ $feedback->email }}</p>
                <p class="font-weight-bold mb-2">Message</p>
                <p class="mb-1">{{ $feedback->message }}</p>
                <p class="font-weight-bold mb-2">Created at</p>
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
                Save
            </button>
        </div>
    </form>

@endsection