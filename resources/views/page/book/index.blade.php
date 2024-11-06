@extends('layouts.parent')

@section('content')
    <div>
        <h1 class="text-5xl font-bold text-center text-white bg-green-500 py-4 shadow-lg rounded-lg">{{ $school->name }} Book
        </h1>

        @if ($previlage->role == 'operator' || $previlage->role == 'owner')
            <div class="flex justify-end">
                <a href="{{ route('previlage.book.create', $school->slug) }}"
                    class="m-3 bg-blue-600 text-white hover:bg-blue-800 mb-4 inline-block font-medium duration-200 p-3 rounded-lg">Create Book</a>
            </div>
        @endif

        <div class="sm:grid md:grid-cols-2 md:gap-5 md:mx-10 lg:grid lg:grid-cols-2 lg:gap-5 lg:mx-10 xl:grid-cols-3">
            @forelse ($book as $item)
                <div class="w-80 p-6 bg-white border border-gray-200 rounded-lg shadow m-5 mx-auto">
                    <div class="w-60 h-56 mx-auto">
                        <img class="w-full h-full object-cover object-center rounded-t-lg"
                            src="{{ url('storage/book/image/', $item->image) }}" alt="img buku" />
                    </div>
                    <h5 class="my-5 text-2xl font-bold tracking-tight">{{ $item->name }}</h5>
                    <div class="flex justify-end gap-x-4">
                        <a href="{{ url('storage/book/file/', $item->file) }}" target="_blank"
                            class=" px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 duration-300 transition-all">
                            <i class="fa-regular fa-file"></i>
                        </a>
                        <a class="px-3 py-2 text-sm font-medium text-center text-white bg-sky-400 rounded-lg hover:bg-sky-500 duration-300 transition-all"
                            href="{{ route('previlage.book.show', [$school->slug, $item->slug]) }}">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                        @if ($previlage->role == 'operator' || $previlage->role == 'owner')
                            <a href="{{ route('previlage.book.edit', [$school->slug, $item->slug]) }}"
                                class=" px-3 py-2 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 duration-300 transition-all">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <form action="{{ route('previlage.book.destroy', [$school->slug, $item->slug]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class=" px-3 py-2 text-sm font-medium text-center text-white bg-red-500 rounded-lg hover:bg-red-600 duration-300 transition-all">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center font-Nunito font-black text-3xl">No Books Have Been Added Yet.</p>
            @endforelse
        </div>
    </div>
@endsection
