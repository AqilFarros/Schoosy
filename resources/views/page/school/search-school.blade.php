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
                <div class="flex space-x-11">
                    <span class="text-3xl font-semibold font-TitanOne text-main-color">Schoosy</span>

                    <button id="nav-toggle" class="md:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12H4m0 6h16">
                            </path>
                        </svg>
                    </button>

                    <form action="#" method="GET">
                        <input type="text" name="query" value="#">
                        <button type="submit">search</button>
                    </form>

                </div>


                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

                    <button type="button" class="flex text-sm rounded-full md:me-0 " id="user-menu-button"
                        aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        @if (empty(Auth::user()->image))
                            <img class="w-8 h-8 rounded-full"
                                src="https://ui-avatars.com/api/?background=random&name={{ Auth::user()->name }}"
                                alt="user photo">
                        @else
                            <img class="w-8 h-8 rounded-full" src="{{ url('storage/profile/', Auth::user()->image) }}"
                                alt="user photo">
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
                                <a href="#" class="block px-4 py-2 text-sm">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('user.show', Auth::id()) }}"
                                    class="block px-4 py-2 text-sm">Profile</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm">Setting</a>
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

    <div class="md:flex">
        <div class="md:w-1/2 bg-slate-100 font-Nunito">
            <img src="https://i.pinimg.com/564x/15/09/96/150996d5036e9230edc3fc48decaecd4.jpg" alt=""
                class="w-full p-2 rounded-xl">
            <div class="ml-2 pb-2">
                <h2
                    class="font-Nunito font-bold text-white bg-main-color py-1 px-2 mb-2 w-fit rounded-md hover:shadow-md hover:-translate-y-1 duration-300 cursor-pointer">
                    IDN Boarding School
                    Sentul</h2>
                <div class="flex flex-col gap-2 text-lg">
                    <div class="flex flex-row gap-2 items-center">
                        <i class="fa-solid fa-location-dot text-main-color"></i>
                        <p>Babakan Madang</p>
                    </div>

                    <div class="flex flex-row gap-2 items-center">
                        <i class="fa-solid fa-envelope text-main-color"></i>
                        <p>idns@gmail.com</p>
                    </div>

                    <div class="flex flex-row gap-2 items-center">
                        <i class="fa-solid fa-phone text-main-color"></i>
                        <p>081314081336</p>
                    </div>

                    <div class="flex flex-row gap-2 items-center">
                        <i class="fa-solid fa-link text-main-color"></i>
                        <p>www.idns.com</p>
                    </div>

                    <div class="flex flex-row gap-2 items-center">
                        <i class="fa-solid fa-barcode text-main-color"></i>
                        <p>IR8DF</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:w-1/2">
            <h1 class="p-2 text-2xl">Description:</h1>
            <p class="pl-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus voluptate quam corrupti
                commodi
                molestias iste atque deserunt eos sunt, iusto quod in excepturi. Asperiores deleniti aliquid ratione
                culpa tempore amet minima voluptatibus, maxime dicta dolores aliquam ex. Magni exercitationem
                voluptatibus accusamus eveniet alias veniam eligendi totam dolores ad blanditiis, obcaecati, voluptas,
                aliquam ut ex sequi repellendus eius laborum officiis aperiam? Qui veritatis aliquid, est eaque
                repudiandae, minima minus, natus optio architecto molestias eum sint at. Iste, consectetur ex. Omnis
                voluptatibus iste veritatis voluptas alias commodi minima officiis, adipisci non corporis minus. Placeat
                numquam unde temporibus repellendus, quod odit magnam optio?</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>
