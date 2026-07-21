@extends('layouts.libra')

@section('title', $article->title)

@section('content')

<a href="{{ url('/member/articles') }}" class="d-inline-flex align-items-center text-decoration-none mb-4" style="color: var(--vg-muted); font-size: 0.9rem;">
    <i class="bi bi-arrow-left me-1"></i> Back to Articles
</a>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <article class="card border-0 shadow-sm" style="border-radius: 14px;">
            <div class="card-body p-4 p-md-5">

                @if ($article->image && file_exists(public_path('storage/' . $article->image)))
                <img src="{{ asset('storage/' . $article->image) }}"
                    alt="{{ $article->article_name }}"
                    class="w-100 mb-4"
                    style="height: 320px; object-fit: cover; border-radius: 10px;" />
                @else
                <img src="{{ asset('storage/img/noImage.png') }}"
                    alt="No image available"
                    class="w-100 mb-4"
                    style="height: 320px; object-fit: cover; border-radius: 10px;" />
                @endif

                <h2 class="fw-bold mb-2" style="line-height: 1.4;">{{ $article->title }}</h2>

                <div class="d-flex align-items-center gap-2 mb-4 pb-4 border-bottom" style="color: var(--vg-muted); font-size: 0.9rem;">
                    <i class="bi bi-person-badge" style="color: var(--vg-primary);"></i>
                    <span>Published by <strong>{{ $article->doctor->user->name ?? 'Doctor' }}</strong></span>
                </div>

                <div class="entry-body" style="font-size: 1.02rem; line-height: 1.85; text-align: justify; white-space: pre-line;">
                    {{ $article->content }}
                </div>

                <div class="mt-5 pt-4 border-top">
                    <a href="{{ url('/member/articles') }}" class="btn text-white" style="background: var(--vg-primary);">
                        <i class="bi bi-arrow-left me-1"></i> Back to Articles
                    </a>
                </div>

            </div>
        </article>
    </div>
</div>

@endsection