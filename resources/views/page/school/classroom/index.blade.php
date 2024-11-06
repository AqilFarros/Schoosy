@extends('layouts.parent')

@section('content')
    <h1 class="text-5xl font-bold text-center text-white bg-green-500 py-4 shadow-lg rounded-lg">{{ $school->name }} Class
    </h1>
    @if ($previlage->role == 'owner' || $previlage->role == 'operator')
        <div class="flex justify-end">
            <a class="m-3 bg-blue-600 text-white hover:bg-blue-800 mb-4 inline-block font-medium duration-200 p-3 rounded-lg"
                href="{{ route('previlage.classroom.create', $school->slug) }}">Create Class</a>
        </div>
    @endif

    <div class="sm:grid md:grid-cols-2 md:gap-5 md:mx-10 lg:grid lg:grid-cols-2 lg:gap-5 lg:mx-10 xl:grid-cols-3">
        @forelse ($classroom as $item)
            <div class="w-72 p-6 bg-white border border-gray-200 rounded-lg shadow m-5 mx-auto">
                <div class="w-60 h-56 mx-auto">
                    <img class="w-full h-full object-cover object-center rounded-t-lg"
                        src="{{ url('storage/classroom/', $item->image) }}" alt="img buku" />
                </div>
                <div class="flex justify-between items-center my-5">
                    <h5 class=" text-2xl font-bold tracking-tight">{{ $item->name }}</h5>
                    <p><i class="fa-solid fa-people-group"></i> {{ $item->previllage->count() }}</p>
                </div>
                <div class="flex justify-end gap-x-4">
                    <a href="{{ route('previlage.classroom.show', [$school->slug, $item->slug]) }}"
                        class=" px-3 py-2 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 duration-300 transition-all">
                        See Class <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        @empty
            <p class="text-center font-Nunito font-black text-3xl">No Classroom Have Been Added Yet.</p>
        @endforelse
    </div>
@endsection
