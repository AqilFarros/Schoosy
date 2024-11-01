@extends('layouts.parent')

@section('content')
    ini halaman buku
    @if ($previlage->role == 'operator' || $previlage->role == 'owner')
        <a href="{{ route('previlage.book.create', $school->slug) }}">buat buku</a>
    @endif
    @forelse ($book as $item)
        <p>{{ $item->name }}</p>
        @if ($previlage->role == 'operator' || $previlage->role == 'owner')
            <a href="{{ route('previlage.book.edit', [$school->slug, $item->slug]) }}">edit buku</a>
        @endif
    @empty
        <p>belum ada buku</p>
    @endforelse
@endsection
