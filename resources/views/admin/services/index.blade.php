@extends('layouts.admin', ['app_title' => 'Services'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Services</h1>
        <div class="ml-3">
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                Create new service
            </a>
        </div>
    </div>
    @forelse($services as $service)
        <article class="item">
            <div class="item-id">{{ $service->id }}</div>

            <div class="item-body">
                <div class="col-auto">

                    @if ($service->hasMedia('service'))
                        <img src="{{ $service->getFirstMediaUrl('service', 'thumb') }}" class="rounded-circle"
                             alt="{{ $service->name }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="rounded-circle"
                             alt="{{ $service->name }}" style="width: 100px;">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.services.edit', $service) }}" class="underline">
                            {{ $service->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Created {{ $service->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.services.edit', $service) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.services.destroy', $service) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $service->id }})">
                            <i class="i-trash"></i>
                        </a>
                    </p>
                    <form action="{{ route('admin.services.destroy', $service) }}"
                          id="delete-form-{{ $service->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Services not created yet!
    @endforelse
    {{ $services->links() }}
@endsection

@push('scripts')
    <script>
      function confirmDelete(id) {
        event.preventDefault();
        const agree = confirm('Sure?');
        if (agree) {
          document.getElementById('delete-form-' + id).submit();
        }
      }
    </script>
@endpush
