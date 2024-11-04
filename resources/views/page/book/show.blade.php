@extends('layouts.parent')

@section('content')
    <p>{{ $book->name }}</p>

    <a href="{{ url('storage/book/file/', $book->file) }}" target="_blank">see book</a>
    @if ($previlage->role == 'operator' || $previlage->role == 'owner')
        <h1>Add Video</h1>

        <form action="{{ route('previlage.book.addVideo', [$school->slug, $book->slug]) }}" method="post">
            @csrf
            @method('POST')
            <div>
                <label for="">Name Video</label>
                <input type="text" name="name" value="{{ old('name') }}">
            </div>

            <div>
                <label for="">Youtube Url</label>
                <input type="text" name="url_youtube" value="{{ old('url_youtube') }}">
            </div>
            <button type="submit">Add Video</button>
        </form>
    @endif

    @forelse ($videoBook as $item)
    <div>
        {!! $item->getVideoAttributes($item->url_youtube) !!}
        <p>NAMA VIDEO</p>
        <form action="{{ route('previlage.book.deleteVideo', [$school->slug, $book->slug, $item->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
    </div>
    @empty
        <p>No Video</p>
    @endforelse
@endsection
