@extends('layouts.parent')

@section('content')
<form action="{{ route('previlage.classroom.store', $school->slug) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <div class="mx-5 grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label for="">Name</label>
            <input class="border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text"
                name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="">Image</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2"
                type="file" name="image" value="{{ old('image') }}">
        </div>

    </div>

    <div class="flex justify-center mt-4">
        <button
            class="block w-full mx-3 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition duration-200"
            type="submit">submit <i class="fa-solid fa-check"></i></button>
    </div>
</form>
@endsection

