@extends('layouts.parent')

@section('content')
    <form class="mx-5 grid grid-cols-1 gap-6" action="{{ route('school.update', $school->slug) }}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name Of School</label>
            <input id="name" class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="name" value="{{ $school->name }}">
        </div>

        <div>
            <label for="desc">Description</label>
            <textarea id="desc" class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="description" value="{{ $school->description }}">{{ $school->description }}</textarea>
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="email" value="{{ $school->email }}">
        </div>

        <div>
            <label for="phone">Phone</label>
            <input id="phone" class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="phone" value="{{ $school->phone }}">
        </div>

        <div>
            <label for="website">Website</label>
            <input id="website" class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="website" value="{{ $school?->website }}">
        </div>

        <div>
            <label for="address">Address</label>
            <input id="address" class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="address" value="{{ $school->address }}">
        </div>

        <button class=" py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition duration-200" type="submit">submit <i class="fa-solid fa-check"></i></button>
    </form>
@endsection
