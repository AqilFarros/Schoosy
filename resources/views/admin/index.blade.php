@extends('layouts.admin.parent')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @foreach ($school as $item)
        <div>
            <img src="{{ url('storage/school', $item->image) }}" alt="" width="300">
            <form action="{{ route('admin.statusSchool', $item->id) }}" method="post">
                @csrf
                @method('POST')
                <input type="text" value="reject" name="status" hidden>
                <button type="submit">
                    reject
                </button>
            </form>
            <form action="{{ route('admin.statusSchool', $item->id) }}" method="post">
                @csrf
                @method('POST')
                <input type="text" value="approve" name="status" hidden>
                <input type="text" value="{{ old('code') }}" name="code">
                <button type="submit">
                    approve
                </button>
            </form>
        </div>
    @endforeach
@endsection
