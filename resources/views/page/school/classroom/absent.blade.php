@extends('layouts.parent')

@section('content')
    <form action="{{ route('previlage.classroom.updateAbsent', [$school->slug, $classroom->slug, $absentClass->id]) }}" method="post">
        @csrf
        @method('POST')
    </form>
@endsection
