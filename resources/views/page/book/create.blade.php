@extends('layouts.parent')

@section('content')
    <a href="{{ route('previlage.book.index', $school->slug) }}">Kembali</a>

    <form action="{{ route('previlage.book.store', $school->slug) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div>
            <label for="">name</label>
            <input type="text" name="name">
        </div>

        <div>
            <label for="">image</label>
            <input type="file" name="image">
        </div>

        <div>
            <label for="">file (it schould be pdf)</label>
            <input type="file" name="file">
        </div>

        <button type="submit">submit</button>
    </form>
@endsection