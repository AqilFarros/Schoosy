@extends('layouts.parent-profile')

@section('content')
    <form class="mx-5 grid grid-cols-1 gap-4" action="{{ route('school.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div>
            <label for="">School Name</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="">School Email</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2"  type="text" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label for="">School Phone Number</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2"  type="text" name="phone" value="{{ old('phone') }}">
        </div>

        <div>
            <label for="">School Website (optional)</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2"  type="text" name="website" value="{{ old('website') }}">
        </div>

        <div>
            <label for="">School Address</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2"  type="text" name="address" value="{{ old('address') }}">
        </div>

        <div>
            <label for="">School image</label>
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2"  type="file" name="image">
        </div>

        <div>
            <label for="">School Description </label>
            <textarea class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2"  type="text" name="description" value="{{ old('description') }}"></textarea>
        </div>


        <button class=" py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition duration-200" type="submit">submit <i class="fa-solid fa-check"></i></button>
    </form>
@endsection
