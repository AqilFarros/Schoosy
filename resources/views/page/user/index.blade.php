@extends('layouts.parent')

@section('content')
    <section class="bg-main-color">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
            <div class="grid items-center lg:flex md:flex">
                <div class="relative inline-block">
                    @if (empty(Auth::user()->image))
                        <img class="w-32 h-32 rounded-full"
                            src="https://ui-avatars.com/api/?background=random&name={{ $user->name }}" alt="Profile Image">
                    @else
                        <img class="w-32 h-32 rounded-full object-center object-cover"
                            src="{{ url('storage/profile/', $user->image) }}" alt="Profile Image">
                    @endif
                    <form action="{{ route('user.update', $user->id) }}" method="post" id="uploadForm"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label for="image"
                            class="absolute bottom-1 ml-24 lg:bottom-2 lg:right-2 text-white bg-secondary-color p-1 rounded-full w-8 h-8">
                            <div class="relative w-full h-full">
                                <i class="fa-solid fa-pencil absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"></i>
                            </div>
                        </label>
                        <input type="file" name="image" id="image" hidden onchange="uploadImage()" />
                    </form>
                </div>
                <div class="ml-6">
                    <h1 class="text-4xl font-black font-Nunito text-white md:text-5xl lg:text-6xl mb-3">
                        {{ Auth::user()->name }}</h1>
                    <div class="grid lg:flex md:flex">
                        <p class="text-white"><i class="fa-regular fa-envelope"></i> {{ Auth::user()->email }}</p>
                        <p class="text-white lg:ml-5 md:ml-5"><i class="fa-regular fa-clock"></i> Bergabung sejak
                            {{ Auth::user()->created_at->format('Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <form class="my-5 mx-5">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm border rounded-lg "
                placeholder="Search School" required />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-green-700 hover:bg-green-800  font-medium rounded-lg text-sm px-4 py-2">Search</button>
        </div>
    </form>


    <div class="mx-5 gap-4 sm:grid sm:grid-cols-1 md:mx-5 lg:mx-40 md:grid-cols-1 lg:grid-cols-2">

        <div class="bg-white border border-gray-200 rounded-lg shadow max-w-xl mx-auto hover:bg-gray-100">

            <div class="flex flex-col md:flex-row items-center">
                <img class="object-cover w-full rounded-t-lg h-32 md:h-auto md:w-32 md:rounded-none md:rounded-l-lg"
                    src="https://i.pinimg.com/enabled_lo/236x/ae/ff/ad/aeffad664fd627431dfd04804be239ab.jpg"
                    alt="IDN BP SENTUL">
                <div class="flex flex-col p-6 lg:p-0 md:p-0 leading-normal w-full">
                    <h5 class="mb-2 text-2xl">IDN BP SENTUL</h5>
                    <p class="mb-2"><i class="fa-regular fa-envelope"></i> IDN@GMAIL.COM</p>
                    <div class="flex gap-1">
                        <p class=""><i class="fa-regular fa-clock"></i> Bergabung sejak 2022</p>
                        <p class=""><i class="fa-solid fa-people-group"></i> Siswa terdaftar <span>2000</span></p>
                    </div>
                </div>
            </div>

            <p class="mx-5 my-4 text-gray-700">
                Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
            </p>

        </div>
        <div class="bg-white border border-gray-200 rounded-lg shadow max-w-xl mx-auto hover:bg-gray-100">

            <div class="flex flex-col md:flex-row items-center">
                <img class="object-cover w-full rounded-t-lg h-32 md:h-auto md:w-32 md:rounded-none md:rounded-l-lg"
                    src="https://i.pinimg.com/enabled_lo/236x/ae/ff/ad/aeffad664fd627431dfd04804be239ab.jpg"
                    alt="IDN BP SENTUL">
                <div class="flex flex-col p-6 lg:p-0 md:p-0 leading-normal w-full">
                    <h5 class="mb-2 text-2xl">IDN BP SENTUL</h5>
                    <p class="mb-2"><i class="fa-regular fa-envelope"></i> IDN@GMAIL.COM</p>
                    <div class="flex gap-1">
                        <p class=""><i class="fa-regular fa-clock"></i> Bergabung sejak 2022</p>
                        <p class=""><i class="fa-solid fa-people-group"></i> Siswa terdaftar <span>2000</span></p>
                    </div>
                </div>
            </div>

            <p class="mx-5 my-4 text-gray-700">
                Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
            </p>

        </div>
        <div class="bg-white border border-gray-200 rounded-lg shadow max-w-xl mx-auto hover:bg-gray-100">

            <div class="flex flex-col md:flex-row items-center">
                <img class="object-cover w-full rounded-t-lg h-32 md:h-auto md:w-32 md:rounded-none md:rounded-l-lg"
                    src="https://i.pinimg.com/enabled_lo/236x/ae/ff/ad/aeffad664fd627431dfd04804be239ab.jpg"
                    alt="IDN BP SENTUL">
                <div class="flex flex-col p-6 lg:p-0 md:p-0 leading-normal w-full">
                    <h5 class="mb-2 text-2xl">IDN BP SENTUL</h5>
                    <p class="mb-2"><i class="fa-regular fa-envelope"></i> IDN@GMAIL.COM</p>
                    <div class="flex gap-1">
                        <p class=""><i class="fa-regular fa-clock"></i> Bergabung sejak 2022</p>
                        <p class=""><i class="fa-solid fa-people-group"></i> Siswa terdaftar <span>2000</span></p>
                    </div>
                </div>
            </div>

            <p class="mx-5 my-4 text-gray-700">
                Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
            </p>

        </div>
        <div class="bg-white border border-gray-200 rounded-lg shadow max-w-xl mx-auto hover:bg-gray-100">

            <div class="flex flex-col md:flex-row items-center">
                <img class="object-cover w-full rounded-t-lg h-32 md:h-auto md:w-32 md:rounded-none md:rounded-l-lg"
                    src="https://i.pinimg.com/enabled_lo/236x/ae/ff/ad/aeffad664fd627431dfd04804be239ab.jpg"
                    alt="IDN BP SENTUL">
                <div class="flex flex-col p-6 lg:p-0 md:p-0 leading-normal w-full">
                    <h5 class="mb-2 text-2xl">IDN BP SENTUL</h5>
                    <p class="mb-2"><i class="fa-regular fa-envelope"></i> IDN@GMAIL.COM</p>
                    <div class="flex gap-1">
                        <p class=""><i class="fa-regular fa-clock"></i> Bergabung sejak 2022</p>
                        <p class=""><i class="fa-solid fa-people-group"></i> Siswa terdaftar <span>2000</span></p>
                    </div>
                </div>
            </div>

            <p class="mx-5 my-4 text-gray-700">
                Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.
            </p>

        </div>

    </div>

    <script>
        function uploadImage() {
            document.getElementById('uploadForm').submit();
        }
    </script>
@endsection

{{-- <div class="relative">
    @if (empty(Auth::user()->image))
        <img src="https://ui-avatars.com/api/?background=random&name={{ $user->name }}" alt="img"
            class="hidden md:block rounded-full ring-4 ring-slate-200" style="height: 16em; width: 16em;">
    @else
        <img src="{{ url('storage/profile/', $user->image) }}" alt="img"
            class="hidden md:block rounded-full ring-4 ring-slate-200" style="height: 16em; width: 16em;">
    @endif
    <div class="absolute bottom-3 right-5 flex justify-center items-center px-2 py-1 bg-slate-200 rounded-full">
        <form action="{{ route('user.update', $user->id) }}" method="post" id="uploadForm"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="userImage"><i class="fa-solid fa-camera-retro text-xl cursor-pointer"></i>upload</label>
            <input type="file" name="image" id="userImage" onchange="uploadImage()" hidden>
        </form>
    </div>
</div>

<div>
    @foreach ($previlage as $item)
        <div>
            <p>name: {{ $item->school->name }}</p>
            <p>role: {{ $item->role }}</p>
            <a href="{{ route('school.show', $item->school->slug) }}">visit school</a>
        </div>
    @endforeach
</div>

<div>
    <form action="{{ route('school.searchSchool') }}" method="GET">
        <input type="text" name="code">
        <button type="submit">search</button>
    </form>
</div>

<script>
    function uploadImage() {
        document.getElementById('uploadForm').submit();
    }
</script> --}}
