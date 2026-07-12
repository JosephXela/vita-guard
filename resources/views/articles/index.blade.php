@extends('layouts.adminlte4')
@section('title', 'Articles')
@section('articles-active', 'active')
@section('content')

<div class="container">
    <h2>Articles</h2>

    @can('create-permission', Auth::user())
    <a href="{{ route('articles.create') }}" class="btn-primary"> + New Article </a>
    @endcan

    @if (@session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (@session('status'))
    <div class="alert alert-warning">
        {{ session('status') }}
    </div>
    @endif
    <form method="GET" action="{{ route('articles.index') }}" class="mb-3">
        <div class="input-group">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Cari artikel..."
                value="{{ request('search') }}">

            <button class="btn btn-primary">
                Search
            </button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Article Cover Book</th>
                <th>Article Name</th>
                <th>Content</th>
                <th>Doctor Name</th>
                <th>Detail Article</th>

                @can('action-read', Auth::user())
                <th>Action Edit</th>
                <th>Action Delete</th>
                @endcan

            </tr>
        </thead>
        <tbody>
            @foreach ($allArticles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#imageModal-{{ $article->id }}">
                        Show
                    </button>
                </td>
                <td>{{ $article->article_name }}</td>
                <td>{{ $article->content }}</td>
                <td>{{ $article->doctor?->user?->name ?? 'Dokter Telah Keluar' }}</td>


                <td>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        onclick="showDetail({{ $article->id }})">
                        Detail
                    </button>
                </td>

                @can('edit-permission', Auth::user())
                <td>
                    <a class="btn btn-warning" href="{{ route('articles.edit', $article->id) }}">Edit</a>
                </td>
                @endcan

                @can('delete-permission', Auth::user())
                <td>
                    <form method="POST" action="{{ route('articles.destroy', $article->id) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger"
                            onclick="return confirm('Are You Sure To Delete {{ $article->id }} - {{ $article->article_name }}?');">
                    </form>
                </td>
                @endcan

            </tr>
            @push ('modal')
            <!-- Modal -->
            <div class="modal fade" id="imageModal-{{ $article->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Foto Article
                                {{ $article->article_name }}
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $article->image) }}" width="100%">
                            {{ $article->id }}-
                            {{ $article->article_name }}

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
            @endpush
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('script')
<script>
    function showDetail(id) {
        $.ajax({
            type: 'POST',
            url: '{{ route("article.showDetail") }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'id': id,
            },
            success: function(data) {
                $('#detail-title').html(data.title);
                $('#detail-body').html(data.body);
            }
        });
    }
</script>
@endpush

@push('modal')
<div class="modal fade" id="exampleModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="detail-title">Detail </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="detail-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endpush