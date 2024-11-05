@extends('layouts.parent-profile')

@section('content')
<form class="mx-5 grid grid-cols-1 gap-4" action="{{ route('school.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div>
            <label for="">Name</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2" type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="">Email</label>
            <input class=" border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2"  type="text" name="email" value="{{ old('email') }}">
        </div>

        <button class=" py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition duration-200" type="submit">submit <i class="fa-solid fa-check"></i></button>
    </form>
@endsection