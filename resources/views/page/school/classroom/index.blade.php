@extends('layouts.parent')

@section('content')
    @if ($previlage == 'owner' || $previlage == 'operator')
        <a href="{{ route('previlage.classroom.create', $school->slug) }}">create classroom</a>
    @endif

    @forelse ($classroom as $item)
        <p>{{ $item->name }}</p>
        @if ($previlage == 'owner' || $previlage == 'operator')
            <a href="{{ route('previlage.classroom.edit', [$school->slug, $item->slug]) }}">edit</a>
            <form action="{{ route('previlage.deletePrevillage', [$school->slug, $item->delete]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">delete</button>
            </form>
        @endif
    @empty
        <p>No Class</p>
    @endforelse
@endsection
