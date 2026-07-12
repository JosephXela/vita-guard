@extends('layouts.libra')

@section('content')
<div class="container" style="margin-top: 40px; margin-bottom: 50px;">
    <div class="row">
        <div class="span8 offset2">
            <article style="background: #fff; padding: 30px; border-radius: 8px; border: 1px solid #f0f0f0;">
                <div class="post-image">
                    @if($article->image && file_exists(public_path('storage/' . $article->image)))
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->article_name }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 4px;" />
                    @else
                        <img src="{{ asset('storage/img/noImage.png') }}" alt="No Image Available" style="width: 100%; height: 200px; object-fit: cover; border-radius: 4px;" />
                    @endif
                </div>
                <h2 style="font-weight: bold; line-height: 1.4; margin-bottom: 10px;">{{ $article->title }}</h2>
                <div class="post-meta" style="margin-bottom: 30px; color: #888; font-size: 13px;">
                    <span> Published by: <strong>{{ $article->doctor->user->name ?? 'Doctor' }}</strong></span>
                </div>
                <div class="entry-body" style="font-size: 16px; line-height: 1.8; text-align: justify; white-space: pre-line;">
                    {{ $article->content }}
                </div>
                <div style="margin-top: 40px; border-top: 1px solid #eee; padding-top: 20px;">
                    <a href="{{ url('/member/articles') }}" class="btn btn-theme"><i class="icon-arrow-left"></i> Back</a>
                </div>
            </article>
        </div>
    </div>
</div>
@endsection