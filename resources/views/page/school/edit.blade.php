@extends('layouts.parent')

@section('content')
    <form class="mx-5 grid grid-cols-1 gap-6" action="{{ route('school.update', $school->slug) }}" method="post">
        @csrf
        @method('PUT')

        <div>
            <label for="">Name</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="name" value="{{ $school->name }}">
        </div>

        <div>
            <label for="">Description</label>
            <textarea class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="description" value="{{ $school->description }}"><
        </div>

        <div>
            <label for="">Email</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="email" value="{{ $school->email }}">
        </div>

        <div>
            <label for="">phone</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="phone" value="{{ $school->phone }}">
        </div>

        <div>
            <label for="">website</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="website" value="{{ $school->website }}">
        </div>

        <div>
            <label for="">address</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="address" value="{{ $school->address }}">
        </div>

        <button class=" py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition duration-200" type="submit">submit</button>
    </form>
@endsection
