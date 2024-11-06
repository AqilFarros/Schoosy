@extends('layouts.parent')

@section('content')
    <div class="flex m-3">
        <p class="text-4xl font-extrabold rounded-lg ">
            {{ $book->name }}
        </p>

        <a href="{{ url('storage/book/file/', $book->file) }}" target="_blank"
            class="inline-block bg-blue-600 text-white font-semibold ml-3 px-5 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">see
            book <i class="fa-solid fa-eye"></i></a>
    </div>


    @if ($previlage->role == 'operator' || $previlage->role == 'owner')
        <form class="m-3" action="{{ route('previlage.book.addVideo', [$school->slug, $book->slug]) }}" method="post">
            @csrf
            @method('POST')

            <div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900">Name Video</label>
                <input type="text" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    placeholder="Video Buku Bahasa indonesia" value="{{ old('name') }}">
            </div>

            <div class="mt-4">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900">Youtube Url</label>
                <input type="text" name="url_youtube"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5"
                    value="{{ old('url_youtube') }}">
            </div>

            <div class="flex justify-end mt-4">
                <button type="submit"
                    class="bg-green-600 text-white font-semibold rounded-lg px-4 py-2 shadow hover:bg-green-700 transition duration-200">
                    Add Video
                </button>
            </div>
        </form>
    @endif

    @forelse ($videoBook as $item)
        <div class="flex">
            <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-4 border border-gray-200">

                <div class="mb-4">
                    {!! $item->getVideoAttributes($item->url_youtube) !!}
                </div>

                <p class="text-lg font-semibold text-gray-800 mb-2">{{ $item->name }}</p>

                @if ($previlage->role == 'owner' || $previlage->role == 'operator')
                    <form action="{{ route('previlage.book.deleteVideo', [$school->slug, $book->slug, $item->id]) }}"
                        method="post" class="flex justify-end">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800 transition duration-200">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                @endif
            </div>
        </div>

    @empty
        <p class="text-center font-Nunito font-black text-3xl">No Video Have Been Added Yet.</p>
    @endforelse
@endsection
