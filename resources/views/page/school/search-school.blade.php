<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schoosy</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Titan+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Titan+One&display=swap');
    </style>
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'main-color': "#159947",
                        'secondary-color': "#272727",
                        'grey-color': '#B5B5B5'
                    }
                },
                fontFamily: {
                    TitanOne: ['Titan One', 'sans-serif'],
                    Nunito: ['Nunito', 'sans-serif']
                },
                screens: {
                    sm: "340px",
                    md: "440px",
                    lg: "768px",
                    xl: "1180px",
                },
                container: {
                    center: true,
                    padding: {
                        DEFAULT: "12",
                        md: "32px"
                    }
                },
            },
        }
    </script>

    <!---------- Favicon ---------->
    <link rel="shortcut icon" href="{{ asset('assets/Logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>

<body>

    <header class="bg-slate-100 shadow">
        <nav>
            <div class="flex justify-between items-end md:items-center w-[92%] mx-auto py-3">
                <div class="flex justify-between w-full">
                    <span class="text-3xl font-semibold font-TitanOne text-main-color">Schoosy</span>
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <button type="button" class="flex text-sm rounded-full md:me-0 " id="user-menu-button"
                            aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                            @if (empty(Auth::user()->image))
                                <img class="w-8 h-8 rounded-full"
                                    src="https://ui-avatars.com/api/?background=random&name={{ Auth::user()->name }}"
                                    alt="user photo">
                            @else
                                <img class="w-8 h-8 rounded-full"
                                    src="{{ url('storage/profile/', Auth::user()->image) }}" alt="user photo">
                            @endif
                        </button>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y rounded-lg shadow"
                            id="user-dropdown">
                            <div class="px-4 py-3">
                                <span class="block text-sm">{{ Auth::user()->name }}</span>
                                <span class="block text-sm">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="{{ route('user.show', Auth::id()) }}"
                                        class="block px-4 py-2 text-sm">Profile</a>
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="block px-4 py-2 text-sm">Sign
                                            out</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </nav>
    </header>

    <script>
        document.getElementById('nav-toggle').addEventListener('click', function() {
            var navMenu = document.getElementById('nav-menu');
            navMenu.classList.toggle('hidden');
        });
    </script>

    <form class="my-5 mx-5 p-2" method="GET" action="{{ route('school.searchSchool') }}">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm border rounded-lg "
                placeholder="Enter School Code To Join School" name="code" value="{{ $code }}" required />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-green-700 hover:bg-green-800  font-medium rounded-lg text-sm px-4 py-2">Search</button>
        </div>
    </form>

    <div class="flex flex-col">
        <div class="bg-slate-100 font-Nunito flex flex-col lg:flex-row justify-center">
            <div class="my-auto w-full h-[12em] lg:w-[26em] xl:w-[36em] lg:h-[18em] xl:h-[24em]">
                <img src="{{ url('storage/school/', $school->image) }}" alt=""
                    class="w-full h-full object-cover object-center py-4 px-2 rounded-xl">
            </div>
            <div class="flex flex-col lg:items-end ml-2 py-4">
                <h2
                    class="font-Nunito font-bold text-white bg-main-color py-1 px-2 mb-2 w-fit rounded-md hover:shadow-md hover:-translate-y-1 duration-300 cursor-pointer">
                    {{ $school->name }}
                </h2>
                <div class="flex flex-col gap-2 text-lg lg:items-end">
                    <div class="flex flex-row gap-2 items-center">
                        <i class="fa-solid fa-location-dot text-main-color"></i>
                        <p>{{ $school->address }}</p>
                    </div>

                    <div class="flex flex-row gap-2 items-center">
                        <i class="fa-solid fa-envelope text-main-color"></i>
                        <p>{{ $school->email }}</p>
                    </div>

                    <div class="flex flex-row gap-2 items-center">
                        <i class="fa-solid fa-phone text-main-color"></i>
                        <p>{{ $school->phone }}</p>
                    </div>

                    <div class="flex flex-row gap-2 items-center">
                        <i class="fa-solid fa-link text-main-color"></i>
                        <p>{{ $school->website }}</p>
                    </div>

                    <div class="flex flex-row gap-2 items-center">
                        <i class="fa-solid fa-barcode text-main-color"></i>
                        <p>{{ $school->code }}</p>
                    </div>

                    <form action="{{ route('school.joinSchool', $school->code) }}" method="post">
                        @csrf
                        @method('POST')
                        <button type="submit"
                            class="bg-main-color w-[8em] rounded-lg hover:bg-yellow-400 duration-300 mt-12 ml-auto items-end">
                            <p class="py-1 font-Nunito font-semibold text-white hover:text-slate-100">
                                Join School
                            </p>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="py-2 px-6">
            <h1 class="text-2xl">Description:</h1>
            <p class="text-justify">{{ $school->description }}</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
