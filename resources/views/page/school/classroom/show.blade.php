@extends('layouts.parent')

@section('content')
    {{ $classroom->name }}
    <p>Wali kelas {{ $homeroom?->name }}</p>
    <div>
        @foreach ($classmate as $item)
            <p>teman {{ $item->name }}</p>
        @endforeach
    </div>

    @if ($previlage->role == 'owner' || $previlage->role == 'operator')
        <a href="{{ route('previlage.classroom.editMember', [$school->slug, $classroom->slug]) }}">Edit Member</a>
        <a href="{{ route('previlage.classroom.edit', [$school->slug, $classroom->slug]) }}">Edit Class</a>
    @endif

    @if ($previlage->role == 'owner' || $previlage->role == 'operator' || $previlage->id == $homeroom?->id)
        <form action="{{ route('previlage.classroom.makeAbsent', [$school->slug, $classroom->slug]) }}" method="post">
            @csrf
            @method('POST')
            <label for="#">date</label>
            <input type="date" name="date">
            <input type="text" name="classroom_id" value="{{ $classroom->id }}" hidden>
            <button type="submit">Make Absent</button>
        </form>
    @endif
    <p>Absen Belum dilakukan</p>
    @foreach ($absent as $item)
        @if ($item->absentClassData->count() == 0)
            <div>{{ $item->date }}</div>
            <a href="{{ route('previlage.classroom.absent', [$school->slug, $classroom->slug, $item->id]) }}">See Detail</a>
        @endif
    @endforeach
    <p>Absen yang sudah dilakukan</p>
    @foreach ($absent as $item)
    @if ($item->absentClassData->count() !== 0)
        <div>{{ $item->date }}</div>
        <a href="{{ route('previlage.classroom.absent', [$school->slug, $classroom->slug, $item->id]) }}">See Detail</a>
    @endif
@endforeach
@endsection
