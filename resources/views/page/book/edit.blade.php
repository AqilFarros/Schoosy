@extends('layouts.parent')

@section('content')
    <a href="{{ route('previlage.book.index', $school->slug) }}"
        class="m-3 bg-blue-600 text-white hover:bg-blue-800 mb-4 inline-block font-medium duration-200 p-3 rounded-lg">
        <i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <form class="mx-5 grid grid-cols-1 md:grid-cols-2 gap-6"
        action="{{ route('previlage.book.update', [$school->slug, $book->slug]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Book Name</label>
            <div class="flex">
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-l-md">
                    <i class="fa-solid fa-book"></i>
                </span>
                <input type="text" id="name" name="name"
                    class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 block w-full text-sm p-2 text-gray-900"
                    placeholder="Book Name" value="{{ $book->name }}" required>
            </div>
        </div>

        <div>
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Upload Image Cover Book</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2"
                name="image" id="image" type="file">
        </div>

        <div>
            <label for="file" class="block mb-2 text-sm font-medium text-gray-900">File PDF Book</label>
            <input
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2"
                type="file" name="file">
        </div>

        <div class="col-span-1 md:col-span-2">
            <button type="submit"
                class="w-full bg-green-600 text-white font-semibold py-2 rounded-lg shadow-md hover:bg-green-700 transition duration-200">
                Submit <i class="fa-solid fa-check"></i>
            </button>
        </div>

    </form>
@endsection
