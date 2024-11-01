@extends('layouts.parent')

@section('content')
    <a href="{{ route('previlage.book.index', $school->slug) }}">kembali</a>

    <p>{{ $book->name }}</p>
    <a href="{{ url('storage/book/file/', $book->file) }}" target="_blank">see book</a>
    @if ($previlage->role == 'operator' || $previlage->role == 'owner')
        <form action="{{ route('previlage.book.destroy', [$school->slug, $book->slug]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">delete</button>
        </form>
    @endif
@endsection
