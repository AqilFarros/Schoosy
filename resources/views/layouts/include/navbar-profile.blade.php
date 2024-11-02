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
