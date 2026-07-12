@extends('layouts.libra')

@section('content')
<div class="container" style="margin-top: 30px; margin-bottom: 50px;">
    <br><br>
    <div class="row" style="display: flex; justify-content: center; margin-bottom: 40px;">
        <div class="span8" style="float: none; margin: 0 auto; text-align: center;">
            <form action="{{ url('/member/articles') }}" method="GET" style="display: flex; gap: 10px; justify-content: center; align-items: center; width: 100%;">
                <input type="text" name="search" placeholder="Search articles by title..." value="{{ request('search') }}" style="flex: 1; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-bottom: 0;">
                <button type="submit" class="btn btn-theme" style="padding: 12px 25px; height: 46px; line-height: 20px;">Search</button>
            </form>
        </div>
    </div>

    <div class="row" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
        @forelse ($allArticles as $article)
        <div style="width: 360px; margin-bottom: 10px;">
            <div class="home-posts" style="border: 1px solid #f0f0f0; padding: 20px; border-radius: 8px; background: #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.1); height: 100%; box-sizing: border-box; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                    <div class="post-image">
                        @if($article->image && file_exists(public_path('storage/' . $article->image)))
                            <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->article_name }}" style="width: 100%; height: 200px; object-fit: cover; border-radius: 4px;" />
                        @else
                            <img src="{{ asset('storage/img/noImage.png') }}" alt="No Image Available" style="width: 100%; height: 200px; object-fit: cover; border-radius: 4px;" />
                        @endif
                    </div>
                    <div class="entry-content" style="margin-top: 15px; text-align: left;">
                        <h5 style="margin-bottom: 8px;"><strong><a href="{{ url('/member/articles/'.$article->id) }}" style="color: #333;">{{ $article->article_name }}</a></strong></h5>
                        <p style="color: #888; font-size: 12px; margin-bottom: 12px;">Write by: {{ $article->doctor->user->name ?? 'Dokter Spesialis' }}</p>
                    </div>
                </div>
                <div style="margin-top: 15px; text-align: left;">
                    <a href="{{ url('/member/articles/'.$article->id) }}" class="more-link">Read more...</a>
                </div>
            </div>
        </div>
        @empty
        <div class="span12" style="text-align: center; color: #fff;">
            <p>Artikel tidak ditemukan.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection