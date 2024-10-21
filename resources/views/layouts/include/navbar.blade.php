<header>
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


                <div class="items-center hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white ">
                        <li>
                            <a href="#" class="hover:text-main-color duration-300" aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-main-color duration-300">Academy</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-main-color duration-300">Challenge</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-main-color duration-300">Event</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-main-color duration-300">Job</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

                <button type="button" class="flex text-sm rounded-full md:me-0 " id="user-menu-button"
                    aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <img class="w-8 h-8 rounded-full"
                        src="https://i.pinimg.com/enabled_lo/564x/7c/49/a0/7c49a0766f9c0c320d144afd38bbaa75.jpg"
                        alt="user photo">
                </button>

                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y rounded-lg shadow"
                    id="user-dropdown">
                    <div class="px-4 py-3">
                        <span class="block text-sm">Bonnie Green</span>
                        <span class="block text-sm">name@flowbite.com</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm">Setting</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm">Sign
                                out</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

        <div id="nav-menu" class="hidden md:hidden">
            <ul
                class="font-medium p-4 bg-gray-50 rounded-lg border border-gray-100 space-y-2 md:space-y-0 md:space-x-8 md:flex-row">
                <li>
                    <a href="#" class="hover:text-main-color duration-300">Home</a>
                </li>
                <li>
                    <a href="#" class="hover:text-main-color duration-300">Academy</a>
                </li>
                <li>
                    <a href="#" class="hover:text-main-color duration-300">Challenge</a>
                </li>
                <li>
                    <a href="#" class="hover:text-main-color duration-300">Event</a>
                </li>
                <li>
                    <a href="#" class="hover:text-main-color duration-300">Job</a>
                </li>
            </ul>
        </div>

    </nav>
</header>

<script>
    document.getElementById('nav-toggle').addEventListener('click', function () {
        var navMenu = document.getElementById('nav-menu');
        navMenu.classList.toggle('hidden');
    });
</script>