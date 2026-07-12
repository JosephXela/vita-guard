@if($article->image)
<img src="{{ asset('storage/' . $article->image) }}" class="img-fluid mb-3">
@endif

<h2>{{ $article->article_name }}</h2>

<div class="row mb-2">
    <div class="col-md-2"><b>Penulis</b></div>
    <div class="col-md-10">
        : {{ $article->doctor?->user?->name ?? 'Unknown' }}
        @if($article->doctor && $article->doctor->trashed())
        <span class="badge bg-danger">Dokter Telah Keluar</span>
        @endif
    </div>
</div>

<div class="row mb-3">
    <div class="col-md-2"><b>Tanggal</b></div>
    <div class="col-md-10">
        : {{ $article->created_at?->format('d-m-Y') ?? '-' }}
    </div>
</div>

<p><b>Isi Artikel</b></p>

<p style="text-align: justify;">
    {{ $article->content }}
</p>