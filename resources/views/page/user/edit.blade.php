@extends('layouts.parent-profile')

@section('content')
    <a href="{{ route('user.show', Auth::id()) }}">
        <div class="bg-slate-100 mx-5 my-5">
            <i class="fa-solid fa-arrow-left text-lg"></i>
        </div>
    </a>

    <form class="mx-5 grid grid-cols-1 gap-4" action="{{ route('user.update', Auth::id()) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text"
                name="name" value="{{ Auth::user()->name }}" id="name">
        </div>

        <div>
            <label for="">Email</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text"
                name="email" value="{{ Auth::user()->email }}" id="email">
        </div>

        <button
            class=" py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition duration-200"
            type="submit">submit <i class="fa-solid fa-check"></i></button>
    </form>
@endsection
