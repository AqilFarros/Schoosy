@extends('layouts.parent')

@section('content')
    <form action="{{ route('previlage.classroom.updateAbsent', [$school->slug, $classroom->slug, $absentClass->id]) }}" method="post">
        @csrf
        @method('POST')
        @foreach ($student as $item)
            <input type="text" name="student[]" value="{{ $item->id }}" hidden>
            <p>{{ $item->name }}</p>
            <select name="status[]" id="">
                <option value="attendence">attendence</option>
                <option value="permission">permission</option>
                <option value="sick">sick</option>
            </select>
        @endforeach

        <button type="submit">Update</button>
    </form>
@endsection
