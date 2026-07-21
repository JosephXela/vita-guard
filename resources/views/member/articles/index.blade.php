@extends('layouts.libra')

@section('title', 'Health Articles')

@section('content')

<!-- Page Header -->
<div class="row mb-4">
    <div class="col-lg-8">
        <h3 class="fw-bold mb-1">Health Articles</h3>
        <p class="text-muted mb-0">Read the latest health insights written by our specialists.</p>
    </div>
</div>

<!-- Search -->
<div class="row justify-content-center mb-5">
    <div class="col-lg-7">
        <form action="{{ url('/member/articles') }}" method="GET" class="input-group input-group-lg shadow-sm" style="border-radius: 10px; overflow: hidden;">
            <span class="input-group-text bg-white border-0">
                <i class="bi bi-search" style="color: var(--vg-muted);"></i>
            </span>
            <input type="text" name="search" class="form-control border-0" placeholder="Search articles by title..." value="{{ request('search') }}">
            <button type="submit" class="btn text-white border-0" style="background: var(--vg-primary);">
                Search
            </button>
        </form>
    </div>
</div>

<!-- Article Grid -->
<div class="row g-4">
    @forelse ($allArticles as $article)
    <div class="col-md-6 col-lg-4">
        <div class="card h-100 border-0 shadow-sm" style="border-radius: 14px;">

            @if ($article->image && file_exists(public_path('storage/' . $article->image)))
            <img src="{{ asset('storage/' . $article->image) }}"
                alt="{{ $article->article_name }}"
                class="card-img-top"
                style="height: 190px; object-fit: cover; border-radius: 14px 14px 0 0;" />
            @else
            <img src="{{ asset('storage/img/noImage.png') }}"
                alt="No image available"
                class="card-img-top"
                style="height: 190px; object-fit: cover; border-radius: 14px 14px 0 0;" />
            @endif

            <div class="card-body d-flex flex-column">
                <h5 class="fw-bold mb-2">
                    <a href="{{ url('/member/articles/'.$article->id) }}" class="text-decoration-none" style="color: var(--vg-ink);">
                        {{ $article->article_name }}
                    </a>
                </h5>
                <p class="mb-3" style="color: var(--vg-muted); font-size: 0.85rem;">
                    <i class="bi bi-person-badge me-1"></i>{{ $article->doctor->user->name ?? 'Specialist Doctor' }}
                </p>

                <a href="{{ url('/member/articles/'.$article->id) }}" class="mt-auto d-inline-flex align-items-center text-decoration-none fw-semibold" style="color: var(--vg-primary); font-size: 0.9rem;">
                    Read more <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12 text-center py-5">
        <i class="bi bi-file-earmark-x" style="font-size: 2.5rem; color: var(--vg-muted);"></i>
        <p class="text-muted mt-2 mb-0">No articles found.</p>
    </div>
    @endforelse
</div>

@endsection