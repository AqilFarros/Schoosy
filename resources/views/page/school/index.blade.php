@extends('layouts.parent')

@section('content')
    <div class="flex flex-col md:flex-row justify-center m-10">

        <div class="max-w-[500px] w-[100%] bg-white border border-gray-200 rounded-lg shadow mb-5 md:mb-0 overflow-hidden">
            <div class="relative bg-main-color">
                <div class="flex items-center justify-center py-2 w-[13em] h-[14em] lg:w-[16rem] lg:h-[16rem] mx-auto">
                    <img class="w-full h-full object-cover object-center rounded-full"
                        src="{{ url('storage/school/', $school->image) }}" alt="school" />
                    @if ($previlage->role == 'owner' || $previlage->role == 'operator')
                        <form action="{{ route('school.update', $school->slug) }}" method="post" enctype="multipart/form-data"
                            id="uploadForm">
                            @csrf
                            @method('PUT')
                            <label for="image">
                                <div class="absolute w-14 h-10 right-2 bottom-2 rounded-full cursor-pointer">
                                    <div class="relative">
                                        <i
                                            class="fa-solid fa-pencil bg-gray-300 p-2 rounded-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 "></i>
                                    </div>
                                </div>
                            </label>
                            <input type="file" name="image" id="image" hidden onchange="uploadImage()" />
                        </form>
                    @endif
                </div>
            </div>
            <div class="px-5 py-2">
                <p class="font-Nunito font-black text-3xl">{{ $school->name }}</p>
                <div class="grid grid-cols-2">
                    <div class="flex items-center gap-x-2">
                        <i class="fa-regular fa-envelope text-red-600"></i>
                        <p class="font-normal">{{ $school->email }}</p>
                    </div>

                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-phone text-main-color"></i>
                        <p class="font-normal">
                            {{ $school->phone }}
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-2">
                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-puzzle-piece text-green-600"></i>
                        <p class="font-normal">{{ $school->code }}</p>
                    </div>

                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-globe text-blue-600"></i>
                        <p class="font-normal">
                            {{ $school->website }}
                        </p>
                    </div>
                </div>

                <div class="">
                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-location-pin text-red-600"></i>
                        <p class="font-normal">{{ $school->address }}</p>
                    </div>
                </div>

                <div class="my-2">
                    <p>{{ $school->description }}</p>
                </div>

                <div class="flex justify-end gap-x-2">
                    @if ($previlage->role == 'owner' || $previlage->role == 'operator')
                        <a href="{{ route('school.edit', $school->slug) }}"
                            class="inline-flex items-center px-3 text-sm font-medium text-center bg-yellow-400 rounded-xl text-white py-2 hover:bg-opacity-70 duration-300">
                            Edit
                        </a>
                    @endif
                    <form action="{{ route('previlage.deletePrevillage', [$school->slug, $previlage->id]) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center px-3 text-sm font-medium text-center bg-red-500 rounded-xl text-white py-2 hover:bg-opacity-70 duration-300">Leave
                            School</button>
                    </form>
                    @if ($previlage->role == 'owner')
                        <form action="{{ route('school.destroy', $school->slug) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-3 text-sm font-medium text-center bg-red-500 rounded-xl text-white py-2 hover:bg-opacity-70 duration-300">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 md:ml-3 gap-5">
            <a href="{{ route('previlage.book.index', $school->slug) }}"
                class="max-w-sm p-5 bg-white border border-gray-200 rounded-lg shadow duration-300 transition-all hover:bg-slate-100">
                <div>
                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-book text-main-color text-2xl"></i>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight">Book</h5>
                    </div>
                    <p class="mb-3 font-normal">Your school have {{ $school->book->count() }} books. Let's read the book in
                        order to add our
                        knowledge.</p>
                </div>
            </a>
            <a href="{{ route('previlage.classroom.index', $school->slug) }}"
                class="max-w-sm p-5 bg-white border border-gray-200 rounded-lg shadow mt-3 duration-300 transition-all hover:bg-slate-100">
                <div>
                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-graduation-cap text-main-color text-2xl"></i>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight">Classroom</h5>
                    </div>
                    <p class="mb-3 font-normal">Your school have {{ $school->classroom->count() }} classrooms. Let's see
                        the
                        classroom in order to get to know your school better.</p>
                </div>
            </a>
            <a href="{{ route('school.member', $school->slug) }}"
                class="max-w-sm p-5 bg-white border border-gray-200 rounded-lg shadow mt-3 duration-300 transition-all hover:bg-slate-100">
                <div class="">
                    <div class="flex items-center gap-x-2">
                        <i class="fa-solid fa-users text-main-color text-2xl"></i>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight">Member</h5>
                    </div>
                    <p class="mb-3 font-normal">Your school have {{ $school->previllage->count() }} member. Let's see the
                        other
                        member in order to get to know them better.</p>
                </div>
            </a>
        </div>
    </div>

    <script>
        function uploadImage() {
            document.getElementById('uploadForm').submit();
        }
    </script>
@endsection

{{-- <div>
    <p>{{ $school->name }}</p>
    <p>code: {{ $school->code }}</p>
    <a href="{{ route('school.edit', $school->slug) }}">edit</a>
    <form action="{{ route('school.destroy', $school->slug) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">delete</button>
    </form>
</div>

<div>
    <form action="{{ route('previlage.searchPrevillage', $school->slug) }}" method="GET">
        <input type="text" name="query">
        <button type="submit">search</button>
    </form>
</div> --}}
