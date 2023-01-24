@extends('layouts.admin', ['app_title' => 'Portfolio'])

@section('content')

    <div class="d-flex align-items-center mb-5">
        <h1 class="mb-0 h2">Portfolio</h1>
        <div class="ml-3">
            <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">
                Create portfolio
            </a>
        </div>
    </div>
    @forelse($portfolios as $portfolio)
        <article class="item">
            <div class="item-id">{{ $portfolio->id }}</div>

            <div class="item-body">
                <div class="col-auto">

                    @if ($portfolio->hasMedia('uploads'))
                        <img src="{{ $portfolio->getFirstMediaUrl('uploads', 'thumb') }}" class="rounded-circle"
                             alt="{{ $portfolio->name }}" style="width: 100px;">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="rounded-circle"
                             alt="{{ $portfolio->name }}" style="width: 100px;">
                    @endif
                </div>
                <div class="col">
                    <h3>
                        <a href="{{ route('admin.portfolios.edit', $portfolio) }}" class="underline">
                            {{ $portfolio->title }}
                        </a>
                    </h3>
                    <p class="mt-2 mb-0">
                        Created {{ $portfolio->created_at->format('d.m.Y \в H:i') }}
                    </p>
                </div>
                <div class="col-auto align-self-center">
                    <p class="mb-1">
                        <a href="{{ route('admin.portfolios.edit', $portfolio) }}"
                           class="btn btn-sm btn-dark">
                            <i class="i-pencil"></i>
                        </a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('admin.portfolios.destroy', $portfolio) }}"
                           class="btn btn-sm btn-danger" onclick="confirmDelete({{ $portfolio->id }})">
                            <i class="i-trash"></i>
                        </a>
                    </p>
                    <form action="{{ route('admin.portfolios.destroy', $portfolio) }}"
                          id="delete-form-{{ $portfolio->id }}" method="post" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                </div>
            </div>
        </article>
    @empty
        Portfolio not created yet!
    @endforelse
    {{ $portfolios->links() }}
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
