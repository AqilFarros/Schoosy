@extends('layouts.parent')

@section('content')
    @foreach ($absent->absentClassData as $item)
        <p>{{ $item->previllage->name }}</p>
        <p>{{ $item->status }}</p>
    @endforeach
@endsection
